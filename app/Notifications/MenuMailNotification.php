<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MenuMailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $body;
    public $title;
    public function __construct($body,$title)
    {
        $this->body = $body;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->title)
            ->greeting('اهلا بك!')
            ->line($this->body)
            ->action('عرض الموقع', 'https://alrayahhotel.com')
            ->line('شكرا لك  لاستخدام موقع وفندق الراية');


    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
