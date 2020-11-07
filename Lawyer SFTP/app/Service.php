<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'bidang_hukum';
    
    protected $fillable = [
        'nama', 'gambar', 'status', 'deskripsi'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function konsultasi()
    {
        return $this->hasMany('App\Konsultasi','id');
    }
}
