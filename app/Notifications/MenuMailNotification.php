<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class MenuMailNotification extends Notification
{
    public $body;
    public $title;
    public $appName;
    public $siteUrl;
    public $supportMessage;

    /**
     * استقبال المحتوى والعنوان عند إنشاء الإشعار
     */
    public function __construct($body, $title)
    {
        $this->body = $body;
        $this->title = $title;

        // جلب القيم من config/app.php أو من .env
        $this->appName = config('app.name', env('APP_NAME', 'One Sip'));
        $this->siteUrl = config('app.url', env('APP_URL', 'https://onesip.sa'));

        // رسالة عامة
        $this->supportMessage = __("شكراً لاختيار خدماتنا. نسعى دائماً لتقديم أفضل تجربة لك!");
    }

    /**
     * تحديد القنوات المستخدمة (البريد الإلكتروني)
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

  
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->title)
            ->greeting(new HtmlString(__('مرحباً بك في ') . $this->appName)) // دعم تعدد اللغات
            ->line(new HtmlString('<p style="font-size:16px; color:#333;">' . $this->body . '</p>'))
            ->line(new HtmlString('<p style="font-size:14px; color:#777;">' . $this->supportMessage . '</p>'))
            ->action(__('تصفح المنيو'), $this->siteUrl); // دعم تعدد اللغات
    }
}
