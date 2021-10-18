<?php

namespace App\Http\Controllers;

use App\Model\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class ClassificationController extends Controller
{
    public function view_classifications(Request $request){
        session_start();
        $classifications;
                    
        if(isset($request->status)){
            $classifications = Classification::all();
        }
        else {
            $classifications = Classification::where('status', $request->status)->get();
        }

        return DataTables::of($classifications)
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
                    $result .= '<button class="btn-actions btn btn-sm btn-success btnEditClassification" classification-id="' . $data->id . '" type="button" title="Edit"><i class="icon-edit2"></i></button> ';

                    $result .= '<button class="btn-actions btn btn-sm btn-danger btnActionClassification" type="button" classification-id="' . $data->id . '" status="2" title="Archive"><i class="icon-trash2"></i></button> ';

                    // $result .= '<button class="btn-actions btn btn-sm btn-info btnSelectClassification" type="button" classification-id="' . $data->id . '" classification-name="' . $data->name . '" title="Select"><i class="icon-arrow-right"></i></button> ';                   
                }
                else {
                    $result .= '<button class="btn-actions btn btn-sm btn-warning btnActionClassification" type="button" classification-id="' . $data->id . '" status="1" title="Restore"><i class="icon-history2"></i></button> ';               
                }

                return $result;
            })
            ->rawColumns(['raw_status', 'raw_action'])
            ->make(true);
    }

    public function save_classification(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [];


        if(!isset($request->classification_id)){
            $rules = [
                'name' => ['required'],
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    Classification::insert([
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
                'classification_id' => ['required'],
                'name' => ['required'],
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                DB::beginTransaction();
                try{

                    Classification::where('id', $request->classification_id)
                        ->update([
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

    public function get_classification_by_id(Request $request){
        session_start();
        $data = Classification::where('id', $request->classification_id)
                ->first();

        return response()->json(['data' => $data]);
    }

    public function action_classification(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [
            'classification_id' => ['required'],
            'status' => ['required'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            try{

                Classification::where('id', $request->classification_id)
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

    public function get_cbo_classifications_by_stat(Request $request){
        date_default_timezone_set('Asia/Manila');

        $search = $request->search;

        if($search == ''){
            $datas = [];
        }
        else{
            $datas = Classification::orderby('name','asc')->select('id','name')
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
