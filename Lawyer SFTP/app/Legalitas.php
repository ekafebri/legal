<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legalitas extends Model
{
    protected $table = 'legalitas';
    protected $fillable = [
        'nama', 'image', 'status'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}
