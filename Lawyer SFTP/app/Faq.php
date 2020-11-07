<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    // status : 
    protected $fillable = [
        'pertanyaan', 'jawaban'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
