<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;

class UserController extends Controller
{

    public function myAccount()
    {
        return view('halaman_depan.my_account');
    }

    public function belumDiambil()
    {
        $data['title'] = 'Belum diambil';
        $data['buku'] = Pinjam::where('status', 'blm_diambil')->get();
        return view('halaman_depan.buku_pinjaman', $data);
    }

    public function sudahDiambil()
    {
        $data['title'] = 'Sudah diambil';
        $data['buku'] = Pinjam::where('status', 'diambil')->get();
        return view('halaman_depan.buku_pinjaman', $data);
    }

    public function pinjamanSelesai()
    {
        $data['title'] = 'Selesai dipinjam';
        $data['buku'] = Pinjam::where('status', 'selesai')->get();
        return view('halaman_depan.buku_pinjaman', $data);
    }
}
