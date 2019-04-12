<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'password_confirmation'
    ];
    
    protected $hidden = [
        'password', 'password_confirmation', 'remember_token',
    ];
}
