<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryPeraturan extends Model
{
    protected $table = 'history_peraturan';
    // status : 
    protected $fillable = [
        'status', 'user_id', 'tanggal_langganan'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
