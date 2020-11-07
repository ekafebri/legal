<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    protected $table = 'apikey';
    protected $fillable = [
        'apikey'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
    ];

}
