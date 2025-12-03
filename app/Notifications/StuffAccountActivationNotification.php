<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StuffAccountActivationNotification extends Notification
{
    use Queueable;
    private $name = null;
    private $token = null;
    private $otp = null;
    /**
     * Create a new notification instance.
     */
    public function __construct($name, $token, $otp)
    {
        $this ->name = $name;
        $this->token = $token;
        $this->otp = $otp;
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
            ->line('Hello' .$this->name)
            ->line('Activation OTP ' .$this->otp)
            ->line('Welcome to Devlopment Team, To active your account click this link')
            ->action('Notification Action', url('/staff-activation/' . $this -> token))
            ->line('Thank you for using our application!');
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
