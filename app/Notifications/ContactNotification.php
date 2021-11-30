<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Contact from site')
                    ->line('New contact message from ' . $this->contact->name)
                    ->line('Email: ' . $this->contact->email)
                    ->line('Phone: ' . $this->contact->phone)
                    ->line('Message: ' . $this->contact->message);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
