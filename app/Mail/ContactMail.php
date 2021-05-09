<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sender;
    public $subject;
    public $message;
    public $name;

    public function __construct($sender, $subject, $message, $name)
    {
        $this->sender = $sender;
        $this->subject = $subject;
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender)->view('emails.welcome')->with(
            [
                "sender" => $this->sender,
                "msg" => $this->message,
                "name" => $this->name
            ]
        );
    }
}
