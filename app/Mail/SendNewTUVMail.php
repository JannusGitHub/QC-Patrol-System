<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewTUVMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $tuvs;
    protected $department_name;
    public function __construct($tuvs, $department_name)
    {
        //
        $this->tuvs = $tuvs;
        $this->department_name = $department_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tuvs = $this->tuvs;
        $department_name = $this->department_name;
        return $this->view('mail.send_new_tuv_alert', compact(['tuvs', 'department_name']))
                ->subject('TUV Audit Alert');

                // TUV Audit Alert
    }
}
