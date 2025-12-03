<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Staff extends User
{
    use Notifiable;
    protected $fillable = ['name', 'username', 'email', 'cell', 'password', 'role', 'photo'];
}
