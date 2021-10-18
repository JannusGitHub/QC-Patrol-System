<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendCustomerBatchMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\Customer;
use App\Model\EmailRecipient;

class SendCustomerBatchMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $customer_audit_id;
    public function __construct($customer_audit_id)
    {
        //
        $this->customer_audit_id = $customer_audit_id;
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

        $customers = Customer::with(
                        ['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments'])
                    ->withCount(['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }])
                    ->having('customer_departments_count', '>', 0)
                    ->whereIn('customer_audit_id', $this->customer_audit_id)
                    ->get();

        // return $customers;

        $final_customer_audits = [];

        $collect_customers = collect($customers)->flatten(1);

        // $arr_responsible_department_id = collect($customers)->pluck('customer_audit_id')->flatten(1);


        // return $arr_responsible_department_id;

        for($index = 0; $index < count($collect_customers); $index++){
            for($index2 = 0; $index2 < count($collect_customers[$index]->customer_departments); $index2++){
                $arr_responsible_department_id[] = $collect_customers[$index]->customer_departments[$index2]->departments[0]->department_id;
                $arr_responsible_department_name[] = $collect_customers[$index]->customer_departments[$index2]->departments[0]->department_name;
            }
        }

        // return $arr_responsible_department_name;

        $email_recipients = EmailRecipient::with([
                'department',
                'receiver_info',
            ])
            ->whereIn('department_id', $arr_responsible_department_id)
            ->get();

        $arrAddressTo = [];
        $arrCC = [];

        // return $email_recipients;

        // return $arr_responsible_department_name;
        for($index = 0; $index < count($arr_responsible_department_id); $index++){
            $current_res_dept_id = $arr_responsible_department_id[$index];

            $collect_customers = $collect_customers->filter(function ($value, $key) use ($current_res_dept_id) {
                                                return collect($value['customer_departments'])->contains('responsible_department_id', $current_res_dept_id);
                                            });           

            $final_customer_audits = $collect_customers->flatten(1);

            $arrAddressTo = collect($email_recipients)->where('address_type', 1)->where('department_id', $current_res_dept_id)->flatten(1)->pluck('receiver_info.email');
            $arrCC = collect($email_recipients)->where('address_type', 2)->where('department_id', $current_res_dept_id)->flatten(1)->pluck('receiver_info.email');

            // return $arrAddressTo;
            $newCustomerBatchMail = new SendCustomerBatchMail($final_customer_audits, $arr_responsible_department_name[$index], 'Test Email - Customer Audit Batch Alert');
            Mail::to($arrAddressTo)->cc($arrCC)->send($newCustomerBatchMail);
        }
    }
}
