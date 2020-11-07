<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admin';
    // role : ADMIN, SUPERADMIN
    protected $fillable = [
        'username', 'email', 'telp', 'avatar', 'role', 'password'
    ];
    protected $hidden = [
        'password', 'remember_toker'
    ];
}
