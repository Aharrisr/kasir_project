<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Log;
use App\Models\{
    pembelian,
    supplier,
    pembeliandetail,
    produk
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class PembelianController extends Controller
{
    public function index()
    {
        $db = Supplier::query();
        $db->select('supplier.*', 'kode_splr', 'nama_splr', 'no_hp', 'alamat');
        $db->orderBy('nama_splr');
        $supplier = $db->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('transaksi.pembelian', compact('user', 'supplier'));
    }

    public function transaksi($kode_splr, Request $request)
    {
        //Kode transaksi
        $pembelian = DB::table('pembelian')->latest('id_pembelian')->first();
        $id_terbaru = $pembelian ? $pembelian->id_pembelian + 1 : 1;
        function tambah_nol_didepan($angka, $panjang)
        {
            return str_pad($angka, $panjang, '0', STR_PAD_LEFT);
        }
        $kode_transaksi = 'TB' . tambah_nol_didepan($id_terbaru, 6);

        //data pembelian detail
        $db = pembeliandetail::query();
        $db->select('pembelian_detail.*', 'id_pembelian_detail', 'jumlah', 'subtotal', 'nama_produk', 'kode_transaksi', 'stok', 'kode_produk');
        $db->join('produk', 'pembelian_detail.id_produk', '=', 'produk.id_produk');
        $db->orderBy('id_pembelian_detail');
        $pembelian_detail = $db->paginate(10);

        //data produk
        $db1 = Produk::query();
        $db1->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db1->join('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db1->orderBy('nama_produk');
        if (!empty($request->kode_produk)) {
            $db1->where('kode_produk', 'like', '%' . $request->kode_produk . '%');
        }
        if (!empty($request->nama_produk)) {
            $db1->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
        }
        if (!empty($request->nama_splr)) {
            $db1->where('nama_splr', 'like', '%' . $request->nama_splr . '%');
        }
        $produk = $db1->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();

        $supplier = Supplier::where('kode_splr', $kode_splr)->firstOrFail();
        return view('pembelian.transaksi', compact('pembelian_detail', 'produk', 'user', 'supplier', 'kode_transaksi'));
    }

    public function cari(Request $request, $id)
    {
        //data produk
        $db1 = Produk::query();
        $db1->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db1->join('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db1->orderBy('nama_produk');
        if (!empty($request->kode_produk)) {
            $db1->where('kode_produk', 'like', '%' . $request->kode_produk . '%');
        }
        if (!empty($request->nama_produk)) {
            $db1->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
        }
        if (!empty($request->nama_splr)) {
            $db1->where('nama_splr', 'like', '%' . $request->nama_splr . '%');
        }
        $produk = $db1->paginate(10);
        return view('pembelian.transaksi', compact('produk'));
    }

    public function tambah($kode_produk, Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $harga_beli = $request->harga_beli;
        $subtotal = $request->subtotal;
        $id_produk = $request->id_produk;
        $tanggal = date("y-m-d");

        try {
            $produkAda = DB::table('produk')->where('id_produk', $id_produk)->exists();

            if (!$produkAda) {
                return Redirect::back()->with(['warning' => 'Kode Produk tidak ditemukan di tabel pembelian']);
            }

            $cekDetail = DB::table('pembelian_detail')
                ->where('kode_transaksi', $kode_transaksi)
                ->where('id_produk', $id_produk)
                ->first();

            if ($cekDetail) {
                return Redirect::back()->with(['warning_tambah' => 'Data Berhasil Ditambah']);
            } else {
                DB::table('pembelian_detail')->insert([
                    'kode_transaksi' => $kode_transaksi,
                    'harga_beli' => $harga_beli,
                    'id_produk' => $id_produk,
                    'jumlah' => 1,
                    'subtotal' => $subtotal,
                    'tanggal' => $tanggal
                ]);
            }
            return Redirect::back()->with(['success' => 'Data Berhasil Ditambah']);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Ditambah']);
        }
    }

    public function updatedata($kode_transaksi, Request $request)
    {
        $kode_splr = $request->kode_splr;
        $total_item = $request->total_jumlah;
        $total_harga = $request->total_harga;
        $diskon = $request->diskon;
        $bayar = $request->bayar;
        $tanggal = date('Y-m-d');
        $id_pembelian_detail = $request->id_pembelian_detail;
        $jumlah = $request->jumlah;
        $subtotal = $request->subtotal;
        $stok = $request->stok + $jumlah;
        $id_produk = $request->id_produk;

        //**Add Data Pembelian**\\
        try {
            $data_add = [
                'kode_splr' => $kode_splr,
                'total_item' => $total_item,
                'total_harga' => $total_harga,
                'diskon' => $diskon,
                'bayar' => $bayar,
                'tanggal' => $tanggal,
                'kode_transaksi' => $kode_transaksi,
            ];

            $simpan = DB::table('pembelian')->insert($data_add);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning_updatedata' => 'Data Gagal Disimpan']);
        }

        //**Update data stok produk**\\
        try {
            $data_upproduk = [
                'stok' => $stok
            ];

            $upproduk = DB::table('produk')
                ->where('id_produk', $id_produk)
                ->update($data_upproduk);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning_updatedata' => 'Data Gagal Disimpan']);
        }

        //**Update Data Pembelian Detail**\\
        $dataLama = DB::table('pembelian_detail')
            ->where('id_pembelian_detail', $id_pembelian_detail)
            ->where('kode_transaksi', $kode_transaksi)
            ->first();

        if ($dataLama && ($dataLama->jumlah != $jumlah || $dataLama->subtotal != $subtotal)) {
            try {
                $data_up = [
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal
                ];

                $update = DB::table('pembelian_detail')
                    ->where('id_pembelian_detail', $id_pembelian_detail)
                    ->where('kode_transaksi', $kode_transaksi)
                    ->update($data_up);
                if ($upproduk) {
                    if ($update && $simpan) {
                        return Redirect::back()->with(['success_updatedata' => 'Data Berhasil Disimpan']);
                    }
                }
            } catch (\Exception $e) {
                // dd($e->getMessage());
                return Redirect::back()->with(['warning_updatedata' => 'Data Gagal Disimpan']);
            }
        } else {
            if ($upproduk) {
                if ($simpan) {
                    return Redirect::back()->with(['success_updatedata' => 'Data Berhasil Disimpan']);
                }
            }
        }
    }

    public function deletedata($id_pembelian_detail)
    {
        $transaksi = pembeliandetail::find($id_pembelian_detail);

        if (!$transaksi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $transaksi->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function cancel($kode_transaksi)
    {
        $hitung_data = PembelianDetail::where('kode_transaksi', $kode_transaksi)->count();
        if ( $hitung_data == 0) {
            return redirect()->back()->with('success_cancel', 'Kode transaksi tidak ditemukan.');
        } else {
        $transaksi = pembeliandetail::where('kode_transaksi', $kode_transaksi)->delete();
        if (!$transaksi) {
            return redirect()->back()->with('warning_cencel', 'Data gagal dihapus');
        }
        return redirect()->back()->with('success_cancel', 'Data berhasil dihapus');
    }
}
}
