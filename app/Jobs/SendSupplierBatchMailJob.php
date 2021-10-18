<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendSupplierBatchMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\Supplier;
use App\Model\EmailRecipient;

class SendSupplierBatchMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $supplier_audit_id;
    public function __construct($supplier_audit_id)
    {
        //
        $this->supplier_audit_id = $supplier_audit_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $suppliers = [];
        $responsible_department = [];
        // $suppliers = Supplier::whereIn('supplier_audit_id', $this->supplier_audit_id)->get();

        $suppliers = Supplier::with(
                        ['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments'])
                    ->withCount(['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }])
                    ->having('supplier_departments_count', '>', 0)
                    ->whereIn('supplier_audit_id', $this->supplier_audit_id)
                    ->get();

        for($index = 0; $index < count($suppliers); $index++){
            for($index2 = 0; $index2 < count($suppliers[$index]->supplier_departments); $index2++){
                $responsible_department[] = $suppliers[$index]->supplier_departments[$index2]->departments[0]->department_id;
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

            $supplier_audits = Supplier::with(
                        ['supplier_departments' => function($query) use ($current_deparment){
                            $query->where('supplier_department_stat', 1);
                            $query->where('responsible_department_id', $current_deparment);
                        }, 'supplier_departments.departments'])
                    ->withCount(['supplier_departments' => function($query) use ($current_deparment){
                            $query->where('supplier_department_stat', 1);
                            $query->where('responsible_department_id', $current_deparment);
                        }])
                    ->having('supplier_departments_count', '>', 0)
                    ->whereIn('supplier_audit_id', $this->supplier_audit_id)
                    ->get();

            $supplier_audits_id = [];
            for($index2 = 0; $index2 < count($supplier_audits); $index2++){
                $supplier_audits_id[] = $supplier_audits[$index2]->supplier_audit_id;
            }

            $final_supp_audits = Supplier::with(['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                    ->whereIn('supplier_audit_id', $supplier_audits_id)
                    ->get();

            for($index2 = 0; $index2 < count($email_recipients); $index2++){
                if($email_recipients[$index2]->address_type == '1'){
                    $arrAddressTo[] = $email_recipients[$index2]->receiver_info->email;
                }
                else{
                    $arrCC[] = $email_recipients[$index2]->receiver_info->email;
                }
            }

            $newSupplierBatchMail = new SendSupplierBatchMail($final_supp_audits, $department_name);
            Mail::to($arrAddressTo)->cc($arrCC)->send($newSupplierBatchMail);
        }
    }
}