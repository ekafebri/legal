<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    // role : CLIENT, LAWYER
    // status_pembayaran : 'MEMBERSHIP(pengajuan_member)','KONSULT(pengajuan_konsult)'
    protected $fillable = [
        'no_trx', 'nominal', 'user_id', 'status', 'bank', 'payment_type', 'status_pembayaran'
    ];
    protected $hidden = [
       'updated_at', 'created_at'
    ];
   
 
}
