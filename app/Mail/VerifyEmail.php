<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'michelfsa@live.com';
        $subject = 'This is a demo!';
        $name = 'Michel Alves';

        return $this->view('email.verifyEmail')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'test_message' => $this->data['message'], 'uri' => $this->data['uri'], 'emailToConfirm' => $this->data['emailToConfirm'], 'id' => $this->data['id']  ]);
    }
}
