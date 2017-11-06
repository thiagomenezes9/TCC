<?php

namespace App\Mail;

use App\Publicacao;
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
    public function __construct($id)
    {
        $this->publicacao = Publicacao::find($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->publicacao);

//
//
        return $this->view('notificacao.email')->with(['publicacao'=>$this->publicacao])
                ->subject('Nova Publicação');
    }
}
