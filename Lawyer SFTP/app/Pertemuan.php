<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuan';
    // status : WAITING, CONFIRM, TOLAK, 
    protected $fillable = [
        'client_id', 'konsultasi_id', 'lawyer_id', 'status', 'tgl_pengajuan', 'nama', 'email', 'alasan_tolak'
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
}
