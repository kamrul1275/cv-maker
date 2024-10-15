<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationOffer extends Notification implements ShouldQueue
{
    use Queueable;

    protected $offerDetails;

    public function __construct($offerDetails)
    {
        $this->offerDetails = $offerDetails;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Offer Posted')
                    ->line('A new offer has been posted.')
                    ->line('Title: ' . $this->offerDetails->title)
                    ->line('Description: ' . $this->offerDetails->description)
                    ->line('Discount: ' . $this->offerDetails->discount)
                    ->line('Valid Until: ' . $this->offerDetails->valid_until)
                    ->action('View Offer', url('/offers/' . $this->offerDetails->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'offer_id' => $this->offerDetails->id,
            'title' => $this->offerDetails->title,
            'description' => $this->offerDetails->description,
            'discount' => $this->offerDetails->discount,
            'valid_until' => $this->offerDetails->valid_until,
        ];
    }
}