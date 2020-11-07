<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Somasi extends Model
{
    protected $table = 'somasi';
    protected $fillable = [
        'judul', 'penjelasan', 'tertulis_id', 'client_id', 'lawyer_id', 'file', 'filename'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function tertulis()
    {
        return $this->hasOne('App\Tertulis', 'id', 'tertulis_id');
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
