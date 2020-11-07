<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanMember extends Model
{
    protected $table = 'pengajuan_member';
    protected $fillable = [
        'status', 'user_id', 'member_expired'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function pembayaran()
    {
        return $this->hasOne('App\Pembayaran', 'detail_id', 'user_id');
    }
}
