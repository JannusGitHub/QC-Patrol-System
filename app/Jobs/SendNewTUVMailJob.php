<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendNewTUVMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\TUV;
use App\Model\EmailRecipient;

class SendNewTUVMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $tuv_audit_id;
    public function __construct($tuv_audit_id)
    {
        //
        $this->tuv_audit_id = $tuv_audit_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tuvs = [];
        $responsible_department = [];
        $tuvs = TUV::with(['tuv_departments' => function($query){
                            $query->where('tuv_department_stat', 1);
                        }, 'tuv_departments.departments'])
                    ->where('tuv_audit_id', $this->tuv_audit_id)
                    ->get();


        for($index = 0; $index < count($tuvs); $index++){
            for($index2 = 0; $index2 < count($tuvs[$index]->tuv_departments); $index2++){
                $responsible_department[] = $tuvs[$index]->tuv_departments[$index2]->departments[0]->department_id;
            }
        }

        $departments = Department::whereIn('department_id', $responsible_department)->get();

        $department_name = '';

        for($index = 0; $index < count($responsible_department); $index++) {
            for($index2 = 0; $index2 < count($departments); $index2++){
                if($responsible_department[$index] == $departments[$index2]->department_id){
                    $department_name = $departments[$index2]->department_name;
                    break;
                }
            }

            $arrAddressTo = [];
            $arrCC = [];
            $email_recipients = EmailRecipient::with([
                'department',
                'receiver_info',
            ])
            ->where('department_id', $responsible_department[$index])
            ->get();

            for($index2 = 0; $index2 < count($email_recipients); $index2++){
                if($email_recipients[$index2]->address_type == '1'){
                    $arrAddressTo[] = $email_recipients[$index2]->receiver_info->email;
                }
                else{
                    $arrCC[] = $email_recipients[$index2]->receiver_info->email;
                }
            }

            $newTUVMail = new SendNewTUVMail($tuvs, $department_name);
            Mail::to($arrAddressTo)->cc($arrCC)->send($newTUVMail);
        }
    }
}
