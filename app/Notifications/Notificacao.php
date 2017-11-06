<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Notificacao extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
//        return (new MailMessage)
//                     ->subject('Nova Publicação')
//                    ->line('Olá')
////                    ->action('Notification Action', url('/'))
//                    ->line('Uma nova publicação foi cadastrada!');



        $url = '127.0.0.1:8000/auth/login'.$this->token;
        return (new MailMessage)
            ->greeting('Olá')
            ->line('Texto antes da ação, quantas linhas quiser')
            ->action('Redefinir senha', $url)
            ->line('Texto depois da ação quantas linhas quiser');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
