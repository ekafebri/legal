<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'nama', 'image', 'status'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
