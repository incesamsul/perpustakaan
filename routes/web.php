<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Penilai;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [Home::class, 'beranda']);
Route::get('/kategori/{id_kategori}', [Home::class, 'beranda']);
Route::get('/detail_buku/{id_buku}', [Home::class, 'detailBuku']);

Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);
Route::get('/cari_buku', [Home::class, 'cariBuku']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,pustakawan,anggota']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:anggota']], function () {
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/hapus/{id_keranjang}/{jml_buku}', [KeranjangController::class, 'delete']);
    Route::get('/my_account', [UserController::class, 'myAccount']);
    Route::get('/belum_diambil', [UserController::class, 'belumDiambil']);
    Route::get('/sudah_diambil', [UserController::class, 'sudahDiambil']);
    Route::get('/pinjaman_selesai', [UserController::class, 'pinjamanSelesai']);
    Route::post('/simpan_ke_keranjang', [KeranjangController::class, 'store']);
    Route::post('/checkout', [PinjamController::class, 'store']);
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,pustakawan']], function () {

    Route::get('/pengunjung', [Home::class, 'pengunjung']);
    Route::get('/daftar_pengunjung', [Home::class, 'daftarPengunjung']);
    Route::get('/pengunjung/{nomor_induk}', [Home::class, 'tambahPengunjung']);

    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kelas', [Admin::class, 'kelas']);
        Route::get('/pinjamkan', [Admin::class, 'pinjamkan']);
        Route::get('/pinjamkan/{id_user}', [Admin::class, 'pinjamkanBuku']);
        Route::get('/kembalikan/{id_user}', [Admin::class, 'kembalikanBuku']);
        Route::get('/pengembalian', [Admin::class, 'pengembalian']);
        Route::get('/denda', [Admin::class, 'denda']);

        // CRUD KATEGORI
        Route::get('/anggota', [MemberController::class, 'index']);
        Route::post('/create_member', [MemberController::class, 'store']);
        Route::post('/update_member', [MemberController::class, 'update']);
        Route::post('/delete_member', [MemberController::class, 'delete']);

        // CRUD KATEGORI
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/create_kategori', [KategoriController::class, 'store']);
        Route::post('/update_kategori', [KategoriController::class, 'update']);
        Route::post('/delete_kategori', [KategoriController::class, 'delete']);

        // CRUD BUKU
        Route::get('/buku', [BukuController::class, 'index']);
        Route::post('/create_buku', [BukuController::class, 'store']);
        Route::post('/update_buku', [BukuController::class, 'update']);
        Route::post('/delete_buku', [BukuController::class, 'delete']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});



// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,pustakawan']], function () {
    Route::group(['prefix' => 'pustakawan'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kelas', [Admin::class, 'kelas']);
        Route::get('/pinjamkan', [Admin::class, 'pinjamkan']);
        Route::get('/pinjamkan/{id_user}', [Admin::class, 'pinjamkanBuku']);
        Route::get('/kembalikan/{id_user}', [Admin::class, 'kembalikanBuku']);
        Route::get('/pengembalian', [Admin::class, 'pengembalian']);

        // CRUD KATEGORI
        Route::get('/anggota', [MemberController::class, 'index']);
        Route::post('/create_member', [MemberController::class, 'store']);
        Route::post('/update_member', [MemberController::class, 'update']);
        Route::post('/delete_member', [MemberController::class, 'delete']);

        // CRUD KATEGORI
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/create_kategori', [KategoriController::class, 'store']);
        Route::post('/update_kategori', [KategoriController::class, 'update']);
        Route::post('/delete_kategori', [KategoriController::class, 'delete']);

        // CRUD BUKU
        Route::get('/buku', [BukuController::class, 'index']);
        Route::post('/create_buku', [BukuController::class, 'store']);
        Route::post('/update_buku', [BukuController::class, 'update']);
        Route::post('/delete_buku', [BukuController::class, 'delete']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});
