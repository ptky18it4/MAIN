<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkout;
class ShoppingMail extends Mailable
{   
    use Queueable, SerializesModels;
    public $checkout;
    public $checkoutDetail = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Checkout $checkout, $checkoutDetail)
    {
        $this->$checkout = $checkout;
        $this->$checkoutDetail = $checkoutDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping');
    }
}
