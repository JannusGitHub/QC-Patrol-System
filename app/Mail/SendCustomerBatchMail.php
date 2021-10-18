<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCustomerBatchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $customers;
    protected $department_name;
    public function __construct($customers, $department_name)
    {
        //
        $this->customers = $customers;
        $this->department_name = $department_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $customers = $this->customers;
        $department_name = $this->department_name;
        return $this->view('mail.send_customer_batch_alert', compact(['customers', 'department_name']))
                ->subject('Test Email - Customer Audit Batch Alert');

                // Customer Audit Batch Alert
    }
}
