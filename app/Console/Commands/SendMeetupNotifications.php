<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Meetup;
use App\Notifications\MeetupNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class SendMeetupNotifications extends Command
{
    protected $signature = 'send:meetup-notifications';
    protected $description = 'Send notifications for meetups starting and ending';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // Meetups starting now
        $meetupsStarting = Meetup::where('date', $now->format('Y-m-d H:i:00'))->get();
        foreach ($meetupsStarting as $meetup) {
            Notification::send($meetup->user, new MeetupNotification($meetup, 'start'));
        }

        // Meetups ending now
        $meetupsEnding = Meetup::where('end_time', $now->format('Y-m-d H:i:00'))->get();
        foreach ($meetupsEnding as $meetup) {
            Notification::send($meetup->user, new MeetupNotification($meetup, 'end'));
        }
    }
}
