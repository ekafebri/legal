<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = [
        'judul_report', 'penjelasan', 'konsultasi_id', 'client_id', 'lawyer_id', 'file'
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
