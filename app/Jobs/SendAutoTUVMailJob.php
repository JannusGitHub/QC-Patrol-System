<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendAutoTUVMail;
use App\Mail\SendTUVMail;
use Mail;
use App\User;
use App\Model\TUV;
use App\Model\Customer;
use Carbon\Carbon;

class SendAutoTUVMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        date_default_timezone_set('Asia/Manila');

        $tuv = Customer::where('sending_stat', 1)
                ->where('audit_stat', 1)
                ->where('responsible_department', 10) //aalisin na to pangtesting lang to
                // ->whereDate('created_at', '=', Carbon::today()->subDays(5)->format('Y-m-d'))
                ->orderBy('customer_audit_id', 'desc')
                ->get();

        if(count($tuv) > 0) {
            $user = User::on('rapidx')->where('user_stat', 1)->get();

            for($index = 0; $index < count($tuv); $index++) {
                for($index2 = 0; $index2 < count($user); $index2++) {
                    if($tuv[$index]->responsible_department == $user[$index2]->department_id) {
                        Mail::to($user[$index2]->email)->send(new SendAutoTUVMail($tuv));
                    }
                }
            }
        }
    }
}
