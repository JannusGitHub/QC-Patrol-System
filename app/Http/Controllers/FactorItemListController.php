<?php

namespace App\Http\Controllers;

use App\Model\FactorItemList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class FactorItemListController extends Controller
{
    public function view_factor_item_lists(Request $request){
        session_start();
        $factors;
                    
        // if(!isset($request->status)){
        // 	$factors = FactorItemList::where('factor_id', $request->factor_id)->get();
        // }
        // else {
        // 	$factors = FactorItemList::where('factor_id', $request->factor_id)->where('status', $request->status)->get();
        // }

        $factors = FactorItemList::where('factor_id', $request->factor_id)
                ->where('layer', $request->layer)
                ->get();

        return DataTables::of($factors)
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
                    $result .= '<button class="btn-actions btn btn-sm btn-success btnEditFactorItemList" factor-item-list-id="' . $data->id . '" type="button" title="Edit"><i class="icon-edit2"></i></button> ';

                    $result .= '<button class="btn-actions btn btn-sm btn-danger btnActionFactorItemList" type="button" factor-item-list-id="' . $data->id . '" status="2" title="Archive"><i class="icon-trash2"></i></button> ';
                }
                else {
                    $result .= '<button class="btn-actions btn btn-sm btn-warning btnActionFactorItemList" type="button" factor-item-list-id="' . $data->id . '" status="1" title="Restore"><i class="icon-history2"></i></button> ';
                }

                return $result;
            })
            ->addColumn('raw_item_status', function($data){
                $result = "";

                if($data->item_status == 1){
                    $result .= '<center><i class="fa fa-check-circle text-success" style="font-size: 20px;"></center>';
                }
                else{
                    $result .= '<center><i class="fa fa-times-circle text-danger" style="font-size: 20px;"></i></center>';
                }

                return $result;
            })
            ->rawColumns(['raw_status', 'raw_action', 'raw_item_status'])
            ->make(true);
    }

    public function save_factor_item_list(Request $request){
    	date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $rules = [];


        if(!isset($request->factor_item_list_id)){
	        $rules = [
                'name' => ['required'],
	            'layer' => ['required'],
	        ];

            $item_status = 0;
            if(isset($request->item_status)){
                $item_status = 1;
            }
            else{
                $rules['remarks'] = 'required';
            }

	        $validator = Validator::make($data, $rules);

	        if ($validator->passes()) {
	            DB::beginTransaction();
	            try{

	                FactorItemList::insert([
                            'name' => $request->name,
                            'layer' => $request->layer,
                            'item_status' => $item_status,
	                        'remarks' => $request->remarks,
	                        'factor_id' => $request->factor_id,
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
	            'factor_item_list_id' => ['required'],
	            'name' => ['required'],
                'layer' => ['required'],
	        ];

            $item_status = 0;
            if(isset($request->item_status)){
                $item_status = 1;
            }
            else{
                $rules['remarks'] = 'required';
            }

	        $validator = Validator::make($data, $rules);

	        if ($validator->passes()) {
	            DB::beginTransaction();
	            try{

	                FactorItemList::where('id', $request->factor_item_list_id)
	                    ->update([
	                        'name' => $request->name,
                            'layer' => $request->layer,
                            'item_status' => $item_status,
                            'remarks' => $request->remarks,
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

    public function get_factor_item_list_by_id(Request $request){
        session_start();
        $data = FactorItemList::where('id', $request->factor_item_list_id)
                ->first();

        return response()->json(['data' => $data]);
    }

    public function action_factor_item_list(Request $request){
    	date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

    	$rules = [
            'factor_item_list_id' => ['required'],
            'status' => ['required'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            try{

                FactorItemList::where('id', $request->factor_item_list_id)
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

    public function get_cbo_factor_item_lists_by_stat(Request $request){
        date_default_timezone_set('Asia/Manila');

        $search = $request->search;

        if($search == ''){
            $datas = [];
        }
        else{
            $datas = FactorItemList::orderby('name','asc')->select('id','name')
                        ->where('factor_id', $request->factor_id)
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
