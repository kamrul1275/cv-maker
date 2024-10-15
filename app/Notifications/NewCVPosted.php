<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCVPosted extends Notification
{
    use Queueable;

    public $offerDetails;



    /**
     * Create a new notification instance.
     */
    public function __construct($offerDetails)
    {
        $this->offerDetails = $offerDetails;
    }



    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }



    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                   ->subject('New Offer Available')
                   ->greeting('Hello!')
                   ->line('We have a new offer for you!')
                   ->action('View Offer', url('/offers/' . $this->offerDetails->id));
    }

    public function toArray($notifiable)
    {
        return [
            'offer_id' => $this->offerDetails->id,
            'message' => 'New offer available!'
        ];
    }

    
}
