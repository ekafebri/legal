<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryLegalitas extends Model
{
    protected $table = 'history_legalitas'; 
    protected $fillable = [
        'status', 'client_id', 'notaris_id', 'service_id'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
