<?php

namespace App\Mail\Internal;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InternalMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public $subject;
    public function __construct($data, $subject)
    {
        //
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $subject = $this->subject;
        return $this->view('mail.internal.mailer', compact(['data']))
                ->subject($subject);
    }
}
