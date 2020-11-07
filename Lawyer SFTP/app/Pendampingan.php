<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendampingan extends Model
{
    protected $table = 'pendampingan';
    // status : WAITING, CONFIRM, TOLAK, 
    protected $fillable = [
        'client_id', 'konsultasi_id', 'lawyer_id', 'option', 'status', 'alasan_tolak'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
    
    public function konsultasi()
    {
        return $this->hasOne('App\Konsultasi', 'id', 'konsultasi_id');
    }
    public function lawyer()
    {
        return $this->hasOne('App\User', 'id', 'lawyer_id');
    }
    public function client()
    {
        return $this->hasOne('App\User', 'id', 'client_id');
    }
    
    public function pembayaran()
    {
        return $this->hasOne('App\Pembayaran', 'id', 'lawyer_id');
    }
}
