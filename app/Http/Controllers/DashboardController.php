<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //stok barang masuk hari ini
        $hariini = date("Y-m-d");
        $stok1 = DB::table('pembelian_detail')
            ->selectRaw('COUNT(kode_transaksi) as stok_masuk')
            ->where('tanggal', $hariini)
            ->first();

        //stok barang hampir habis
        $stok2 = DB::table('produk')
            ->selectRaw('COUNT(id_produk) as stok_tipis')
            ->where('stok', '<', 50)
            ->first();
            
        //nama user yang login
        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('dashboard.index', compact('user', 'stok1', 'stok2'));
    }
}
