<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 'peraturan';
    // status : 
    protected $fillable = [
        'nama_peraturan', 'status'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function detail()
    {
        return $this->hasMany('App\PeraturanDetail', 'peraturan_id', 'id')->orderBy('id');
    }
}
