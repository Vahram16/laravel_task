<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    private array $email_data;

    public function __construct(array $data)
    {
        $this->email_data = $data;
    }


    public function build(): VerifyEmail
    {
        return $this->from('vahram@gmail.com', 'coder aweso.me')->subject("Welcome to VAHRAMNOC!")->view('email.register-email', ['email_data' => $this->email_data]);

    }
}
