<?php

namespace App\Listeners;

// use App\Events\Login;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;

class LogUserLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;
        $ipAddress = Request::ip();

        // Store IP in the database
        $user->update(['last_login_ip' => $ipAddress]);
    }
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
    // public function handle(Login $event): void
    // {
    //     //
    // }
}
