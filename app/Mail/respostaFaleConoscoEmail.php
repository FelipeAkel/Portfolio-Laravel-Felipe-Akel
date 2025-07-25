<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class respostaFaleConoscoEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $parametrosEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parametrosEmail)
    {
        $this->parametrosEmail = $parametrosEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.respostaFaleConosco');
    }
}
