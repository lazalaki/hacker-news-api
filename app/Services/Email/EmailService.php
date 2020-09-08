<?php

namespace App\Services\Email;

use App\Mail\PleaseConfirmYourEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService {

    public function sendRegistrationEmail($email, $token, $name)
    {
        $link = 'http://localhost:8000/auth/verification?token=' . $token;

        $this->send($email, new PleaseConfirmYourEmail($name, $link));
    }


    public function send($email, $content)
    {
        try {
            Mail::to($email)->send($content);
        } catch(Exception $exception) {
            throw new Exception("Email service is currently offline");
        }
    }
}