<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendInternalBatchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $internals;
    protected $department_name;
    public function __construct($internals, $department_name)
    {
        //
        $this->internals = $internals;
        $this->department_name = $department_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $internals = $this->internals;
        $department_name = $this->department_name;
        return $this->view('mail.send_internal_batch_alert', compact(['internals', 'department_name']))
                ->subject('Internal Audit Batch Alert');

                // Internal Audit Batch Alert
    }
}
