<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = [
        'nama', 'image', 'status', 'deskripsi'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}
