<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    // status : 
    protected $fillable = [
        'user_id', 'judul_pertanyaan', 'pertanyaan', 'budget', 'penjelasan', 'kategori_layanan', 'status', 'kota_client', 'provinsi_client', 'kategori'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function jawaban()
    {
        return $this->hasMany('App\Jawaban', 'pertanyaan_id', 'id');
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
