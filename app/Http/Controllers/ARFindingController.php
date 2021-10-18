<?php

namespace App\Http\Controllers;

use App\Model\ARFinding;
use App\Model\ARFInCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Image;

class ARFindingController extends Controller
{
    public function view_ar_findings(Request $request){
        session_start();
        $ar_findings;
                    
        if(isset($request->status)){
            $ar_findings = ARFinding::with([
                'in_charge_details.user_info', // ARFInCharge (users)
                'classification_info',
                'factor_info',
                'factor_item_list_info',
            ])
            ->where('audit_result_id', $request->audit_result_id)
            ->get();
        }
        else {
            $ar_findings = ARFinding::with([
                'in_charge_details.user_info',
                'classification_info',
                'factor_info',
                'factor_item_list_info',
            ])
            ->where('audit_result_id', $request->audit_result_id)
            ->where('status', $request->status)
            ->get();
        }

        return DataTables::of($ar_findings)
            ->addColumn('raw_status', function($data){
                $result = "";

                if($data->status == 1){
                    $result .= '<span class="tag tag-success">Active</span>';
                }
                else{
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('raw_action', function($data){
                $result = '';
                if($data->status == 1) {
                    $result .= '<button class="btn-actions btn btn-sm btn-success btnEditARFinding" ar_finding-id="' . $data->id . '" type="button" title="Edit"><i class="icon-edit2"></i></button> ';

                    $result .= '<button class="btn-actions btn btn-sm btn-danger btnActionARFinding" type="button" ar_finding-id="' . $data->id . '" status="2" title="Archive"><i class="icon-trash2"></i></button> ';

                    // $result .= '<button class="btn-actions btn btn-sm btn-info btnSelectARFinding" type="button" ar_finding-id="' . $data->id . '" ar_finding-name="' . $data->name . '" title="Select"><i class="icon-arrow-right"></i></button> ';
                }
                else {
                    $result .= '<button class="btn-actions btn btn-sm btn-warning btnActionARFinding" type="button" ar_finding-id="' . $data->id . '" status="1" title="Restore"><i class="icon-history2"></i></button> ';               
                }

                return $result;
            })
            ->addColumn('raw_department', function($data){
                $result = "";

                if($data->department == 1){
                    $result .= 'TS';
                }
                else if($data->department == 2){
                    $result .= 'PPS';
                }
                else if($data->department == 3){
                    $result .= 'CN';
                }
                else{
                    $result .= 'YF';
                }

                return $result;
            })
            //============================== On Going 13-08-21 START -Jannus ==============================
            ->addColumn('raw_actual_illustration', function($data){
                $result = "";
                $path = "";

                    if($data->actual_illustration != '' || $data->actual_illustration != null){

                        $exploded_arr_actual_illustration = explode(", ", $data->actual_illustration);
                        foreach ($exploded_arr_actual_illustration as $file) {
                            $path = asset('public/storage/images/actual_illustration/' . $file);
                            $result .= '<center><img src="' . $path . '" style="max-width: 100px; max-height: 200px; width: 100px; height: auto;" class="commonAuditImg"></center>';
                        }
                    }
                    else{
                        $path = asset('public/storage/image-icon.png');
                        $result .= '<center><img src="' . $path . '" style="max-width: 100px; max-height: 200px; min-width: 50px; min-height: 50px;" class="commonAuditImg"></center>';
                    }

                return $result;
            })
            //============================== On Going 13-08-21 END -Jannus ==============================
            ->addColumn('raw_close_out_image', function($data){
                $result = "";
                    $path = "";

                    if($data->close_out_image != '' || $data->close_out_image != null){
                        $path = asset('public/storage/images/close_out/' . $data->close_out_image);
                    }
                    else{
                        $path = asset('public/storage/image-icon.png');
                    }

                    return '<center><img src="' . $path . '" style="max-width: 100px; max-height: 200px; width: 100px; height: auto;" class="commonAuditImg"></center>';

                return $result;
            })
            ->addColumn('raw_statement_of_findings', function($data){
                $result = "";

                $result .= explode(' ', $data->factor_item_list_info->name)[0] . ' ' . explode(' ', $data->factor_item_list_info->name)[1] . ' ';
                $result .= '<b>(' . $data->factor_info->name . ')</b><br>';
                $result .= $data->statement_of_findings;

                return $result;
            })
            ->rawColumns(['raw_status', 'raw_action', 'raw_department', 'raw_statement_of_findings', 'raw_actual_illustration', 'raw_close_out_image'])
            ->make(true);
    }

    public function save_ar_finding(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [];


        // if ar_finding_id is not set then this will be use for insert operation else update operation
        if(!isset($request->ar_finding_id)){
            $rules = [
				'audit_result_id' => 'required',
				'no' => 'required',
				'classification_id' => 'required',
				'station' => 'required',
				'factor_id' => 'required',
				'factor_item_list_id' => 'required',
				'actual_illustration' => 'required',
                // 'counter_measures' => 'required',
				// 'in_charge' => 'required',
            ];
            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    $close_out_image_orig = null;
                    $close_out_image = null;
                    if ($request->hasFile('close_out_image')) {
                        if ($request->file('close_out_image')->isValid()) {
                            $close_out_image_orig = $request->close_out_image->getClientOriginalName();
                            $close_out_image = $request->close_out_image->getClientOriginalName();
                            $close_out_image = Str::random(8) . '-' . $close_out_image;
                            $request->close_out_image->storeAs('/public/images/close_out/', $close_out_image);
                        }
                    }
                    
                    //============================== On Going 13-08-21 START -Jannus ==============================
                    $arr_actual_illustration = array();
                    $arr_actual_illustration_orig = array();
                    $actual_illustration_orig = null;
                    $actual_illustration = null;

                    if ($request->hasFile('actual_illustration')) {
                        $files = $request->file('actual_illustration');
                            foreach ($files as $file) {
                                $actual_illustration_orig = $file->getClientOriginalName();
                                array_push($arr_actual_illustration_orig, $actual_illustration_orig);
                                
                                // contacatenate the $actual_illustration with date then store in Storage
                                $actual_illustration = $file->getClientOriginalName();
                                $actual_illustration_generated = Str::random(8) . '-' . $actual_illustration;

                                // $image_resize = Image::make($file)->resize(100, 100);
                                // $image_resize = Image::make($file)->resize(200, 200, function ($constraint) {
                                //     $constraint->aspectRatio();
                                //     $constraint->upsize();
                                // });
                                $file->storeAs('/public/images/actual_illustration/', $actual_illustration_generated);
                                array_push($arr_actual_illustration, $actual_illustration_generated);
                            }

                            // this will be use to store in database
                            $imploded_arr_actual_illustration_orig =  implode(', ', $arr_actual_illustration_orig);
                            $imploded_arr_actual_illustration =  implode(', ', $arr_actual_illustration);
                    //============================== On Going 13-08-21 END -Jannus ==============================
                    }

                    $ar_finding_id = ARFinding::insertGetId([
							'audit_result_id' => $request->audit_result_id,
							'no' => $request->no,
							'classification_id' => $request->classification_id,
							'station' => $request->station,
							'statement_of_findings' => $request->statement_of_findings,
							'factor_id' => $request->factor_id,
							'factor_item_list_id' => $request->factor_item_list_id,
                            'actual_illustration' => $imploded_arr_actual_illustration,
							'actual_illustration_orig' => $imploded_arr_actual_illustration_orig,
							'counter_measures' => $request->counter_measures,
							'commitment_date' => $request->commitment_date,
							'close_out' => $request->close_out,
                            'close_out_image' => $close_out_image,
							'close_out_image_orig' => $close_out_image_orig,
                            'status' => 1,
                            'update_version' => 1,
                            'created_by' => $_SESSION["rapidx_user_id"],
                            'last_updated_by' => $_SESSION["rapidx_user_id"],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );

                    if(isset($request->in_charge)){
                        if(count($request->in_charge) > 0){
                            for($index = 0; $index < count($request->in_charge); $index++){
                                ARFInCharge::insert([
                                    'ar_finding_id' => $ar_finding_id,
                                    'user_id' => $request->in_charge[$index],
                                    'status' => 1,
                                    'created_by' => $_SESSION["rapidx_user_id"],
                                    'last_updated_by' => $_SESSION["rapidx_user_id"],
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ]);
                            }
                        }
                    }


                    DB::commit();
                    return response()->json(['result' => 1]);
                }
                catch(\Exeption $e){
                    DB::rollback();
                    return response()->json(['result' => 0]);
                }
            }
            else{
                return response()->json(['result' => '0', 'error' => $validator->messages()]);
            }
        }
        else{
            $rules = [
                'ar_finding_id' => 'required',
                'no' => 'required',
                'classification_id' => 'required',
                'station' => 'required',
                'factor_id' => 'required',
                'factor_item_list_id' => 'required',
                // 'actual_illustration' => 'required',
                // 'counter_measures' => 'required',
                'in_charge' => 'required',
            ];

            //============================== On Going 17-08-21 START -Jannus ==============================
            if(isset($request->chkEditActualIllustration)){
                $rules['actual_illustration'] = 'required';
            }
            //============================== On Going 17-08-21 END -Jannus ==============================
            // $update_data_inputs = array(
            //     'no' => $request->no,
            //     'classification_id' => $request->classification_id,
            //     'station' => $request->station,
            //     'statement_of_findings' => $request->statement_of_findings,
            //     'factor_id' => $request->factor_id,
            //     'factor_item_list_id' => $request->factor_item_list_id,
            //     'counter_measures' => $request->counter_measures,
            //     'commitment_date' => $request->commitment_date,
            //     'close_out' => $request->close_out,
            // );

            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    $update_data = [
                    	'no' => $request->no,
                        'classification_id' => $request->classification_id,
                        'station' => $request->station,
                        'statement_of_findings' => $request->statement_of_findings,
                        'factor_id' => $request->factor_id,
                        'factor_item_list_id' => $request->factor_item_list_id,
                        'counter_measures' => $request->counter_measures,
                        'commitment_date' => $request->commitment_date,
                        'close_out' => $request->close_out,
                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    $close_out_image_orig = null;
                    $close_out_image = null;
                    if ($request->hasFile('close_out_image')) {
                        if ($request->file('close_out_image')->isValid()) {
                            $close_out_image_orig = $request->close_out_image->getClientOriginalName();
                            $close_out_image = $request->close_out_image->getClientOriginalName();
                            $close_out_image = Str::random(8) . '-' . $close_out_image;
                            $request->close_out_image->storeAs('/public/images/close_out/', $close_out_image);
                            $update_data['close_out_image'] = $close_out_image;
                        	$update_data['close_out_image_orig'] = $close_out_image_orig;
                        }
                    }

                    $arr_actual_illustration = array();
                    $arr_actual_illustration_orig = array();
                    $actual_illustration_orig = null;
                    $actual_illustration = null;
                    if ($request->hasFile('actual_illustration')) {
                        $files = $request->file('actual_illustration');
                        foreach ($files as $file) {
                            $actual_illustration_orig = $file->getClientOriginalName();
                            array_push($arr_actual_illustration_orig, $actual_illustration_orig);
                            
                            // contacatenate the $actual_illustration with date then store in Storage
                            $actual_illustration = $file->getClientOriginalName();
                            $actual_illustration_generated = Str::random(8) . '-' . $actual_illustration;

                            $file->storeAs('/public/images/actual_illustration/', $actual_illustration_generated);
                            array_push($arr_actual_illustration, $actual_illustration_generated);
                        }
                        // this will be use to update in database
                        $imploded_arr_actual_illustration =  implode(', ', $arr_actual_illustration);
                        $imploded_arr_actual_illustration_orig =  implode(', ', $arr_actual_illustration_orig);
                        
                        $update_data['actual_illustration'] = $imploded_arr_actual_illustration;
                        $update_data['actual_illustration_orig'] = $imploded_arr_actual_illustration_orig;

                        // OLD CODE
                        // if ($request->file('actual_illustration')->isValid()) {
                        //     $actual_illustration_orig = $request->actual_illustration->getClientOriginalName();
                        //     $actual_illustration = $request->actual_illustration->getClientOriginalName();
                        //     $actual_illustration = Str::random(8) . '-' . $actual_illustration;
                        //     $request->actual_illustration->storeAs('/public/images/actual_illustration/', $actual_illustration);
                        //     $update_data['actual_illustration'] = $actual_illustration;
                        // 	$update_data['actual_illustration_orig'] = $actual_illustration_orig;
                        // }
                    }


                    $ar_finding_id = ARFinding::where('id', $request->ar_finding_id)
                        ->increment('update_version', 1, $update_data // after increment operation this will also be use to update
                    );

                    // delete the old data with that ar_finding_id inside arf_in_charges table then insert the new updated data
                    ARFInCharge::where('ar_finding_id', $request->ar_finding_id)
                            ->delete();

                    if(isset($request->in_charge)){
                        if(count($request->in_charge) > 0){
                            // ARFInCharge::where('ar_finding_id', $request->ar_finding_id)
                            // ->delete();
                            for($index = 0; $index < count($request->in_charge); $index++){
                                ARFInCharge::insert([
                                    'ar_finding_id' => $request->ar_finding_id,
                                    'user_id' => $request->in_charge[$index],
                                    'status' => 1,
                                    'created_by' => $_SESSION["rapidx_user_id"],
                                    'last_updated_by' => $_SESSION["rapidx_user_id"],
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ]);
                            }
                        }
                    }


                    DB::commit();
                    return response()->json(['result' => 1]);
                }
                catch(\Exeption $e){
                    DB::rollback();
                    return response()->json(['result' => 0]);
                }
            }
            else{
                return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
            }
        }
    }

    public function get_ar_finding_by_id(Request $request){
        session_start();
        $data = ARFinding::where('id', $request->ar_finding_id)
                ->with([
                    'in_charge_details.user_info',
                    'classification_info',
                    'factor_info',
                    'factor_item_list_info',
                ])
                ->first();
        $act_illustration = $data->actual_illustration;

        return response()->json(['data' => $data, 'act_illustration' => $act_illustration]);
    }

    // 08-18-21 - Jannus
    // public function unlink(){
    //     $path =  "app/storage/app/var/";
    //     unlink(realpath($path));
    // }

    public function action_ar_finding(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [
            'ar_finding_id' => ['required'],
            'status' => ['required'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            try{

                ARFinding::where('id', $request->ar_finding_id)
                    ->update([
                        'status' => $request->status,
                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );

                DB::commit();
                return response()->json(['result' => 1]);
            }
            catch(\Exeption $e){
                DB::rollback();
                return response()->json(['result' => 0]);
            }
        }
        else{
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
    }

    public function get_cbo_ar_findings_by_stat(Request $request){
        date_default_timezone_set('Asia/Manila');

        $search = $request->search;

        if($search == ''){
            $datas = [];
        }
        else{
            $datas = ARFinding::orderby('name','asc')->select('id','name')
                        ->where('name', 'like', '%' . $search . '%')
                        ->where('status', 1)
                        ->get();
        }

        $response = array();
        $response[] = array(
            "id" => '',
            "text" => '',
        );

        foreach($datas as $data){
            $response[] = array(
                "id" => $data->id,
                "text" => $data->name,
            );
        }

        echo json_encode($response);
        exit;
    }

    public function report1(Request $request){
        session_start();

        // return $data1;

        $months = [];
        $months2 = [];

        $month_name = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        for ($index = 3; $index <= 12; $index++) { 
            $months[] = [
                'month_name' => $month_name[$index - 1],
                'month' => $request->year . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
            ];

            // $months2[] = [
            //     'month_name' => $month_name[$index - 1],
            //     'month' => ($request->year - 1) . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
            // ];
        }

        for ($index = 1; $index <= 3; $index++) { 
            $months[] = [
                'month_name' => $month_name[$index - 1],
                'month' => ($request->year + 1) . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
            ];

            // $months2[] = [
            //     'month_name' => $month_name[$index - 1],
            //     'month' => $request->year . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
            // ];
        }

        // return $months2;


        $from = $months[0]['month'] . '-01';
        $to = $months[count($months) - 1]['month'] . '-31';

        // $from2 = $months2[0]['month'] . '-01';
        // $to2 = $months2[count($months2) - 1]['month'] . '-31';
            
        // return $months;

        $data1 = ARFinding::groupBy('classification_id')
            ->with([
                'classification_info'
            ])
            ->selectRaw('count(*) as classification_count, classification_id')
            ->orderBy('classification_count', 'desc')
            // ->limit(10)
            ->whereHas('audit_result_info', function ($query) use($from, $to) {
                $query->whereDate('audit_date', '>=', $from);
                $query->whereDate('audit_date', '<=', $to);
            })
            ->get();

        // $data2 = ARFinding::groupBy('classification_id')
        //     ->with([
        //         'classification_info'
        //     ])
        //     ->selectRaw('count(*) as classification_count, classification_id')
        //     ->orderBy('classification_count', 'desc')
        //     // ->limit(10)
        //     ->whereHas('audit_result_info', function ($query) use($from2, $to2) {
        //         $query->whereDate('audit_date', '>=', $from2);
        //         $query->whereDate('audit_date', '<=', $to2);
        //     })
        //     ->get();

        // return $data2;

        $final_data = [];


        for ($index = 0; $index < count($data1); $index++) { 
            $ar_finding_data = [];
            $month_name = '';
            for ($index2 = 0; $index2 < count($months); $index2++) { 
                $year = explode('-', $months[$index2]['month'])[0];
                $month = explode('-', $months[$index2]['month'])[1];


                $ar_finding_count = ARFinding::with([
                    'audit_result_info',
                    'classification_info',
                ])

                ->where('classification_id', $data1[$index]->classification_id)
                // ->groupBy('classification_id')
                // ->selectRaw('count(*) as classification_count, classification_id')
                // ->orderBy('classification_count', 'desc')
                // ->limit(10)
                ->whereHas('audit_result_info', function ($query) use($year, $month) {
                    $query->whereYear('audit_date', $year);
                    $query->whereMonth('audit_date', $month);
                })
                ->count();

                $ar_finding_data[] = [
                    'month_name' => $months[$index2]['month_name'],
                    'count' => $ar_finding_count,
                    // 'year_month' => $year . '-' . $month,
                ];
            }

            $final_data[] = [
                'classification_id' => $data1[$index]->classification_info->id,
                'classification_name' => $data1[$index]->classification_info->name,
                'data' => $ar_finding_data,
            ];
        }

        // $final_data[] = [
        //     'classification_id' => 0,
        //     'classification_name' => 'Total',
        //     'data' => [],
        // ];

        $data1 = ARFinding::with([
                'audit_result_info',
                'classification_info',
            ])
            // ->groupBy('classification_id')
            // ->selectRaw('count(*) as classification_count, classification_id')
            // ->orderBy('classification_count', 'desc')
            // ->limit(10)
            // ->whereHas('aud')
            ->get();

        return response()->json(['data' => $final_data]);
    }

    public function chart1(Request $request){
        session_start();

        for ($index = 3; $index <= 12; $index++) { 
            $months[] = $request->year . '-' . str_pad($index,2,"0", STR_PAD_LEFT);
        }

        for ($index = 1; $index <= 3; $index++) { 
            $months[] = ($request->year + 1) . '-' . str_pad($index,2,"0", STR_PAD_LEFT);
        }

        $from = $months[0] . '-01';
        $to = $months[count($months) - 1] . '-31';
        // return $to;
        $data = ARFinding::groupBy('classification_id')
            ->with([
                'classification_info',
            ])
            ->selectRaw('count(*) as classification_count, classification_id')
            ->orderBy('classification_count', 'desc')
            // ->limit(10)
            ->whereHas('audit_result_info', function ($query) use($from, $to) {
                $query->whereDate('audit_date', '>=', $from);
                $query->whereDate('audit_date', '<=', $to);
            })
            ->get();

        // return $data;

        return response()->json(['data' => $data]);
    }

    public function report2(Request $request){
        session_start();

        // return $data1;

        $months = [];
        $month_name = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        for ($index = 3; $index <= 12; $index++) { 
            $months[] = [
                            'month_name' => $month_name[$index - 1],
                            'month' => $request->year . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
                        ];
        }

        for ($index = 1; $index <= 3; $index++) { 
            $months[] = [
                            'month_name' => $month_name[$index - 1],
                            'month' => ($request->year + 1) . '-' . str_pad($index,2,"0", STR_PAD_LEFT),
                        ];
        }

        $from = $months[0]['month'] . '-01';
        $to = $months[count($months) - 1]['month'] . '-31';
            
        // return $months;

        $data1 = ARFinding::groupBy('factor_id')
            ->with([
                'factor_info'
            ])
            ->selectRaw('count(*) as factor_count, factor_id')
            ->orderBy('factor_count', 'desc')
            // ->limit(10)
            ->whereHas('audit_result_info', function ($query) use($from, $to) {
                $query->whereDate('audit_date', '>=', $from);
                $query->whereDate('audit_date', '<=', $to);
            })
            ->get();

        $final_data = [];


        for ($index = 0; $index < count($data1); $index++) { 
            $ar_finding_data = [];
            $month_name = '';
            for ($index2 = 0; $index2 < count($months); $index2++) { 
                $year = explode('-', $months[$index2]['month'])[0];
                $month = explode('-', $months[$index2]['month'])[1];


                $ar_finding_count = ARFinding::with([
                    'audit_result_info',
                    'factor_info',
                ])

                ->where('factor_id', $data1[$index]->factor_id)
                // ->groupBy('factor_id')
                // ->selectRaw('count(*) as factor_count, factor_id')
                // ->orderBy('factor_count', 'desc')
                // ->limit(10)
                ->whereHas('audit_result_info', function ($query) use($year, $month) {
                    $query->whereYear('audit_date', $year);
                    $query->whereMonth('audit_date', $month);
                })
                ->count();

                $ar_finding_data[] = [
                    'month_name' => $months[$index2]['month_name'],
                    'count' => $ar_finding_count,
                    // 'year_month' => $year . '-' . $month,
                ];
            }

            $final_data[] = [
                'factor_id' => $data1[$index]->factor_info->id,
                'factor_name' => $data1[$index]->factor_info->name,
                'data' => $ar_finding_data,
            ];
        }

        // $final_data[] = [
        //     'factor_id' => 0,
        //     'factor_name' => 'Total',
        //     'data' => [],
        // ];

        $data1 = ARFinding::with([
                'audit_result_info',
                'factor_info',
            ])
            // ->groupBy('classification_id')
            // ->selectRaw('count(*) as classification_count, classification_id')
            // ->orderBy('classification_count', 'desc')
            // ->limit(10)
            // ->whereHas('aud')
            ->get();

        return response()->json(['data' => $final_data]);
    }
}
