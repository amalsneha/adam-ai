<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $verificationUrl = url("/api/v2/auth/email/verify/{$this->user->id}");

        return $this->subject('Verify Your Email Address')
                    ->html("
                        <p>Hello {$this->user->name},</p>
                        <p>Thank you for registering. Please click the link below to verify your email address:</p>
                        <p><a href='{$verificationUrl}'>Verify Email</a></p>
                        <p>If you did not create an account, no further action is required.</p>
                        <p>Thank you!</p>
                    ");
    }
}
