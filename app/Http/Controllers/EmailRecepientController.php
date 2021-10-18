<?php

namespace App\Http\Controllers;

use App\Model\EmailRecipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;

class EmailRecipientController extends Controller
{
    public function view_email_recipient_by_stat(Request $request){
        session_start();
        $email_recipients = EmailRecipient::with([
                                        'department',
                                        'receiver_info',
                                    ])
                                    ->get();

        return DataTables::of($email_recipients)
            ->addColumn('label1', function($email_recipient){
                $result = "";

                if($email_recipient->email_recipient_stat == 1){
                    $result .= '<span class="tag tag-success">Active</span>';
                }
                else{
                    $result .= '<span class="tag tag-danger">Inactive</span>';
                }

                return $result;
            })
            ->addColumn('action1', function($email_recipient){
                $result = '';
                // $result = '<button class="btn btn-primary aEditEmailRecipient" type="button" email-recipient-id="' . $email_recipient->email_recipient_id . '" data-toggle="modal" data-target="#modalEditEmailRecipient" data-keyboard="false">Edit</button> ';
                if($email_recipient->email_recipient_stat == 1){
                    $result .= '<button class="btn btn-danger aRemoveEmailRecipient" type="button" email-recipient-id="' . $email_recipient->email_recipient_id . '" data-toggle="modal" data-target="#modalRemoveEmailRecipient" data-keyboard="false">Remove</button>';
                }

                return $result;
            })
            ->addColumn('address_type_label', function($email_recipient){
                $result = "";

                if($email_recipient->address_type == 1){
                    $result .= 'Attention To';
                }
                else{
                    $result .= 'Carbon Copy';
                }

                return $result;
            })
            ->rawColumns(['action1', 'label1', 'address_type_label'])
            ->make(true);
    }

    public function add_email_recipient(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $validator = Validator::make($data, [
            'section_id' => ['required', 'numeric'],
            'receiver' => ['required', 'numeric'],
            'address_type' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();

            try{
                $email_recipients = EmailRecipient::where('section_id', $request->section_id)
                                    ->where('receiver', $request->receiver)
                                    ->get();

                if(count($email_recipients) > 0){
                    return response()->json(['result' => "0"]);
                }

                EmailRecipient::insert([
                    'section_id' => $request->section_id,
                    'receiver' => $request->receiver,
                    'address_type' => $request->address_type,
                    'email_recipient_stat' => 1,
                    'created_by' => $_SESSION['rapidx_user_id'],
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                DB::commit();
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0", 'error' => $e]);
            }
        }
    }

    public function remove_email_recipient(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        DB::beginTransaction();

        try{
            EmailRecipient::where('email_recipient_id', $request->email_recipient_id)
                ->delete();
            DB::commit();
            return response()->json(['result' => "1"]);
        }
        catch(\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0"]);
        }  
    }
}
