<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = [
        'konsultasi_id', 'pengirim_id', 'penerima_id', 'message', 'type'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
    
        
    public function konsultasi()
    {
        return $this->hasOne('App\Konsultasi', 'id', 'konsultasi_id');
    }

}
