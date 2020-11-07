<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentars extends Model {
    protected $table = 'komentars';
    protected $fillable = [
        'user_id', 'komentar', 'artikel_id'
    ];
    protected $hidden = [
        'updated_at'
     ];

     public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function artikel()
    {
        return $this->belongsTo('App\Artikel');
    }
}
