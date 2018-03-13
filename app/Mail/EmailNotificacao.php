<?php

namespace App\Mail;

use App\Log;
use App\Publicacao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotificacao extends Mailable
{
    use Queueable, SerializesModels;


    public $publicacao;
    public $log;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $id_log)
    {
        $this->publicacao = Publicacao::find($id);
        $this->log = Log::find($id_log);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->log->desc == 'Criou') {
            return $this->view('notificacao.email')->with(['publicacao' => $this->publicacao, 'log' => $this->log])
                ->subject('IFG News - Publicação');
        }

        if($this->log->desc == 'Alterou') {
            return $this->view('notificacao.email')->with(['publicacao' => $this->publicacao, 'log' => $this->log])
                ->subject('IFG News - Alteração');
        }

        if($this->log->desc == 'Publicou') {
            return $this->view('notificacao.email')->with(['publicacao' => $this->publicacao, 'log' => $this->log])
                ->subject('IFG News - Publicação');
        }

            return $this->view('notificacao.email')->with(['publicacao' => $this->publicacao, 'log' => $this->log])
                ->subject('IFG News - Desativação');

    }
}
