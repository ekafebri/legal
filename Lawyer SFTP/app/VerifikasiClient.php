<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiClient extends Model
{
    protected $table = 'verifikasi_client';
    // status : 
    protected $fillable = [
        'user_id', 'ktp', 'no_ktp', 'selfie_ktp', 'status', 'alasan_tolak'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
