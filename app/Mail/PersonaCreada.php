<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PersonaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $details;


    public function __construct($details)
    {
        $this->details = $details;
    }


    public function build()
    {
        //return $this->view('view.name');
        return $this->subject('Cerebro 360 - Acceso')
                     ->view('emails.nuevaPersona');
    }
}
