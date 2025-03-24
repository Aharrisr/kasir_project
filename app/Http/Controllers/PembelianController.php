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
    //**Pembelian**\\
    public function index(Request $request)
    {
        $db = Pembelian::query();
        $db->select('pembelian.*', 'id_pembelian', 'nama_splr', 'tanggal', 'total_item', 'total_harga', 'diskon', 'bayar');
        $db->join('supplier', 'pembelian.kode_splr', '=', 'supplier.kode_splr');
        $db->orderBy('kode_transaksi');
        if (!empty($request->kode_splr)) {
            $db->where('kode_splr', 'like', '%' . $request->kode_splr . '%');
        }
        if (!empty($request->tanggal)) {
            $db->where('tanggal', 'like', '%' . $request->tanggal . '%');
        }
        $pembelian = $db->paginate(10);

        $supplier = DB::table('supplier')->get();

        $db1 = Supplier::query();
        $db1->select('supplier.*', 'kode_splr', 'nama_splr', 'no_hp', 'alamat');
        $db1->orderBy('nama_splr');
        $supplier1 = $db1->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('pembelian.index', compact('user', 'pembelian', 'supplier', 'supplier1'));
    }

    public function editform($kode_transaksi)
    {
        //data pembelian detail
        $db = pembeliandetail::query();
        $db->select('pembelian_detail.*', 'id_pembelian_detail', 'harga_beli', 'jumlah', 'subtotal', 'nama_produk', 'kode_transaksi', 'stok', 'id_produk');
        $db->join('produk', 'pembelian_detail.kode_produk', '=', 'produk.kode_produk');
        $db->orderBy('id_pembelian_detail');
        $pembelian_detail = $db->paginate(10);

        //data produk
        $db1 = Produk::query();
        $db1->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db1->join('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db1->orderBy('nama_produk');
        $produk = $db1->paginate(10);

        //data pembelian
        $db2 = pembelian::where('kode_transaksi', $kode_transaksi);
        $db2->select('pembelian.*', 'nama_splr', 'no_hp', 'alamat', 'total_item', 'total_harga', 'diskon', 'bayar', 'tanggal');
        $db2->join('supplier', 'pembelian.kode_splr', '=', 'supplier.kode_splr');
        $pembelian = $db2->first();

        $transaksi = pembeliandetail::where('kode_transaksi', $kode_transaksi)->firstOrFail();

        $count = $pembelian_detail->count();

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('pembelian.edit', compact('user', 'transaksi', 'pembelian_detail', 'produk', 'pembelian', 'count'));
    }

    public function edit($kode_transaksi, Request $request)
    {


        $total_item = $request->total_jumlah;
        $total_harga = $request->total_harga;
        $diskon = $request->diskon;
        $bayar = $request->bayar;
        $id_pembelian_detail = $request->id_pembelian_detail;
        $jumlah = $request->jumlah;
        $upstok = $request->upstok;
        $subtotal = $request->subtotal;
        $stok =  $request->stok;
        $id_produk = $request->id_produk;
        $hasil = $request->hasil;

    if($hasil > 0){
        $hasil2 = $stok + $hasil;
            try {
            $data_upproduk = [
                'stok' => $hasil2
            ];

            $upproduk = DB::table('produk')
                ->where('id_produk', $id_produk)
                ->update($data_upproduk);
            if ($upproduk) {
                return Redirect::back()->with(['success_updatedata' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning_updatedata' => 'Data Gagal Disimpan']);
        }
    }elseif($hasil == 0){
             //kosong
    }elseif($hasil < 0){
            $hasil2 = $stok - abs($request->hasil);
            try {
            $data_upproduk = [
                'stok' => $hasil2
            ];

            $upproduk = DB::table('produk')
                ->where('id_produk', $id_produk)
                ->update($data_upproduk);
            if ($upproduk) {
                return Redirect::back()->with(['success_updatedata' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning_updatedata' => 'Data Gagal Disimpan']);
        }
    }

        //**Update data stok produk**\\

    }

    public function deletepembelian($kode_transaksi) {}

    public function detail(Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $detail = DB::table('pembelian_detail')
            ->where('pembelian_detail.kode_transaksi', $kode_transaksi)
            ->join('produk', 'produk.kode_produk', '=', 'pembelian_detail.kode_produk')
            ->select('pembelian_detail.*', 'produk.nama_produk')
            ->orderBy('pembelian_detail.kode_produk')
            ->paginate(10);
        return view('pembelian.detail', compact("detail"));
    }

    //**transaksi**\\
    public function transaksi($kode_splr, Request $request)
    {
        //Kode transaksi
        $pembelian = DB::table('pembelian')->latest('id_pembelian')->first();
        $id_terbaru = $pembelian ? $pembelian->id_pembelian + 1 : 1;
        function tambah_nol_didepan($angka, $panjang)
        {
            return str_pad($angka, $panjang, '0', STR_PAD_LEFT);
        }
        $kode_transaksi = 'P' . tambah_nol_didepan($id_terbaru, 6);

        //data pembelian detail
        $db = pembeliandetail::query();
        $db->select('pembelian_detail.*', 'id_pembelian_detail', 'harga_beli', 'jumlah', 'subtotal', 'nama_produk', 'kode_transaksi', 'stok', 'id_produk');
        $db->join('produk', 'pembelian_detail.kode_produk', '=', 'produk.kode_produk');
        $db->orderBy('id_pembelian_detail');
        $pembelian_detail = $db->paginate(10);

        //data produk
        $db1 = Produk::query();
        $db1->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db1->join('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db1->orderBy('nama_produk');
        $produk = $db1->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();

        $supplier = Supplier::where('kode_splr', $kode_splr)->firstOrFail();
        // Log::info("transaksi : " . $transaksi);  //cek bug di storage/logs/laravel.log
        // Log::info("Data Produk: ", (array) $produk); //cek bug di storage/logs/laravel.log
        return view('pembelian.transaksi', compact('pembelian_detail', 'produk', 'user', 'supplier', 'kode_transaksi'));
    }

    public function tambah($kode_produk, Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $harga_beli = $request->harga_beli;
        $subtotal = $request->subtotal;
        $tanggal = date("y-m-d");

        try {
            $produkAda = DB::table('produk')->where('kode_produk', $kode_produk)->exists();

            if (!$produkAda) {
                return Redirect::back()->with(['warning' => 'Kode Produk tidak ditemukan di tabel pembelian']);
            }

            $cekDetail = DB::table('pembelian_detail')
                ->where('kode_transaksi', $kode_transaksi)
                ->where('kode_produk', $kode_produk)
                ->first();

            if ($cekDetail) {
                return Redirect::back()->with(['warning_tambah' => 'Data Berhasil Ditambah']);
            } else {
                DB::table('pembelian_detail')->insert([
                    'kode_transaksi' => $kode_transaksi,
                    'harga_beli' => $harga_beli,
                    'jumlah' => 1,
                    'kode_produk' => $kode_produk,
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
        $tanggal = date('Y-m-d H:i:s');
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
            dd($e->getMessage());
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
            dd($e->getMessage());
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
                dd($e->getMessage());
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
        $transaksi = pembeliandetail::where('kode_transaksi', $kode_transaksi)->delete();
        if (!$transaksi) {
            return redirect()->back()->with('warning_cencel', 'Data gagal dihapus');
        }
        return redirect()->back()->with('success_cancel', 'Data berhasil dihapus');
    }
}
