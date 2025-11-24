<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Student extends User
{
    protected $fillable = ['name', 'email', 'cell', 'location', 'skill', 'password', 'photo'];
    
}
