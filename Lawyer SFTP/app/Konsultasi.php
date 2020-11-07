<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';
    // service_id : 0 = probono
    protected $fillable = [
        'id', 'lawyer_id', 'client_id', 'status', 'service_id', 'alasan_tolak', 'update_konsultasi', 'unread_message_lawyer', 'unread_message_client'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function client()
    {
        return $this->hasOne('App\User', 'id', 'client_id');
    }

    public function lawyer()
    {
        return $this->hasOne('App\User', 'id', 'lawyer_id');
    }

    public function service()
    {
        return $this->hasOne('App\Service', 'id', 'service_id');
    }

    public function legalitas()
    {
        return $this->hasOne('App\Legalitas', 'id', 'service_id');
    }

    public function chat()
    {
        return $this->hasMany('App\Chat', 'konsultasi_id', 'id');
    }
}
