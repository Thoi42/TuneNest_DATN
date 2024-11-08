<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $token;

    public function __construct($customer, $token)
    {
       $this->customer = $customer;
       $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Forgot Password')
                    ->view('mail.forgot_password')
                    ->with([
                        'customer' => $this->customer,
                        'token' => $this->token,
                    ]);
    }
}
