<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $fillable = ['kode_splr', 'tanggal', 'total_item', 'total_harga', 'diskon', 'bayar'];
}
