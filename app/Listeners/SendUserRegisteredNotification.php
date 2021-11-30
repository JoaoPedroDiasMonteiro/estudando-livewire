<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\UserRegisteredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredNotification implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event)
    {
        Mail::to(env('ADMIN_MAIL'))->send(new UserRegisteredNotification($event->user));
    }
}
