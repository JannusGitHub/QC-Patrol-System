<?php

namespace App\Http\Controllers;

use App\Model\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class DepartmentController extends Controller
{
    //
    public function get_department_by_stat(Request $request){
    	session_start();
		$departments;
		if($request->department_stat == 0){
			$departments = Department::on('rapidx')->get();
		}
		else{
			$departments = Department::on('rapidx')->where('department_stat', $request->department_stat)->get();
		}
		return response()->json(['departments' => $departments]);
	}
}
