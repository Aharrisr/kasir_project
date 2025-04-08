<?php

namespace App\Http\Controllers;

use App\Models\{
    pembelian,
    supplier,
    Pembeliandetail,
    Produk
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class PembeliandetailController extends Controller
{
    public function index(Request $request)
    {
        $hariini= date("Y-m-d");
        $db = Pembelian::query();
        $db->select('pembelian.*', 'id_pembelian', 'nama_splr', 'tanggal', 'total_item', 'total_harga', 'diskon', 'bayar');
        $db->join('supplier', 'pembelian.kode_splr', '=', 'supplier.kode_splr');
        $db->orderBy('kode_transaksi');
        if (!empty($request->kode_transaksi)) {
            $db->where('kode_transaksi', 'like', '%' . $request->kode_transaksi . '%');
        }
        if (!empty($request->tanggal)) {
            $db->where('tanggal', 'like', '%' . $request->tanggal . '%');
        }
        $pembelian = $db->paginate(10);

        $supplier = DB::table('supplier')->get();

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('pembelian.index', compact('user', 'pembelian', 'supplier', 'hariini'));
    }

    public function detail(Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $detail = DB::table('pembelian_detail')
            ->where('pembelian_detail.kode_transaksi', $kode_transaksi)
            ->join('produk', 'produk.id_produk', '=', 'pembelian_detail.id_produk')
            ->select('pembelian_detail.*', 'produk.nama_produk','produk.kode_produk')
            ->orderBy('pembelian_detail.id_produk')
            ->paginate(10);
        return view('pembelian.detail', compact("detail"));
    }

    public function deletepembelian($kode_transaksi)
    {
        $pembelian = Pembelian::where('kode_transaksi',$kode_transaksi)->first();
        $detail = pembeliandetail::where('kode_transaksi', $kode_transaksi)->get();
        foreach ($detail as $s) {
            $produk = produk::find($s->id_produk);
            if ($produk) {
                $produk->stok -= $s->jumlah;
                $produk->update();
            }
            $s->delete();
        }
        $pembelian->delete();
        return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
    }
}
