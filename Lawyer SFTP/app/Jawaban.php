<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban_pertanyaan';
    // status : 
    protected $fillable = [
        'user_id', 'pertanyaan_id', 'judul_jawaban', 'deskripsi_jawaban'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];


    public function pertanyaan()
    {
        return $this->hasOne('App\Pertanyaan', 'id', 'pertanyaan_id');
    }
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
