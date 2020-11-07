<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistorys extends Model
{
    protected $table = 'login_historys';
    protected $fillable = [
        'user_id', 'device', 'version', 'device_name','imei'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}