<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Penjualan,
    Pembelian,
    Setting
};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect,
};

class LaporanController extends Controller
{
    public function index(Request $request){
        $pendapatan = 0;
        $total_pendapatan = 0;
        $tanggal = date("Y-m-d");
        $bulan = $request->bulan;

        $tanggal = date("Y-m-d");
        $tahun = date("Y", strtotime($tanggal));

        // Ambil data penjualan dan beri tanda 'Penjualan'
        $data_penjualan = Penjualan::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get()
            ->map(function ($item) {
                $item->jenis = 'Penjualan';
                return $item;
            });

        // Ambil data pembelian dan beri tanda 'Pembelian'
        $data_pembelian = Pembelian::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get()
            ->map(function ($item) {
                $item->jenis = 'Pembelian';
                return $item;
            });

        $data_transaksi = $data_penjualan->merge($data_pembelian)->sortBy('tanggal');
        $total_penjualan = $data_penjualan->sum('bayar');
        $total_pembelian = $data_pembelian->sum('bayar');
        $pendapatan = $total_penjualan - $total_pembelian;
        $total_pendapatan += $pendapatan;

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('laporan.index', compact('user' ,'data_transaksi', 'total_pendapatan', 'total_penjualan', 'total_pembelian'));
    }

    public function exportPDF(Request $request)
{
    $bulan = $request->bulan;
    $tahun = date("Y");
    $alamatRaw = Setting::get("alamat");
    $alamatArr = json_decode($alamatRaw, true);

    $alamat = is_array($alamatArr) ? ($alamatArr[0]['alamat'] ?? '-') : '-';
    $namaRaw = Setting::get("nama_toko");
    $namaArr = json_decode($namaRaw, true);

    $nama_toko = is_array($namaArr) ? ($namaArr[0]['nama_toko'] ?? '-') : '-';


    $data_penjualan = Penjualan::whereYear('tanggal', $tahun)
        ->whereMonth('tanggal', $bulan)
        ->get()
        ->map(function ($item) {
            $item->jenis = 'Penjualan';
            return $item;
        });

    $data_pembelian = Pembelian::whereYear('tanggal', $tahun)
        ->whereMonth('tanggal', $bulan)
        ->get()
        ->map(function ($item) {
            $item->jenis = 'Pembelian';
            return $item;
        });

    $data_transaksi = $data_penjualan->merge($data_pembelian)->sortBy('tanggal');

    $total_penjualan = $data_penjualan->sum('bayar');
    $total_pembelian = $data_pembelian->sum('bayar');
    $total_pendapatan = $total_penjualan - $total_pembelian;

    $pdf = Pdf::loadView('laporan.pdf', compact('data_transaksi', 'total_penjualan', 'total_pembelian', 'total_pendapatan', 'bulan', 'tahun', 'alamat', 'nama_toko'));
    return $pdf->download('laporan-transaksi.pdf');
}
}
