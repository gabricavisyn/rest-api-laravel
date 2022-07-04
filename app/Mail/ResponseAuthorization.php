<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponseAuthorization extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array $dati
     */
    public $dati;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dati)
    {
        $this->dati = $dati;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.response_authorization');
    }
}
