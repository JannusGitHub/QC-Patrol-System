<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewSupplierMail extends Mailable
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
        return $this->view('mail.send_new_supplier_alert', compact(['suppliers', 'department_name']))
                ->subject('Supplier Audit Alert');

                // Supplier Audit Alert
    }
}
