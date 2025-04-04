<?php

use App\Http\Controllers\{
    AuthControler,
    DashboardController,
    ChartController,
    UserController,
    memberController,
    ProdukController,
    SupplierController,
    PembelianController,
    PenjualandetailController,
};
use App\Http\Controllers\Konfigurasicontroller;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['guest:user'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthControler::class, 'proseslogin']);
});


//cek id level
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::user() && Auth::user()->id_level == 1) {
            return view('admin');
        }
        abort(403, 'Unauthorized access.');
    });

    Route::get('/kasir', function () {
        if (Auth::user() && Auth::user()->id_level == 2) {
            return view('kasir');
        }
        abort(403, 'Unauthorized access.');
    });
});

Route::middleware(['auth:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/proseslogout', [AuthControler::class, 'proseslogout']);

    Route::get('/api/get-chart-pemasukan', [ChartController::class, 'pemasukan']);
    Route::get('/api/get-chart-pengeluaran', [ChartController::class, 'pengeluaran']);
    Route::get('/chart', function () {
        return view('chart');
    });

    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk/tambah', [ProdukController::class, 'tambah']);
    Route::Post('/produk/edit', [ProdukController::class, 'edit']);
    Route::Post('/produk/{kode_produk}/update', [ProdukController::class, 'update']);
    Route::post('produk/{kode_produk}/delete', [ProdukController::class, 'deleteproduk']);

    //Data User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/tambahuser', [UserController::class, 'tambahuser']);
    Route::Post('/user/edit', [UserController::class, 'edit']);
    Route::Post('/user/{id}/update', [UserController::class, 'update']);
    Route::post('user/{id}/delete', [UserController::class, 'deleteuser']);

    //Data Member
    Route::get('/member', [memberController::class, 'index'])->name('member');
    Route::post('/member/tambahmember', [MemberController::class, 'tambah']);

    //Data Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::post('/supplier/tambah', [SupplierController::class, 'tambah']);
    Route::Post('/supplier/edit', [SupplierController::class, 'edit']);
    Route::Post('/supplier/{kode_splr}/update', [SupplierController::class, 'update']);
    Route::post('supplier/{kode_splr}/delete', [SupplierController::class, 'deletesplr']);


    //Data Pembelian
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::Post('/pembelian/detail', [PembelianController::class, 'detail']);
    Route::delete('/pembelian/{kode_transaksi}/delete', [PembelianController::class, 'deletepembelian']);

    //Edit Transaksi
    Route::get('/pembelian/{kode_transaksi}/editform', [PembelianController::class, 'editform'])->name('editform');
    Route::post('/transaksi/{kode_transaksi}/edit', [PembelianController::class, 'edit'])->name('edit_pembelian');

    //transaksi pembelian
    Route::get('/pembelian/{kode_splr}/transaksi', [PembelianController::class, 'transaksi'])->name('transaksi-pembelian');
    Route::post('/transaksi/{kode_produk}/tambah', [PembelianController::class, 'tambah']);
    Route::post('/transaksi/{kode_transaksi}/update', [PembelianController::class, 'updatedata']);
    Route::delete('/transaksi/{id_pembelian_detail}', [PembelianController::class, 'deletedata']);
    Route::post('/transaksi/{kode_transaksi}/cancel', [PembelianController::class, 'cancel']);

    //penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('transaksi-penjualan');
    Route::post('/penjualan/{kode_produk}/tambah', [PenjualanController::class, 'tambah']);
    Route::delete('/penjualan/{id_penjualan_detail}', [PenjualanController::class, 'deletedata']);
    Route::get('/get-discount', [PenjualanController::class, 'getDiscount'])->name('getDiscount');
    Route::get('/penjualan/nota', [PenjualanController::class, 'nota'])->name('nota');
    Route::get('/penjualan/selesai',[PenjualanController::class, 'selesai'])->name('selesai');
    Route::post('/penjualan/{kode_transaksi}/cancel', [PenjualanController::class, 'cancel']);
    Route::post('/penjualan/{kode_transaksi}/update', [PenjualanController::class, 'updatedata']);

    Route::get('/penjualan-detail', [PenjualandetailController::class, 'index'])->name('penjualan');
    Route::Post('/penjualan/detail', [PenjualandetailController::class, 'detail']);



    Route::get('/konfigurasi', [Konfigurasicontroller::class,'index'])->name('konfigurasi');
});
