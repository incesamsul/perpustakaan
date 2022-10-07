<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pengunjung;
use App\Models\Pinjam;
use DateTime;
use DateTimeZone;

class Home extends Controller
{

    public function pengunjung()
    {
        return view('halaman_depan.pengunjung');
    }

    public function daftarPengunjung()
    {
        $data['member'] = Pengunjung::all();
        return view('pages.daftar_penunjung.index', $data);
    }

    public function tambahPengunjung($nomorInduk)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $member = Member::where('nomor_induk', $nomorInduk)->first();
        $pengunjung = Pengunjung::where('tgl_berkunjung', $tanggal)->where('id_member', $member->id_member)->first();

        if (!$pengunjung) {
            Pengunjung::create([
                'id_member' => $member->id_member,
                'tgl_berkunjung' => $tanggal
            ]);
            $message = 'Selamat datang di perpustakaan ' . $member->user->name;
        } else {
            $message = 'Sepertinya ' . $member->user->name . ' sudah melakukan scan hari ini';
        }

        return redirect()->back()->with('message', $message);
    }

    public function beranda($idKategori = null)
    {
        if (!$idKategori) {
            $data['buku'] = Buku::all();
        } else {
            $data['buku'] = Buku::where('id_kategori', $idKategori)->get();
        }
        $data['id_kategori'] = $idKategori;
        $data['nama_kategori'] = Kategori::where('id_kategori', $idKategori)->first();
        $data['kategori'] = Kategori::all()->take(5);
        return view('halaman_depan.beranda', $data);
    }

    public function detailBuku($idBuku = null)
    {
        if (!$idBuku) {
            return back();
        } else {
            $data['buku'] = Buku::where('id_buku', $idBuku)->first();
        }
        if (auth()->user()) {
            $data['pinjaman_user'] = Pinjam::where('id_user', auth()->user()->id)->where('status', '!=', 'selesai')->first();
        } else {
            $data['pinjaman_user'] = null;
        }
        return view('halaman_depan.detail_buku', $data);
    }
}
