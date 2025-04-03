<?php

namespace App\Http\Controllers;

use App\Models\{
    Penjualan,
    Penjualandetail,
    produk,
    Supplier,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class PenjualandetailController extends Controller
{
    public function index(Request $request)
    {
        $db = Penjualan::query();
        $db->select('penjualan.*', 'id_penjualan', 'kode_transaksi', 'tanggal', 'total_item', 'total_harga', 'diskon', 'bayar', 'petugas', 'kode_member');
        $db->orderBy('kode_transaksi');
        $penjualan = $db->paginate(10);

        $supplier = DB::table('supplier')->get();
        $penjualan1 = DB::table('penjualan')->get();

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('penjualan.index', compact('user', 'penjualan', 'supplier'));
    }

    public function detail(Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $detail = DB::table('penjualan_detail')
            ->where('penjualan_detail.kode_transaksi', $kode_transaksi)
            ->join('produk', 'produk.id_produk', '=', 'penjualan_detail.id_produk')
            ->select('penjualan_detail.*', 'produk.nama_produk','produk.kode_produk')
            ->orderBy('penjualan_detail.id_produk')
            ->paginate(10);
        return view('penjualan.detail', compact("detail"));
    }
}
