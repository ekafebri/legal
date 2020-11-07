<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawyerPrice extends Model
{
    protected $table = 'lawyer_price';
    protected $fillable = [
        'user_id', 'service_id', 'harga', 'deskripsi', 'harga_vicon'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];
}
