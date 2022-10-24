<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use DateTime;
use DateTimeZone;

class UserController extends Controller
{

    public function myAccount()
    {
        return view('halaman_depan.my_account');
    }

    public function belumDiambil()
    {
        $data['title'] = 'Belum diambil';
        $data['url'] = 'belum_diambil';
        $data['buku'] = Pinjam::where('status', 'blm_diambil')->where('id_user',auth()->user()->id)->get();
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        return view('halaman_depan.buku_pinjaman', $data);
    }

    public function sudahDiambil()
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');
        $data['title'] = 'Sudah diambil';
        $data['url'] = 'sudah_diambil';
        $data['buku'] = Pinjam::where('status', 'diambil')->where('id_user',auth()->user()->id)->get();
        return view('halaman_depan.buku_pinjaman', $data);
    }

    public function pinjamanSelesai()
    {
        $data['url'] = 'pinjaman_selesai';
        $data['title'] = 'Selesai dipinjam';
        $data['buku'] = Pinjam::where('status', 'selesai')->where('id_user',auth()->user()->id)->get();
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        return view('halaman_depan.buku_pinjaman', $data);
    }
}
