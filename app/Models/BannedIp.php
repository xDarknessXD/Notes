<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BannedIp extends Model
{
    // use HasFactory, Notifiable;

    protected $table = 'banned_ip';

    protected $fillable = [
        'ip',
        'link',
        'type',
    ];
}

