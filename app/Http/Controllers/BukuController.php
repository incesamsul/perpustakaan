<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data['headerTitle'] = 'Buku';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['kategori'] = Kategori::all();
        $data['buku'] = Buku::all();
        return view('pages.buku.index', $data);
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $namaFile = uniqid() . '.jpg';
        $gambar->move(public_path('data/gambar_buku/'), $namaFile);
        Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'asal' => $request->asal,
            'sinopsis' => $request->sinopsis,
            'id_kategori' => $request->kategori,
            'gambar' => $namaFile,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {

        $gambar = $request->file('gambar');
        if ($gambar) {
            $namaFile = uniqid() . '.jpg';
            $gambar->move(public_path('data/gambar_buku/'), $namaFile);
            Buku::where([
                ['id_buku', '=', $request->id]
            ])->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'penerbit' => $request->penerbit,
                'isbn' => $request->isbn,
                'stok' => $request->stok,
                'lokasi' => $request->lokasi,
                'asal' => $request->asal,
                'sinopsis' => $request->sinopsis,
                'id_kategori' => $request->kategori,
                'gambar' => $namaFile,
            ]);
        } else {
            Buku::where([
                ['id_buku', '=', $request->id]
            ])->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'penerbit' => $request->penerbit,
                'isbn' => $request->isbn,
                'stok' => $request->stok,
                'lokasi' => $request->lokasi,
                'asal' => $request->asal,
                'sinopsis' => $request->sinopsis,
                'id_kategori' => $request->kategori,
            ]);
        }
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete(Request $request)
    {
        $user = Buku::where([
            ['id_buku', '=', $request->id]
        ])->delete();
        return 1;
    }
}
