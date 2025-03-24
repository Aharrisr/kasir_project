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
    TransaksiController
};
use App\Models\Pembelian;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::post('user/{id}/delete', [UserController::class, 'deleteuser']);

    //Data Member
    Route::get('/member', [memberController::class, 'index'])->name('member');

    //Data Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');

    //Data Pembelian
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::Post('/pembelian/detail', [PembelianController::class, 'detail']);
    Route::post('/pembelian/{kode_transaksi}/delete', [PembelianController::class, 'deletepembelian']);

    //Edit Transaksi
    Route::get('/pembelian/{kode_transaksi}/editform', [PembelianController::class, 'editform'])->name('editform');
    Route::post('/transaksi/{kode_transaksi}/edit', [PembelianController::class, 'edit'])->name('edit_pembelian');

    //transaksi pembelian
    Route::get('/pembelian/{kode_splr}/transaksi', [PembelianController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi/{kode_produk}/tambah', [PembelianController::class, 'tambah']);
    Route::post('/transaksi/{kode_transaksi}/update', [PembelianController::class, 'updatedata']);
    Route::delete('/transaksi/{id_pembelian_detail}', [PembelianController::class, 'deletedata']);
    Route::post('/transaksi/{kode_transaksi}/cancel', [PembelianController::class, 'cancel']);
});
