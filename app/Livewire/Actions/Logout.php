<?php

namespace App\Livewire\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke()
    {
        /** @var User $user */
        $user = Auth::guard('web')->user();

        $user->status = 'Offline';
        $user->last_login_ip = Carbon::now();
        $user->save();

        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}

