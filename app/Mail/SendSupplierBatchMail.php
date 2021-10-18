<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSupplierBatchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $suppliers;
    protected $department_name;
    public function __construct($suppliers, $department_name)
    {
        //
        $this->suppliers = $suppliers;
        $this->department_name = $department_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $suppliers = $this->suppliers;
        $department_name = $this->department_name;
        return $this->view('mail.send_supplier_batch_alert', compact(['suppliers', 'department_name']))
                ->subject('Supplier Audit Batch Alert');

                // Supplier Audit Batch Alert
    }
}
