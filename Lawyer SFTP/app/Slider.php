<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    // role : CLIENT, LAWYER, IKLAN
    protected $fillable = [
        'judul', 'deskripsi', 'image', 'status', 'role'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
