<?php

namespace App\Notifications;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class welcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return (new MailMessage)
        ->from('no_reply@'.config('app.url'), 'No_Reply')
        ->greeting(__('welcome_notification.greeting',[],app()->getLocale()))
        ->line(__('welcome_notification.email_subject'),[],app()->getLocale())
        ->line(__('welcome_notification.message'),[],app()->getLocale())
        //->view('vendor.notifications.email',['greeting'=>'GreetingSS'])
        ->action(__('welcome_notification.control_panel',[],app()->getLocale()), url(app()->getLocale().'/home'));
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
