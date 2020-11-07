<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $table = 'privacy';
    protected $fillable = [
        'content'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
