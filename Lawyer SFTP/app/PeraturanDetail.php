<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeraturanDetail extends Model
{
    protected $table = 'detail_peraturan';
    // status : 
    protected $fillable = [
        'peraturan_id', 'nomer', 'judul', 'jenis', 'instansi', 'tgl_ditetapkan', 'no_bn', 'no_tbn', 'tgl_diundingkan', 'file'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function peraturan()
    {
        return $this->belongsTo('App\Peraturan');
    }
}
