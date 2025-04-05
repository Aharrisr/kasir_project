<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = [
        'id_penjualan',
        'kode_transaksi',
        'total_item',
        'diskon',
        'bayar',
        'total_harga',
        'tanggal',
        'petugas',
        'kode_member'
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'kode_member', 'kode_member');
    }
}
