<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RapidXUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class UserController extends Controller
{
    public function get_cbo_rapidx_users_by_stat(Request $request){
        date_default_timezone_set('Asia/Manila');

        $search = $request->search;

        if($search == ''){
            $datas = [];
        }
        else{
            $datas = RapidXUser::orderby('name','asc')->select('id','name')
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->where('user_stat', 1)
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
