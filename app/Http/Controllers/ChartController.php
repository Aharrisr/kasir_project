<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function pengeluaran()
    {
        // Ambil data jumlah pembelian berdasarkan bulan
        $pembelian = Pembelian::selectRaw('MONTH(tanggal) as month, SUM(bayar) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data untuk chart
        $categories = $pembelian->pluck('month')->map(function ($month) {
            return date('F', mktime(0, 0, 0, $month, 1)); // Konversi angka bulan ke nama bulan
        })->toArray();

        $data = $pembelian->pluck('total')->map(function ($total) {
            return number_format($total, 0, ',', '.'); // Format Rp (tanpa simbol)
        })->toArray();

        return response()->json([
            "series" => [
                [
                    "name" => "Total Pembelian (Rp)",
                    "data" => $data
                ]
            ],
            "categories" => $categories
        ]);
    }
}
