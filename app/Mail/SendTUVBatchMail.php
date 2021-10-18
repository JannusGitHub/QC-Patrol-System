<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTUVBatchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $tuvs;
    protected $department_name;
    public $subject;
    
    public function __construct($tuvs, $department_name, $subject)
    {
        //
        $this->tuvs = $tuvs;
        $this->department_name = $department_name;
        $this->subject = $subject;
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
        $subject = $this->subject;
        return $this->view('mail.send_tuv_batch_alert', compact(['tuvs', 'department_name']))
                ->subject($subject);
    }
}
