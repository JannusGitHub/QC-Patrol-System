<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        // 'App\Console\Commands\TUVAutoSendMailCommand',
        // 'App\Console\Commands\TUVAuditAlert',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        // $schedule->command('tuv_alert:tuv_audits')
        //            ->everyMinute();

        // $schedule->command('customer_alert:customer_audits')
        //            ->everyMinute();

        // $schedule->command('internal_alert:internal_audits')
        //            ->everyMinute();

        // $schedule->command('supplier_alert:supplier_audits')
        //            ->everyMinute();

        // $schedule->command('tuv_alert:tuv_before_due')
        //            ->everyMinute();

        // TUV
        // $schedule->command('tuv_alert_before_due:tuv_audits')
        //            ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
