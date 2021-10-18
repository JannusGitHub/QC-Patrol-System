<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Supplier;
use App\Model\SupplierDepartments;
use App\Model\Department;
use App\Jobs\SendSupplierBatchMailJob;
use Mail;
use Carbon\Carbon;

class SupplierAuditAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supplier_alert:supplier_audits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending an automatic email for Supplier Audit Findings.';

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
        date_default_timezone_set('Asia/Manila');
        $tomorrow = Carbon::now();
        $tomorrow = $tomorrow->addDays(1)->toDateString();

        $supplier_for_imp_plan_over_and_due = Supplier::with(
                        ['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '<=', $tomorrow)
                ->get();


        $supplier_for_imp_plan_before_due = Supplier::with(
                        ['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '=', $tomorrow)
                ->get();

        $supplier_for_close_out_over_and_due = Supplier::with(
                        ['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '<=', $tomorrow)
                ->get();

        $supplier_for_close_out_before_due = Supplier::with(
                        ['supplier_departments' => function($query){
                            $query->where('supplier_department_stat', 1);
                        }, 'supplier_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '=', $tomorrow)
                ->get();

        $supplier_audit_ids = [];

        foreach ($supplier_for_imp_plan_over_and_due as $supplier_for_imp_plan_over_and_due_single) {
            $supplier_audit_ids[] = $supplier_for_imp_plan_over_and_due_single->supplier_audit_id;
        }

        foreach ($supplier_for_imp_plan_before_due as $supplier_for_imp_plan_before_due_single) {
            $supplier_audit_ids[] = $supplier_for_imp_plan_before_due_single->supplier_audit_id;
        }

        foreach ($supplier_for_close_out_over_and_due as $supplier_for_close_out_over_and_due_single) {
            $supplier_audit_ids[] = $supplier_for_close_out_over_and_due_single->commitment_date;
        }

        foreach ($supplier_for_close_out_before_due as $supplier_for_close_out_before_due_single) {
            $supplier_audit_ids[] = $supplier_for_close_out_before_due_single->commitment_date;
        }

        dispatch(new SendSupplierBatchMailJob($supplier_audit_ids));
    }
}
