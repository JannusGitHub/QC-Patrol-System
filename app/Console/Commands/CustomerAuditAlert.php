<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Customer;
use App\Model\CustomerDepartments;
use App\Model\Department;
use App\Jobs\SendCustomerBatchMailJob;
use Mail;
use Carbon\Carbon;

class CustomerAuditAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer_alert:customer_audits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending an automatic email for Customer Audit Findings.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        date_default_timezone_set('Asia/Manila');
        $tomorrow = Carbon::now();
        $tomorrow = $tomorrow->addDays(1)->toDateString();

        $customer_for_imp_plan_over_and_due = Customer::with(
                        ['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '<=', $tomorrow)
                ->get();


        $customer_for_imp_plan_before_due = Customer::with(
                        ['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '=', $tomorrow)
                ->get();

        $customer_for_close_out_over_and_due = Customer::with(
                        ['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '<=', $tomorrow)
                ->get();

        $customer_for_close_out_before_due = Customer::with(
                        ['customer_departments' => function($query){
                            $query->where('customer_department_stat', 1);
                        }, 'customer_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '=', $tomorrow)
                ->get();

        $customer_audit_ids = [];

        foreach ($customer_for_imp_plan_over_and_due as $customer_for_imp_plan_over_and_due_single) {
            $customer_audit_ids[] = $customer_for_imp_plan_over_and_due_single->customer_audit_id;
        }

        foreach ($customer_for_imp_plan_before_due as $customer_for_imp_plan_before_due_single) {
            $customer_audit_ids[] = $customer_for_imp_plan_before_due_single->customer_audit_id;
        }

        foreach ($customer_for_close_out_over_and_due as $customer_for_close_out_over_and_due_single) {
            $customer_audit_ids[] = $customer_for_close_out_over_and_due_single->customer_audit_id;
        }

        foreach ($customer_for_close_out_before_due as $customer_for_close_out_before_due_single) {
            $customer_audit_ids[] = $customer_for_close_out_before_due_single->customer_audit_id;
        }
        
        dispatch(new SendCustomerBatchMailJob($customer_audit_ids));
    }
}
