<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeliandetail extends Model
{
    use HasFactory;
    protected $table = 'pembelian_detail';
    protected $primaryKey = 'id_pembelian_detail';
    protected $fillable = [
        'id_pembelian_detail',
        'kode_produk',
        'harga_beli',
        'jumlah',
        'subtotal',
        'kode_transaksi'
    ];
    public $timestamps = false;
}
