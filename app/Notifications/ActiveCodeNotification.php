<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActiveCodeNotification extends Notification
{
    use Queueable;
    public $code;
    public $phone;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code,$phone)
    {
        $this->code=$code;
        $this->phone=$phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChannel::class];
    }


    public function toGhasedakSms ($notifiable)
    {
        return[
            'text'=>" کد اهراز هویت:    {$this->code} وبسایت بانوی مزرعه ",
            'number'=>$this->phone
        ];

    }

 }
