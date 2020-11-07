<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananLawyer extends Model
{
    protected $table = 'layanan_lawyer';
    protected $fillable = [
        'nama', 'image', 'status', 'deskripsi'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
