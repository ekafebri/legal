<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = 'notifikasi';
    protected $fillable = [
        'reference_id', 'type', 'status', 'message', 'user_id'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}