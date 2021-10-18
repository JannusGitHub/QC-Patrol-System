<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Internal;
use App\Model\InternalDepartments;
use App\Model\Department;
use App\Jobs\SendInternalBatchMailJob;
use Mail;
use Carbon\Carbon;

class InternalAuditAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'internal_alert:internal_audits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending an automatic email for Internal Audit Findings.';

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

        $internal_for_imp_plan_over_and_due = Internal::with(
                        ['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '<=', $tomorrow)
                ->get();


        $internal_for_imp_plan_before_due = Internal::with(
                        ['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->whereDate('deadline_of_submission', '=', $tomorrow)
                ->get();

        $internal_for_close_out_over_and_due = Internal::with(
                        ['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '<=', $tomorrow)
                ->get();

        $internal_for_close_out_before_due = Internal::with(
                        ['internal_departments' => function($query){
                            $query->where('internal_department_stat', 1);
                        }, 'internal_departments.departments', 'person_in_charges', 'person_in_charges.person_in_charge_record'])
                ->where('sending_stat', 1)
                ->where('audit_stat', 2)
                ->whereDate('commitment_date', '=', $tomorrow)
                ->get();

        $internal_audit_ids = [];

        foreach ($internal_for_imp_plan_over_and_due as $internal_for_imp_plan_over_and_due_single) {
            $internal_audit_ids[] = $internal_for_imp_plan_over_and_due_single->internal_audit_id;
        }

        foreach ($internal_for_imp_plan_before_due as $internal_for_imp_plan_before_due_single) {
            $internal_audit_ids[] = $internal_for_imp_plan_before_due_single->internal_audit_id;
        }

        foreach ($internal_for_close_out_over_and_due as $internal_for_close_out_over_and_due_single) {
            $internal_audit_ids[] = $internal_for_close_out_over_and_due_single->commitment_date;
        }

        foreach ($internal_for_close_out_before_due as $internal_for_close_out_before_due_single) {
            $internal_audit_ids[] = $internal_for_close_out_before_due_single->commitment_date;
        }

        dispatch(new SendInternalBatchMailJob($internal_audit_ids));
    }
}
