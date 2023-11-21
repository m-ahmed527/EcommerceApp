<?php

namespace App\Listeners;

use App\Mail\UserWelcomMail;
use App\Models\User;
use App\Notifications\SendNewUserRegisterNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserRegistered
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $admin = User::where('email','test@example.com')->first();
        $users = [
            'admin' => $admin,
            'user' => $event->user,
        ];
        foreach($users as $user)
        {
            $user->notify(new SendNewUserRegisterNotification($event->user));
        }
        \Mail::to($user->email)->send(new UserWelcomMail($event->user));
    }
}
