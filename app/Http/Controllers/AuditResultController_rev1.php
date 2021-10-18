<?php

namespace App\Http\Controllers;

use App\Model\AuditResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class AuditResultController extends Controller
{
    public function view_audit_results(Request $request){
        session_start();
        $audit_results;
                    
        if(isset($request->status)){
            $audit_results = AuditResult::all();
        }
        else {
            $audit_results = AuditResult::where('status', $request->status)->get();
        }

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
            ->addColumn('raw_action', function($data){
                $result = '';
                if($data->status == 1) {
                    $result .= '<button class="btn-actions btn btn-sm btn-success btnEditAuditResult" audit_result-id="' . $data->id . '" type="button" title="Edit"><i class="icon-edit2"></i></button> ';

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
            ->rawColumns(['raw_status', 'raw_action', 'raw_department'])
            ->make(true);
    }

    public function save_audit_result(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [];


        if(!isset($request->audit_result_id)){
            $rules = [
                'department' => ['required'],
                'name' => ['required'],
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    AuditResult::insert([
                            'department' => $request->department,
                            'name' => $request->name,
                            'status' => 1,
                            'created_by' => $_SESSION["rapidx_user_id"],
                            'last_updated_by' => $_SESSION["rapidx_user_id"],
                            'created_at' => date('Y-m-d H:i:s'),
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
        else{
            $rules = [
                'audit_result_id' => ['required'],
                'department' => ['required'],
                'name' => ['required'],
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    AuditResult::where('id', $request->audit_result_id)
                        ->update([
                            'department' => $request->department,
                            'name' => $request->name,
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
    }

    public function get_audit_result_by_id(Request $request){
        session_start();
        $data = AuditResult::where('id', $request->audit_result_id)
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
}
