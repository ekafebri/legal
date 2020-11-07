<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananClient extends Model
{
    protected $table = 'layanan_client';
    protected $fillable = [
        'nama', 'image', 'status', 'deskripsi'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}
