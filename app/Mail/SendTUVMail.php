<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTUVMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $tuv;
    public function __construct($tuv)
    {
        //
        $this->tuv = $tuv;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tuv = $this->tuv;
        return $this->view('mail.send_tuv_alert', compact(['tuv']))
                ->subject('TUV Audit Alert');
    }
}
