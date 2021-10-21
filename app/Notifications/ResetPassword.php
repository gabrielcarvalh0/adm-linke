<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

class ResetPassword extends Notification
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
        $url = URL::temporarySignedRoute('reset-password', now()->addHours(12) ,['id' => $this->token]);
        return (new MailMessage)
                    ->subject('Alterar senha')
                    ->line('Você está recebendo este e-mail para que possa redefinir a senha da sua conta')
                    ->action('Alterar senha', $url )
                    ->line("Se você não solicitou isso, ignore este e-mail.")
                    ->line('Obrigado!');
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
