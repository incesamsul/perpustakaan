<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;

class Home extends Controller
{

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
        return view('halaman_depan.detail_buku', $data);
    }
}
