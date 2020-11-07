<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    
    protected $fillable = [
        'review', 'rating', 'type', 'reference_id', 'client_id', 'lawyer_id'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
    public function lawyer()
    {
        return $this->hasOne('App\User', 'id', 'lawyer_id');
    }
    public function client()
    {
        return $this->hasOne('App\User', 'id', 'client_id');
    }
}
