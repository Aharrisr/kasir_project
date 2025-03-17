<?php

use App\Http\Controllers\{
    AuthControler,
    DashboardController,
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
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/proseslogout', [AuthControler::class, 'proseslogout']);

    //Produk
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/produk/tambah', [ProdukController::class, 'tambah']);
    Route::Post('/produk/edit', [ProdukController::class, 'edit']);
    Route::Post('/produk/{kode_produk}/update', [ProdukController::class, 'update']);
    Route::post('produk/{kode_produk}/delete', [ProdukController::class, 'deleteproduk']);

    //Data User
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/tambahuser', [UserController::class, 'tambahuser']);
    Route::post('user/{id}/delete', [UserController::class, 'deleteuser']);

    //Data Member
    Route::get('/member', [memberController::class, 'index']);

    //Data Supplier
    Route::get('/supplier', [SupplierController::class, 'index']);

    //Data Pembelian
    Route::get('/pembelian', [PembelianController::class, 'index']);
    Route::post('pembelian/{id_pembelian}/delete', [PembelianController::class, 'deletepembelian']);
    Route::get('/pembelian/{kode_splr}/transaksi', [PembelianController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi/{kode_produk}/tambah', [PembelianController::class, 'tambah']);
    Route::post('/transaksi/{kode_transaksi}/update', [PembelianController::class, 'updatedata']);
    Route::delete('/transaksi/{id_pembelian_detail}', [PembelianController::class, 'deletedata']);
    Route::post('/transaksi/{kode_transaksi}/delete', [PembelianController::class, 'cancel']);
    Route::Post('/pembelian/detail', [PembelianController::class, 'detail']);
});
