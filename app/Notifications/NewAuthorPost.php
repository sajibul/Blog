<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAuthorPost extends Notification
{
    use Queueable;
    public $postInfo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($postInfo)
    {
      $this->postInfo = $postInfo;
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
                    ->greeting('Hello, Admin!')
                    ->subject('New Post Approved Need')
                    ->line('New pos by'.$this->postInfo->user->name . 'need to approved')
                    ->line('To approve the post click view button')
                    ->line('Post Title : '.$this->postInfo->post_tittle)
                    ->action('Viwe', url('admin/post/'.$this->postInfo->id))
                    ->line('Thank you for using our application!');
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
