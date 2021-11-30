<?php

namespace App\Models;

use App\Notifications\ContactNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'message',
    ];

    protected static function booted()
    {
        static::created(function ($contact) {
            $contact->notify(new ContactNotification($contact));
        });
    }

    public function routeNotificationForMail()
    {
        return env('ADMIN_MAIL');
    }
}
