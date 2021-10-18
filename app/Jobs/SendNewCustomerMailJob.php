<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendNewCustomerMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\Customer;
use App\Model\EmailRecipient;

class SendNewCustomerMailJob implements ShouldQueue
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
        $customers = [];
        $responsible_department = [];
        $customers = Customer::with(['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments'])
                    ->where('customer_audit_id', $this->customer_audit_id)
                    ->get();

        for($index = 0; $index < count($customers); $index++){
            for($index2 = 0; $index2 < count($customers[$index]->customer_departments); $index2++){
                $responsible_department[] = $customers[$index]->customer_departments[$index2]->departments[0]->department_id;
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

            $newCustomerMail = new SendNewCustomerMail($customers, $department_name);
            Mail::to($arrAddressTo)->cc($arrCC)->send($newCustomerMail);
        }
    }
}
