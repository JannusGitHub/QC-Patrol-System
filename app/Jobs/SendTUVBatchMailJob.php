<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendTUVBatchMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\TUV;
use App\Model\EmailRecipient;
class SendTUVBatchMailJob implements ShouldQueue
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
        $arr_responsible_department_id = [];
        $arr_responsible_department_name = [];

        $tuvs = TUV::with(
                        ['tuv_departments' => function($query){
                            $query->where('tuv_department_stat', 1);
                        }, 'tuv_departments.departments', 'user_created_by', 'user_last_updated_by', 'tuv_corr_per_in_charges', 'tuv_con_per_in_charges', 'tuv_sys_per_in_charges', 'tuv_corr_per_in_charges.tuv_corr_per_in_charge_record', 'tuv_con_per_in_charges.tuv_con_per_in_charge_record', 'tuv_sys_per_in_charges.tuv_sys_per_in_charge_record'])
                    ->withCount(['tuv_departments' => function($query){
                            $query->where('tuv_department_stat', 1);
                        }])
                    ->having('tuv_departments_count', '>', 0)
                    ->whereIn('tuv_audit_id', $this->tuv_audit_id)
                    ->get();


        $final_tuv_audits = [];

        $collect_tuvs = collect($tuvs);

        for($index = 0; $index < count($tuvs); $index++){
            for($index2 = 0; $index2 < count($tuvs[$index]->tuv_departments); $index2++){
                $arr_responsible_department_id[] = $tuvs[$index]->tuv_departments[$index2]->departments[0]->department_id;
                $arr_responsible_department_name[] = $tuvs[$index]->tuv_departments[$index2]->departments[0]->department_name;
            }
        }

        $email_recipients = EmailRecipient::with([
                'department',
                'receiver_info',
            ])
            ->whereIn('department_id', $arr_responsible_department_id)
            ->get();

        $arrAddressTo = [];
        $arrCC = [];

        for($index = 0; $index < count($arr_responsible_department_id); $index++){
            $current_res_dept_id = $arr_responsible_department_id[$index];

            $collected_tuvs_per_department = $collect_tuvs->filter(function ($value, $key) use ($current_res_dept_id) {
                                                return collect($value['tuv_departments'])->contains('responsible_department_id', $current_res_dept_id);
                                            });           $final_tuv_audits = $collected_tuvs_per_department->flatten(1);

            $arrAddressTo = collect($email_recipients)->where('address_type', 1)->where('department_id', $current_res_dept_id)->flatten(1)->pluck('receiver_info.email');
            $arrCC = collect($email_recipients)->where('address_type', 2)->where('department_id', $current_res_dept_id)->flatten(1)->pluck('receiver_info.email');

            $newTUVBatchMail = new SendTUVBatchMail($final_tuv_audits, $arr_responsible_department_name[$index], 'Test Email - TUV Audit Batch Alert');
            Mail::to($arrAddressTo)->cc($arrCC)->send($newTUVBatchMail);
        }
    }
}
