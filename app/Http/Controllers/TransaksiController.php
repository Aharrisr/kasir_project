<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($kode_splr)
    {
        $supplier = Supplier::where('kode_splr', $kode_splr)->firstOrFail();
        return view('pembelian.transaksi', compact('supplier'));
    }
}
