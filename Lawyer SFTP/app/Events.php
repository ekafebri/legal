<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    // status true/false
    protected $table = 'event';
    protected $fillable = [
        'nama', 'tanggal', 'gambar', 'lokasi', 'deskripsi', 'status'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
