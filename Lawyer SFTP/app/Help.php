<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'help';
    // status : 
    protected $fillable = [
        'name_contact', 'contact'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
}
