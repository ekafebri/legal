<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'amount', 'type','detail_id', 'status', 'kode_unik', 'payment_id', 'lawyer_id', 'client_id', 'kode_pembayaran', 'catatan'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
     ];

     public function transaksi()
     {
         return $this->hasOne('App\Transaksi', 'id', 'detail_id');
     }
     public function client()
     {
         return $this->hasOne('App\User', 'id', 'client_id');
     }
     public function lawyer()
     {
         return $this->hasOne('App\User', 'id', 'lawyer_id');
     }
     public function vicon()
     {
         return $this->hasMany('App\Vicon', 'id', 'lawyer_id');
     }

     public function vicons()
     {
         return $this->hasMany('App\User', 'id', 'client_id');
     }
 
}