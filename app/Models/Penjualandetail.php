<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualandetail extends Model
{
    protected $table = 'penjualan_detail';
    protected $primaryKey = 'id_penjualan_detail';
    protected $fillable = [
        'id_penjualan_detail',
        'id_produk',
        'harga_beli',
        'jumlah',
        'subtotal',
        'kode_transaksi'
    ];
}
