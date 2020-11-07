<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahkamahAgung extends Model
{
    protected $table = 'mahkamah_agung';
    protected $fillable = [
        'judul', 'gambar', 'link'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];

     
}
