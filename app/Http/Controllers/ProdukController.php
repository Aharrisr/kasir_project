<?php

namespace App\Http\Controllers;

use App\Models\Produk;
// use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $db = Produk::query();
        $db->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db->leftJoin('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db->orderBy('kode_produk');
        if (!empty($request->kode_produk)) {
            $db->where('kode_produk', 'like', '%' . $request->kode_produk . '%');
        }
        if (!empty($request->nama_produk)) {
            $db->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
        }
        if (!empty($request->nama_splr)) {
            $db->where('nama_splr', 'like', '%' . $request->nama_splr . '%');
        }
        $produk = $db->paginate(10);

        $supplier = DB::table('supplier')->get();

        //nama user yang login
        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();

        return view('Produk.index', compact('user', 'produk', 'supplier'));
    }

    public function tambah(Request $request)
    {
        $nama_produk = $request->nama_produk;
        $harga_beli = preg_replace('/[^\d]/', '', str_replace(['Rp', '.', ','], '', $request->harga_beli));
        $harga_jual = preg_replace('/[^\d]/', '', str_replace(['Rp', '.', ','], '', $request->harga_jual));
        $stok = $request->stok;
        $kode_splr = $request->kode_splr;
        $diskon = preg_replace('/\D/', '', $request->diskon);

        $produk = DB::table('produk')->latest('id_produk')->first();

        //Kode Produk
        $id_terbaru = $produk ? $produk->id_produk + 1 : 1;
        function tambah_nol_didepan($angka, $panjang)
        {
            return str_pad($angka, $panjang, '0', STR_PAD_LEFT);
        }
        $kode_produk = 'B' . tambah_nol_didepan($id_terbaru, 6);

        try {
            $data = [
                'nama_produk' => $nama_produk,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stok' => $stok,
                'kode_splr' => $kode_splr,
                'kode_produk' => $kode_produk,
                'diskon' => $diskon
            ];

            $simpan = DB::table('produk')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $kode_produk = $request->kode_produk;
        $supplier = DB::table('supplier')->get();
        $produk = DB::table('produk')->where('kode_produk', $kode_produk)->first();
        return view('produk.edit', compact('supplier', "produk"));
    }

    public function update($kode_produk, Request $request)
    {
        $kode_produk = $request->kode_produk;
        $nama_produk = $request->nama_produk;
        $harga_beli = preg_replace('/[^\d]/', '', str_replace(['Rp', '.', ','], '', $request->harga_beli));
        $harga_jual = preg_replace('/[^\d]/', '', str_replace(['Rp', '.', ','], '', $request->harga_jual));
        $stok = $request->stok;
        $diskon = preg_replace('/\D/', '', $request->diskon);
        $kode_splr = $request->kode_splr;

        try {
            $data = [
                'nama_produk' => $nama_produk,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stok' => $stok,
                'kode_splr' => $kode_splr,
                'diskon' => $diskon
            ];

            $update = DB::table('produk')->where('kode_produk', $kode_produk)->update($data);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function deleteproduk($kode_produk)
    {
        $delete = DB::table('produk')->where('kode_produk', $kode_produk)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
