<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    // mode  = WAITING, RELEASE, DECILINE, DELETE, DRAF
    protected $fillable = [
        'user_id', 'judul', 'content', 'image', 'mode', 'release_date', 'sumber'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public function like()
    {
        return $this->hasMany('App\Likes', 'artikel_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Komentars', 'artikel_id', 'id');
    }

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function komen(){
        return $this->hasOne('App\Komentars');
    }
}
