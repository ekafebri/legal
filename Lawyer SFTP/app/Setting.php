<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'name', 'deskripsi', 'value'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
