<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendInternalBatchMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\Internal;
use App\Model\EmailRecipient;

class SendInternalBatchMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $internal_audit_id;
    public function __construct($internal_audit_id)
    {
        //
        $this->internal_audit_id = $internal_audit_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $internals = [];
        $responsible_department = [];
        // $internals = Internal::whereIn('internal_audit_id', $this->internal_audit_id)->get();

        $internals = Internal::with(
                        ['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments'])
                    ->withCount(['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }])
                    ->having('internal_departments_count', '>', 0)
                    ->whereIn('internal_audit_id', $this->internal_audit_id)
                    ->get();

        for($index = 0; $index < count($internals); $index++){
            for($index2 = 0; $index2 < count($internals[$index]->internal_departments); $index2++){
                $responsible_department[] = $internals[$index]->internal_departments[$index2]->departments[0]->department_id;
            }
        }


        $responsible_department = array_unique($responsible_department);
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

            $current_deparment = $responsible_department[$index];

            $internal_audits = Internal::with(
                        ['internal_departments' => function($query) use ($current_deparment){
                            $query->where('internal_department_stat', 1);
                            $query->where('responsible_department_id', $current_deparment);
                        }, 'internal_departments.departments'])
                    ->withCount(['internal_departments' => function($query) use ($current_deparment){
                            $query->where('internal_department_stat', 1);
                            $query->where('responsible_department_id', $current_deparment);
                        }])
                    ->having('internal_departments_count', '>', 0)
                    ->whereIn('internal_audit_id', $this->internal_audit_id)
                    ->get();

            $internal_audits_id = [];
            for($index2 = 0; $index2 < count($internal_audits); $index2++){
                $internal_audits_id[] = $internal_audits[$index2]->internal_audit_id;
            }

            $final_int_audits = Internal::with(['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                    ->whereIn('internal_audit_id', $internal_audits_id)
                    ->get();

            for($index2 = 0; $index2 < count($email_recipients); $index2++){
                if($email_recipients[$index2]->address_type == '1'){
                    $arrAddressTo[] = $email_recipients[$index2]->receiver_info->email;
                }
                else{
                    $arrCC[] = $email_recipients[$index2]->receiver_info->email;
                }
            }

            $newInternalBatchMail = new SendInternalBatchMail($final_int_audits, $department_name);
            Mail::to($arrAddressTo)->cc($arrCC)->send($newInternalBatchMail);
        }
    }
}