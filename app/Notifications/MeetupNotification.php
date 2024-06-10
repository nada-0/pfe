<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Models\Meetup;

class MeetupNotification extends Notification
{
    use Queueable;

    protected $meetup;
    protected $type;

    public function __construct(Meetup $meetup, $type)
    {
        $this->meetup = $meetup;
        $this->type = $type;
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The meetup ' . $this->meetup->name . ' is about to ' . $this->type)
                    ->action('View Meetup', url('/meetups/' . $this->meetup->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'meetup_id' => $this->meetup->id,
            'type' => $this->type,
            'message' => 'The meetup ' . $this->meetup->name . ' is about to ' . $this->type,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'meetup_id' => $this->meetup->id,
            'type' => $this->type,
            'message' => 'The meetup ' . $this->meetup->name . ' is about to ' . $this->type,
        ]);
    }
}
