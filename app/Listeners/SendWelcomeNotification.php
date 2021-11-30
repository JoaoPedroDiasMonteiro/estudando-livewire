<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\UserWelcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeNotification implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new UserWelcome($event->user));
    }
}
