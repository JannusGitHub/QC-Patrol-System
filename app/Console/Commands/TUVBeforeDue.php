<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\TUV;
use App\Model\TUVDepartments;
use App\Model\Department;
use App\Jobs\SendTUVBatchMailJob;
use Mail;
use Carbon\Carbon;

class TUVBeforeDue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tuv_alert_before_due:tuv_audits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending an automatic email for TUV Audit Findings Before Due Date.';

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
        dispatch(new SendTUVBatchMailJob([23, 22, 21]));
    }
}
