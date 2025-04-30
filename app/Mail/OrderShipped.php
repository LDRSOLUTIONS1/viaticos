<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $orderDetails;

    public function __construct($user, $orderDetails)
    {
        $this->user = $user;
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->view('emails.orders.shipped')
               ->subject('Tu pedido ha sido enviado')
               ->attach('/path/to/file.pdf', [
                   'as' => 'factura.pdf',
                   'mime' => 'application/pdf',
               ])
               ->cc('copiade@ejemplo.com')
               ->bcc('copiaocta@ejemplo.com');
    }
}