<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // role = LAWYER, CLIENT
    // jenis_kelamin = LK/PR
    // type = PERORANGAN, PERUSAHAAN , ADVOKAT,  KANTOR_HUKUM
    protected $table = 'users';
    protected $fillable = [
        'email', 'password', 'telp', 'nama_lengkap', 'avatar', 'role', 'alamat' ,'token', 'fcm_token', 'status', 'jenis_kelamin', 'type', 'no_ktp', 'ktp', 'selfie_ktp', 'verified', 'nib', 'npwp', 'status_app', 'versi_app', 'remember_token'
        ];

    protected $hidden = [
        'password', 'updated_at', 'created_at'
    ];


    public function lawyer_detail()
    {
        return $this->hasOne('App\LawyerDetail', 'user_id', 'id');
    }

    public function lawyer_price()
    {
        return $this->hasOne('App\LawyerPrice', 'user_id', 'id');
    }
    
    public function konsullawyer()
    {
        return $this->hasMany('App\Konsultasi', 'lawyer_id', 'id');
    }

    public function konsulclient()
    {
        return $this->hasMany('App\Konsultasi', 'client_id', 'id');
    }
    
    public function pengajuan()
    {
        return $this->hasOne('App\PengajuanMember', 'user_id', 'id');
    }

}
