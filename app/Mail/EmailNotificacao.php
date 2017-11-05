<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotificacao extends Mailable
{
    use Queueable, SerializesModels;


    public $publicacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($publicacao)
    {
        $this->$publicacao = $publicacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacao.email')->with(['publicacao'=>$this->publicacao]);
    }
}
