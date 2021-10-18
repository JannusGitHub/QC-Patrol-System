<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Mail;

// MODELS
use App\Model\AuditResult;
use App\Model\ARSection;
use App\Model\ARProductLine;
use App\Model\ARAuditor;
use App\Model\ARAuditee;
use App\Model\AREmailRecipient;
use App\Exports\AuditResultsExport; // Update by Jannus
use App\Model\FactorItemList; // Update by Jannus

// PACKAGES
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class AuditResultController extends Controller
{
    public function view_audit_results(Request $request){
        session_start();
        $audit_results;
                    
        // if(isset($request->status)){
            $audit_results = AuditResult::with([
                    'checked_by_info',
                    'product_line_details.product_line_info',
                    'section_details.section_info',
                    'auditor_details.user_info',
                    'auditee_details.user_info',
                ])
                ->where('layer', $request->layer)
                ->get();
        // }
        // else {
        //     $audit_results = AuditResult::where('status', $request->status)
        //     ->where('layer', $request->layer)            
        //     ->get();
        // }

        return DataTables::of($audit_results)
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
            ->addColumn('raw_audit_status', function($data){
                $result = "";

                if($data->audit_status == 1){
                    $result .= '<span class="tag tag-warning">For Checking</span>';
                }
                else if($data->audit_status == 2){
                    $result .= '<span class="tag tag-primary">For CAPA</span>';
                }
                else if($data->audit_status == 3){
                    $result .= '<span class="tag tag-info">For Close Out</span>';
                }
                else if($data->audit_status == 4){
                    $result .= '<span class="tag tag-success">Closed</span>';
                }
                else{
                    $result .= '<span class="tag tag-danger">Unclosed</span>';
                }

                return $result;
            })
            ->addColumn('raw_action', function($data){
                $result = '';
                if($data->status == 1) {
                    $result .= '<button class="btn-actions btn btn-sm btn-success btnEditAuditResult" audit_result-id="' . $data->id . '" type="button" title="Edit" layer="' . $data->layer . '"><i class="icon-edit2"></i></button> ';

                    $result .= '<button class="btn-actions btn btn-sm btn-danger btnActionAuditResult" type="button" audit_result-id="' . $data->id . '" status="2" title="Archive"><i class="icon-trash2"></i></button> ';

                    // $result .= '<button class="btn-actions btn btn-sm btn-info btnSelectAuditResult" type="button" audit_result-id="' . $data->id . '" audit_result-name="' . $data->name . '" title="Select"><i class="icon-arrow-right"></i></button> ';
                }
                else {
                    $result .= '<button class="btn-actions btn btn-sm btn-warning btnActionAuditResult" type="button" audit_result-id="' . $data->id . '" status="1" title="Restore"><i class="icon-history2"></i></button> ';               
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
            ->rawColumns(['raw_status', 'raw_action', 'raw_department', 'raw_audit_status'])
            ->make(true);
    }

    // public function view_audit_results_layer2(Request $request){
    //     session_start();
    //     $audit_results;
                    
    //     // if(isset($request->status)){
    //         $audit_results = AuditResult::with([
    //                 // 'checked_by_info',
    //                 'section_details.section_info',
    //                 'auditor_details.user_info',
    //                 'auditee_details.user_info',
    //             ])
    //             ->where('layer', 2)
    //             ->get();
    //     // }
    //     // else {
    //     //     $audit_results = AuditResult::where('status', $request->status)
    //     //     ->where('layer', $request->layer)            
    //     //     ->get();
    //     // }

    //     return DataTables::of($audit_results)
    //         ->addColumn('raw_status', function($data){
    //             $result = "";

    //             if($data->status == 1){
    //                 $result .= '<span class="tag tag-success">Active</span>';
    //             }
    //             else{
    //                 $result .= '<span class="tag tag-danger">Inactive</span>';
    //             }

    //             return $result;
    //         })
    //         ->addColumn('raw_audit_status', function($data){
    //             $result = "";

    //             if($data->audit_status == 1){
    //                 $result .= '<span class="tag tag-warning">For Checking</span>';
    //             }
    //             else if($data->audit_status == 2){
    //                 $result .= '<span class="tag tag-primary">For CAPA</span>';
    //             }
    //             else if($data->audit_status == 3){
    //                 $result .= '<span class="tag tag-info">For Close Out</span>';
    //             }
    //             else if($data->audit_status == 4){
    //                 $result .= '<span class="tag tag-success">Closed</span>';
    //             }
    //             else{
    //                 $result .= '<span class="tag tag-danger">Unclosed</span>';
    //             }

    //             return $result;
    //         })
    //         ->addColumn('raw_action', function($data){
    //             $result = '';
    //             if($data->status == 1) {
    //                 $result .= '<button class="btn-actions btn btn-sm btn-success btnEditAuditResult" audit_result-id="' . $data->id . '" type="button" title="Edit" layer="' . $data->layer . '"><i class="icon-edit2"></i></button> ';

    //                 $result .= '<button class="btn-actions btn btn-sm btn-danger btnActionAuditResult" type="button" audit_result-id="' . $data->id . '" status="2" title="Archive"><i class="icon-trash2"></i></button> ';

    //                 // $result .= '<button class="btn-actions btn btn-sm btn-info btnSelectAuditResult" type="button" audit_result-id="' . $data->id . '" audit_result-name="' . $data->name . '" title="Select"><i class="icon-arrow-right"></i></button> ';
    //             }
    //             else {
    //                 $result .= '<button class="btn-actions btn btn-sm btn-warning btnActionAuditResult" type="button" audit_result-id="' . $data->id . '" status="1" title="Restore"><i class="icon-history2"></i></button> ';               
    //             }

    //             return $result;
    //         })
    //         ->addColumn('raw_department', function($data){
    //             $result = "";

    //             if($data->department == 1){
    //                 $result .= 'TS';
    //             }
    //             else if($data->department == 2){
    //                 $result .= 'PPS';
    //             }
    //             else if($data->department == 3){
    //                 $result .= 'CN';
    //             }
    //             else{
    //                 $result .= 'YF';
    //             }

    //             return $result;
    //         })
    //         ->rawColumns(['raw_status', 'raw_action', 'raw_department', 'raw_audit_status'])
    //         ->make(true);
    // }

    public function save_audit_result(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        // $rules = [];

        // if($request->layer == 1){

            // if audit_result_id is not set/empty then execute insert operation else update
            if(!isset($request->audit_result_id)){
                $rules = [
                    'layer' => 'required',
                    'audit_date' => 'required',
                    // 'issued_date' => 'required',
                    // 'checked_by' => 'required', 10-16-2021 - Jannus
                    'due_date' => 'required',
                    'issued_date' => 'required',
                    'product_line_id' => 'required',
                    // 'due_date' => 'required',
                    'commendation' => 'required',
                    'auditors' => 'required',
                    'auditees' => 'required',
                    'audit_status' => 'required',
                    'section_id' => 'required',
                ];

                if($request->layer == 1){
                    $rules['checked_by'] = 'required';
                }
                // else{
                //     $rules['due_date'] = 'required';
                //     $rules['issued_date'] = 'required';
                // }

                $messages = [
                    'layer.required' => 'Layer field is required.',
                    'audit_date.required' => 'Audit Date field is required.',
                    'issued_date.required' => 'Issued Date field is required.',
                    'checked_by.required' => 'Checked By field is required.',
                    'product_line_id.required' => 'Department / Section field is required.',
                    'due_date.required' => 'Due Date field is required.',
                    'commendation.required' => 'Commendation field is required.',
                    'auditors.required' => 'Auditors field is required.',
                    'auditees.required' => 'Auditees field is required.',
                    'audit_status.required' => 'Audit Status field is required.',
                    'section_id.required' => 'Responsible Section field is required.',
                ];

                $validator = Validator::make($data, $rules, $messages);

                if ($validator->passes()) {
                    DB::beginTransaction();
                    try{
                        $auditee_manual = '';

                        if(isset($request->auditee_manual)){
                            $auditee_manual = implode(',', $request->auditee_manual);
                        }

                        $audit_result_id = AuditResult::insertGetId([
                                'layer' => $request->layer,
                                'audit_date' => $request->audit_date,
                                'issued_date' => $request->issued_date,
                                'checked_by' => $request->checked_by,
                                // 'section_id' => $request->section_id,
                                'due_date' => $request->due_date,
                                // 'auditors' => $request->auditors,
                                // 'auditees' => $request->auditees,
                                'auditee_manual' => $auditee_manual,
                                // 'factor_id' => $request->factor_id,
                                'commendation' => $request->commendation,
                                'audit_status' => $request->audit_status,
                                'status' => 1,
                                'update_version' => 1,
                                'created_by' => $_SESSION["rapidx_user_id"],
                                'last_updated_by' => $_SESSION["rapidx_user_id"],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ]
                        );

                        if(isset($request->product_line_id)){
                            if(count($request->product_line_id) > 0){
                                for($index = 0; $index < count($request->product_line_id); $index++){
                                    ARProductLine::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'product_line_id' => $request->product_line_id[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->section_id)){
                            if(count($request->section_id) > 0){
                                for($index = 0; $index < count($request->section_id); $index++){
                                    ARSection::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'section_id' => $request->section_id[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->auditors)){
                            if(count($request->auditors) > 0){
                                for($index = 0; $index < count($request->auditors); $index++){
                                    ARAuditor::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'user_id' => $request->auditors[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->auditees)){
                            if(count($request->auditees) > 0){
                                for($index = 0; $index < count($request->auditees); $index++){
                                    ARAuditee::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'user_id' => $request->auditees[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->email_recepient_attention)){
                            if(count($request->email_recepient_attention) > 0){
                                for($index = 0; $index < count($request->email_recepient_attention); $index++){
                                    AREmailRecipient::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'user_id' => $request->email_recepient_attention[$index],
                                        'type' => 1,
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->email_recepient_cc)){
                            if(count($request->email_recepient_cc) > 0){
                                for($index = 0; $index < count($request->email_recepient_cc); $index++){
                                    AREmailRecipient::insert([
                                        'audit_result_id' => $audit_result_id,
                                        'user_id' => $request->email_recepient_cc[$index],
                                        'type' => 2,
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        // $this->send_audit_result_email($audit_result_id);

                        DB::commit();
                        return response()->json(['result' => 1, 'audit_result_id' => $audit_result_id]);
                    }
                    catch(\Exeption $e){
                        DB::rollback();
                        return response()->json(['result' => 0, 'exception' => $e]);
                    }
                }
                else{
                    return response()->json(['result' => '0', 'error' => $validator->messages()]);
                }
            }
            else{
                $rules = [
                    // 'layer' => 'required',
                    'audit_date' => 'required',
                    // 'issued_date' => 'required',
                    'checked_by' => 'required',
                    'due_date' => 'required',
                    'issued_date' => 'required',
                    'product_line_id' => 'required',
                    'section_id' => 'required',
                    // 'due_date' => 'required',
                    'commendation' => 'required',
                    'auditors' => 'required',
                    'auditees' => 'required',
                    'audit_status' => 'required',
                ];

                // if($request->layer == 1){
                //     $rules['checked_by'] = 'required';
                // }
                // else{
                //     $rules['issued_date'] = 'required';
                //     $rules['due_date'] = 'required';
                // }

                $messages = [
                    // 'layer.required' => 'Layer field is required.',
                    'audit_date.required' => 'Audit Date field is required.',
                    'issued_date.required' => 'Issued Date field is required.',
                    'checked_by.required' => 'Checked By field is required.',
                    'product_line_id.required' => 'Department / Section field is required.',
                    'section_id.required' => 'Responsible Section field is required.',
                    'due_date.required' => 'Due Date field is required.',
                    'commendation.required' => 'Commendation field is required.',
                    'auditors.required' => 'Auditors field is required.',
                    'auditees.required' => 'Auditees field is required.',
                    'audit_status.required' => 'Audit Status field is required.',
                ];

                $validator = Validator::make($data, $rules, $messages);

                if ($validator->passes()) {
                    DB::beginTransaction();
                    try{
                        $auditee_manual = '';

                        if(isset($request->auditee_manual)){
                            $auditee_manual = implode(',', $request->auditee_manual);
                        }

                        AuditResult::where('id', $request->audit_result_id)
                            ->increment('update_version', 1,
                            [
                                // 'layer' => $request->layer,
                                'audit_date' => $request->audit_date,
                                'issued_date' => $request->issued_date,
                                'checked_by' => $request->checked_by,
                                'due_date' => $request->due_date,
                                'auditee_manual' => $auditee_manual,
                                'commendation' => $request->commendation,
                                'audit_status' => $request->audit_status,
                                'last_updated_by' => $_SESSION["rapidx_user_id"],
                                'updated_at' => date('Y-m-d H:i:s'),
                            ]);

                        ARProductLine::where('audit_result_id', $request->audit_result_id)
                        ->delete();
                        if(isset($request->product_line_id)){
                            if(count($request->product_line_id) > 0){
                                for($index = 0; $index < count($request->product_line_id); $index++){
                                    ARProductLine::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'product_line_id' => $request->product_line_id[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        ARSection::where('audit_result_id', $request->audit_result_id)
                        ->delete();
                        if(isset($request->section_id)){
                            if(count($request->section_id) > 0){
                                for($index = 0; $index < count($request->section_id); $index++){
                                    ARSection::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'section_id' => $request->section_id[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        ARAuditor::where('audit_result_id', $request->audit_result_id)
                        ->delete();
                        if(isset($request->auditors)){
                            if(count($request->auditors) > 0){
                                for($index = 0; $index < count($request->auditors); $index++){
                                    ARAuditor::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'user_id' => $request->auditors[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        ARAuditee::where('audit_result_id', $request->audit_result_id)
                        ->delete();
                        if(isset($request->auditees)){
                            if(count($request->auditees) > 0){

                                for($index = 0; $index < count($request->auditees); $index++){
                                    ARAuditee::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'user_id' => $request->auditees[$index],
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        AREmailRecipient::where('audit_result_id', $request->audit_result_id)
                        ->delete();

                        if(isset($request->email_recepient_attention)){
                            if(count($request->email_recepient_attention) > 0){
                                for($index = 0; $index < count($request->email_recepient_attention); $index++){
                                    AREmailRecipient::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'user_id' => $request->email_recepient_attention[$index],
                                        'type' => 1,
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        if(isset($request->email_recepient_cc)){
                            if(count($request->email_recepient_cc) > 0){
                                for($index = 0; $index < count($request->email_recepient_cc); $index++){
                                    AREmailRecipient::insert([
                                        'audit_result_id' => $request->audit_result_id,
                                        'user_id' => $request->email_recepient_cc[$index],
                                        'type' => 2,
                                        'status' => 1,
                                        'created_by' => $_SESSION["rapidx_user_id"],
                                        'last_updated_by' => $_SESSION["rapidx_user_id"],
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
                                }
                            }
                        }

                        // $this->send_audit_result_email($request->audit_result_id);

                        DB::commit();
                        return response()->json(['result' => 1, 'audit_result_id' => $request->audit_result_id]);
                    }
                    catch(\Exeption $e){
                        DB::rollback();
                        return response()->json(['result' => 0, 'exception' => $e]);
                    }
                }
                else{
                    return response()->json(['result' => '0', 'error' => $validator->messages()]);
                }
            }
        // }

        // else if($request->layer == 2){ // LAYER 2

        // }

        // else if($request->layer == 3){ // LAYER 3
            
        // }
    }

    public function get_audit_result_by_id(Request $request){
        session_start();
        $data = AuditResult::where('id', $request->audit_result_id)
                ->with([
                    'checked_by_info',
                    'product_line_details.product_line_info',
                    'section_details.section_info',
                    'auditor_details.user_info',
                    'auditee_details.user_info',
                    'ar_email_recipient_details.user_info',
                ])
                ->first();

        return response()->json(['data' => $data]);
    }

    public function action_audit_result(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [
            'audit_result_id' => ['required'],
            'status' => ['required'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            try{

                AuditResult::where('id', $request->audit_result_id)
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

    public function get_cbo_audit_results_by_stat(Request $request){
        date_default_timezone_set('Asia/Manila');

        $search = $request->search;

        if($search == ''){
            $datas = [];
        }
        else{
            $datas = AuditResult::orderby('name','asc')->select('id','name')
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

    public function export_audit_result(Request $request){
        session_start();
        $data = AuditResult::where('id', $request->audit_result_id)
                ->with([
                    'checked_by_info',
                    'product_line_details.product_line_info',
                    'auditor_details.user_info',
                    'auditee_details.user_info',
                    'ar_email_recipient_details.user_info', // rapidx users
                    'ar_finding_details',
                    'ar_finding_details.in_charge_details.user_info', // rapidx user
                    'ar_finding_details.classification_info',
                ])
                ->first();
        
        // MAN
        $factor_item_list = FactorItemList::where('factor_id', 1)->with([
            'factor'
        ])->orderBy('name', 'ASC')->get();
        
        // Machine
        $factor_item_list_machine = FactorItemList::where('factor_id', 3)->with([
            'factor'
        ])->orderBy('name', 'ASC')->get();
        
        // Method
        $factor_item_list_method = FactorItemList::where('factor_id', 2)->with([
            'factor'
        ])->orderBy('name', 'ASC')->get();
        
        // Material
        $factor_item_list_material = FactorItemList::where('factor_id', 5)->with([
            'factor'
        ])->orderBy('name', 'ASC')->get();
        
        // Flow of non-conforming
        $factor_item_list_non_forming = FactorItemList::where('factor_id', 4)->with([
            'factor'
        ])->orderBy('name', 'ASC')->get();
        // dd($factor_item_list);

        return Excel::download(new AuditResultsExport($data, $factor_item_list, $factor_item_list_machine, $factor_item_list_method, $factor_item_list_material, $factor_item_list_non_forming), 'QC Patrol Audit Result - ' . date('Y-m-d H:i:s') . '.xlsx');
        // return Excel::create('QC Patrol Audit Result - ' . date('Y-m-d H:i:s') . '.xlsx', function($excel) use ($data) {
        //     $excel->setTitle('Data Export');
        //     $excel->setCreator('OCIS')->setCompany('HGF Limited');
        //     $excel->setDescription('Data export from OCIS');

        //     $excel->sheet('Sheet1', function ($sheet) use ($data) {
        //         // $data = array(
        //         //     'headers' => $headers,
        //         //     'rows' => $rows
        //         // );

        //         $sheet->setWidth('B', 16);
        //         $sheet->setWidth('C', 43);
        //         $sheet->setWidth('D', 13);
        //         $sheet->setWidth('E', 43);
        //         $sheet->setWidth('F', 10.5);
        //         $sheet->setWidth('G', 17.6);
        //         $sheet->setWidth('H', 14);
        //         $sheet->setWidth('I', 15.3);
        //         $sheet->setWidth('J', 14);
        //         $sheet->setWidth('K', 15.3);
        //         $sheet->setWidth('L', 14);
        //         $sheet->setWidth('M', 15.3);
        //         $sheet->setWidth('N', 16);
        //         $sheet->setWidth('O', 200);

        //         $sheet->loadView('exports.audit_results')
        //             ->with('data', $data);
        //     });
        // })->download('xlsx');
        // $col_departments = collect($data->product_line_details)->pluck('product_line_info')->flatten(1)->pluck('name')->flatten(1)->toArray();

        // $auditee_manual = '';
        // $arr_auditee_manual = [];

        // if($data->auditee_manual != null){
        //     $auditee_text = [
        //         'Technician',
        //         'QC',
        //         'MH',
        //         'Operator',
        //     ];
        //     $exp_auditee_manual = explode(',', $data->auditee_manual);

        //     // return $exp_auditee_manual[0] - 1;

        //     for($index = 0; $index < count($exp_auditee_manual); $index++){
        //         $arr_auditee_manual[] =  $auditee_text[$exp_auditee_manual[$index] - 1];
        //     }
        //     $auditee_manual = ' / ' . implode(' / ', $arr_auditee_manual);
        // }

        // return $auditee_manual;
        // return implode(' / ', $col_departments);
        // return response()->json(['data' => $data]);
        return view('exports.audit_results')->with(['data' => $data]);
    }

    // public function send_audit_result_email(Request $request){
    public function send_audit_result_email($audit_result_id){
        // session_start();
        $audit_result = AuditResult::where('id', $audit_result_id)
                ->with([
                    'checked_by_info', // rapidx users
                    'product_line_details.product_line_info',
                    'section_details.section_info',
                    'auditor_details.user_info',
                    'auditee_details.user_info',
                    'ar_email_recipient_details.user_info', // rapidx users
                    'ar_finding_details',
                    'ar_finding_details.in_charge_details.user_info',
                    'ar_finding_details.classification_info',
                    'ar_finding_details.factor_info',
                    'ar_finding_details.factor_item_list_info',
                ])
                ->first();

        // return $audit_result;

        $to_email = [];
        $cc_email = [];

        // $to_email = [
        //     'apbautista@pricon.ph',
        //     'dfamandoron@pricon.ph',
        //     // 'jgsulit@pricon.ph',
        //     // 'jnpineda@pricon.ph',
        // ];

        // return $data;

        $subject = '';

        if($audit_result != null){
            if($audit_result->audit_status == 1){
                $subject = 'For Checking';
                if($audit_result->checked_by_info->email != null){ // rapidx users email
                    $to_email[] = $audit_result->checked_by_info->email;
                }
            }
            else{
                if($audit_result->audit_status == 2){
                    $subject = 'For CAPA';
                }
                else if($audit_result->audit_status == 3){
                    $subject = 'For Close Out';
                }
                else if($audit_result->audit_status == 4){
                    $subject = 'Closed</span';
                }
                else{
                    $subject = 'Unclosed</span';
                }

                // user_info() in AREmailRecipient Model - rapidx users
                $to_email = collect($audit_result->ar_email_recipient_details)->where('type', 1)->pluck('user_info')->flatten(1)->pluck('email')->flatten(1)->toArray();
                $cc_email = collect($audit_result->ar_email_recipient_details)->where('type', 2)->pluck('user_info')->flatten(1)->pluck('email')->flatten(1)->toArray();
            }
        }

        // $subject = 'For Checking';

        // print_r($to_email);
        // echo $to_email;
        // exit();
        // return ;

        $data = [
            'data' => $audit_result,
            'subject' => $subject,
        ];

        // $email_recipients = [
        //     'to' => $to_email,
        //     'cc' => $cc_email,
        // ];

        $email_recipients = [
            'to' => $to_email,
            'cc' => $cc_email,
        ];

        // return $to_email;

        // return view('mail.audit_result.for_capa')->with(['data' => $audit_result, 'subject' => $subject]);

        try {
            
            $mail = Mail::send('mail.audit_result.for_capa', $data, function($message) use ($email_recipients, $data) {
                $message->to($email_recipients['to'])
                ->cc($email_recipients['cc'])
                ->subject('QC Patrol - ' . $data['subject']);
            });
          
            return response()->json(['result' => 1]);
        } 
        catch (Exception $e) {
            return response()->json(['result' => 0]);
        }

    }


    public function btn_send_audit_result_email(Request $request){
        // session_start();
        $audit_result = AuditResult::where('id', $request->audit_result_id)
                ->with([
                    'checked_by_info',
                    'product_line_details.product_line_info',
                    'section_details.section_info',
                    'auditor_details.user_info',
                    'auditee_details.user_info',
                    'ar_email_recipient_details.user_info',
                    'ar_finding_details',
                    'ar_finding_details.in_charge_details.user_info',
                    'ar_finding_details.classification_info',
                    'ar_finding_details.factor_info',
                    'ar_finding_details.factor_item_list_info',
                ])
                ->first();

        // return $audit_result;

        $to_email = [];
        $cc_email = [];

        // $to_email = [
        //     'apbautista@pricon.ph',
        //     'dfamandoron@pricon.ph',
        //     // 'jgsulit@pricon.ph',
        //     // 'jnpineda@pricon.ph',
        // ];

        // return $data;

        $subject = '';

        if($audit_result != null){
            // if "For Checking" then send to users email only
            if($audit_result->audit_status == 1){
                $subject = 'For Checking';
                if($audit_result->checked_by_info->email != null){ // rapidx users email
                    $to_email[] = $audit_result->checked_by_info->email;
                    // $cc_email = collect($audit_result->ar_email_recipient_details)->where('type', 2)->pluck('user_info')->flatten(1)->pluck('email')->flatten(1)->toArray();
                }
            }
            // else then send to email recipients
            else{
                if($audit_result->audit_status == 2){
                    $subject = 'For CAPA';
                }
                else if($audit_result->audit_status == 3){
                    $subject = 'For Close Out';
                }
                else if($audit_result->audit_status == 4){
                    $subject = 'Closed</span';
                }
                else{
                    $subject = 'Unclosed</span';
                }

                // user_info() in AREmailRecipient Model - rapidx users
                $to_email = collect($audit_result->ar_email_recipient_details)->where('type', 1)->pluck('user_info')->flatten(1)->pluck('email')->flatten(1)->toArray();
                $cc_email = collect($audit_result->ar_email_recipient_details)->where('type', 2)->pluck('user_info')->flatten(1)->pluck('email')->flatten(1)->toArray();
            }
        }

        // $subject = 'For Checking';

        // print_r($to_email);
        // print_r($cc_email);
        // exit();
        // return ;

        $data = [
            'data' => $audit_result,
            'subject' => $subject,
        ];

        // $email_recipients = [
        //     'to' => $to_email,
        //     'cc' => $cc_email,
        // ];

        $email_recipients = [
            'to' => $to_email,
            'cc' => $cc_email,
        ];

        // print_r($to_email);
        // print_r($cc_email);
        // exit();

        // return $to_email;

        // return view('mail.audit_result.for_capa')->with(['data' => $audit_result, 'subject' => $subject]);

        try {
            
            $mail = Mail::send('mail.audit_result.for_capa', $data, function($message) use ($email_recipients, $data) {
                $message->to($email_recipients['to'])
                ->cc($email_recipients['cc'])
                ->subject('QC Patrol - ' . $data['subject']);
            });
          
            return response()->json(['result' => 1]);
        } 
        catch (Exception $e) {
            return response()->json(['result' => 0]);
        }

    }
}
