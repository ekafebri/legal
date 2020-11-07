<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = 'legal_opinion';
    // status : WAITING, CONFIRM, TOLAK, 
    protected $fillable = [
        'client_id', 'konsultasi_id', 'lawyer_id', 'option', 'status', 'alasan_tolak'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    
    public function konsultasi()
    {
        return $this->belongsTo('App\Konsultasi', 'id', 'konsultasi_id');
    }
    public function lawyer()
    {
        return $this->belongsTo('App\LawyerDetail', 'id', 'lawyer_id');
    }
}
