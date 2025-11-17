<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailUserUpdateNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Carbon $updated_at,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('E-mail fiókod frissítve')
            ->greeting('Szia!')
            ->line('Az e-mail fiókod adatait frissítettük.')
            ->line('Felhasználónév: '.$notifiable->local_part.'@'.$notifiable->domain->name)
            ->when($this->updated_at, fn ($msg) =>
                $msg->line('A frissítés ekkor történt: '.$this->updated_at)
            )
            ->line('Ha nem te kérted a módosítást, mielőbb vedd fel a kapcsolatot a főnökkel.');
    }
}
