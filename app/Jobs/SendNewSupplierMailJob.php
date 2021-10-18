<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendNewSupplierMail;
use Mail;
use App\User;
use App\Model\Department;
use App\Model\Supplier;
use App\Model\EmailRecipient;

class SendNewSupplierMailJob implements ShouldQueue
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
        $suppliers = Supplier::with(['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments'])
                    ->where('supplier_audit_id', $this->supplier_audit_id)
                    ->get();

        for($index = 0; $index < count($suppliers); $index++){
            for($index2 = 0; $index2 < count($suppliers[$index]->supplier_departments); $index2++){
                $responsible_department[] = $suppliers[$index]->supplier_departments[$index2]->departments[0]->department_id;
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

            $newSupplierMail = new SendNewSupplierMail($suppliers, $department_name);
            Mail::to($arrAddressTo)->cc($arrCC)->send($newSupplierMail);
        }
    }
}
