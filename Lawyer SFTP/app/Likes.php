<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';
    protected $fillable = [
        'user_id', 'artikel_id'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];

     public function artikel()
    {
        return $this->belongsTo('App\Artikel');
    }
}
