<?php

namespace App\Http\Controllers;
use App\Models\{
    Penjualan,
    Penjualandetail,
    produk,
    member,
    Level
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class PenjualanController extends Controller
{
    public function index(){
        // kode transaksi
        $penjualan = DB::table('penjualan')->latest('id_penjualan')->first();
        $id_terbaru = $penjualan ? $penjualan->id_penjualan + 1 : 1;
        function tambah_nol_didepan($angka, $panjang)
        {
            return str_pad($angka, $panjang, '0', STR_PAD_LEFT);
        }
        $kode_transaksi = 'P' . tambah_nol_didepan($id_terbaru, 6);

        //data penjualan detail
        $db = Penjualandetail::query();
        $db->select('penjualan_detail.*', 'id_penjualan_detail', 'jumlah', 'subtotal', 'nama_produk', 'kode_transaksi', 'stok', 'kode_produk');
        $db->join('produk', 'penjualan_detail.id_produk', '=', 'produk.id_produk');
        $db->orderBy('id_penjualan_detail');
        $penjualan_detail = $db->paginate(10);

        //data produk
        $db1 = Produk::query();
        $db1->select('produk.*', 'nama_produk', 'nama_splr', 'stok', 'kode_produk');
        $db1->join('supplier', 'produk.kode_splr', '=', 'supplier.kode_splr');
        $db1->orderBy('nama_produk');
        $produk = $db1->paginate(10);

        $member = DB::table('member')->get();

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();

        return view('transaksi.index', compact('kode_transaksi','user', 'penjualan_detail', 'produk', 'member'));
    }

    public function tambah($kode_produk, Request $request)
    {
        $kode_transaksi = $request->kode_transaksi;
        $harga_jual = $request->harga_jual;
        $subtotal = $request->subtotal;
        $id_produk = $request->id_produk;
        $tanggal = date("y-m-d");

        try {
            $produkAda = DB::table('produk')->where('id_produk', $id_produk)->exists();

            if (!$produkAda) {
                return Redirect::back()->with(['warning' => 'Kode Produk tidak ditemukan di tabel penjualan']);
            }

            $cekDetail = DB::table('penjualan_detail')
                ->where('kode_transaksi', $kode_transaksi)
                ->where('id_produk', $id_produk)
                ->first();

            if ($cekDetail) {
                return Redirect::back()->with(['warning_tambah' => 'Data Berhasil Ditambah']);
            } else {
                DB::table('penjualan_detail')->insert([
                    'kode_transaksi' => $kode_transaksi,
                    'harga_jual' => $harga_jual,
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

    public function deletedata($id_penjualan_detail)
    {
        $transaksi = Penjualandetail::find($id_penjualan_detail);

        if (!$transaksi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $transaksi->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function getDiscount(Request $request)
    {
        // Ambil kode_member dari query string
        $kodeMember = $request->kode_member;

        // Cari data member berdasarkan kode_member
        $member = Member::where('kode_member', $kodeMember)->first();

        // Jika member tidak ditemukan, kembalikan error
        if (!$member) {
            return response()->json([
                'error' => 'Member tidak ditemukan',
                'diskon' => 0,
                'level'  => ''
            ], 404);
        }

        // Pastikan level tidak null, jika null kembalikan error
        if (is_null($member->level)) {
            return response()->json([
                'error' => 'Level member tidak boleh null',
                'diskon' => 0,
                'level'  => ''
            ], 400);
        }

        // Ambil level dari member
        $level = $member->level;

        // Cari data diskon di tabel diskon berdasarkan level
        $dataDiskon = Level::where('level', $level)->first();
        $nilaiDiskon = $dataDiskon ? $dataDiskon->diskon : 0;

        // Kembalikan data diskon dan level dalam format JSON
        return response()->json([
            'diskon' => $nilaiDiskon,
            'level'  => $level
        ]);
    }

    public function updatedata($kode_transaksi, Request $request)
    {
        $total_item = $request->total_jumlah;
        $diskon = $request->diskon;
        $bayar = $request->bayar;
        $total_harga = $request->total_harga;
        $tanggal = date('Y-m-d H:i:s');
        $petugas = $request->petugas;
        $kode_member = $request->member;
        $id_penjualan_detail = $request->id_penjualan_detail;
        $id_produk = $request->id_produk;
        $jumlah = $request->jumlah;
        $subtotal = $request->subtotal;
        $stok = $request->stok - $jumlah;

        //**Add Data Penjualan**\\
        try {
            $data_add = [
                'total_item' => $total_item,
                'total_harga' => $total_harga,
                'diskon' => $diskon,
                'bayar' => $bayar,
                'tanggal' => $tanggal,
                'kode_transaksi' => $kode_transaksi,
                'petugas' => $petugas,
                'kode_member' => $kode_member,
            ];

            $simpan = DB::table('penjualan')->insert($data_add);
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

        //**Update Data Penjualan Detail**\\
        $dataLama = DB::table('penjualan_detail')
            ->where('id_penjualan_detail', $id_penjualan_detail)
            ->where('kode_transaksi', $kode_transaksi)
            ->first();

        if ($dataLama && ($dataLama->jumlah != $jumlah || $dataLama->subtotal != $subtotal)) {
            try {
                $data_up = [
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal
                ];

                $update = DB::table('penjualan_detail')
                    ->where('id_penjualan_detail', $id_penjualan_detail)
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

    public function cancel($kode_transaksi)
    {
        $hitung_data = PenjualanDetail::where('kode_transaksi', $kode_transaksi)->count();
        if ( $hitung_data == 0) {
            return redirect()->back()->with('success_cancel', 'Kode transaksi tidak ditemukan.');
        } else {
        $transaksi = penjualandetail::where('kode_transaksi', $kode_transaksi)->delete();
        if (!$transaksi) {
            return redirect()->back()->with('warning_cencel', 'Data gagal dihapus');
        }
        return redirect()->back()->with('success_cancel', 'Data berhasil dihapus');
    }
}
}
