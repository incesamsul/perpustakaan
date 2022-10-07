<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $data['keranjang'] = Keranjang::where('id_user', auth()->user()->id)->get();
        return view('halaman_depan.keranjang', $data);
    }

    public function store(Request $request)
    {
        $dataCheckout = json_decode($request->checkout);

        foreach ($dataCheckout as $row) {
            Pinjam::create([
                'id_user' => auth()->user()->id,
                'id_buku' => $row->id_buku,
                'jml_hari' => $row->jml_hari,
                'jml_buku' => $row->jml_buku,
            ]);
        }

        Keranjang::where('id_user', auth()->user()->id)->delete();

        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {


        Keranjang::where([
            ['id_buku', '=', $request->id]
        ])->update([
            'judul' => $request->judul,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete($idKeranjang, $jmlBuku)
    {
        $keranjang = Keranjang::where([
            ['id_keranjang', '=', $idKeranjang]
        ]);

        $idBuku = $keranjang->first()->buku->id_buku;
        $buku = Buku::where('id_buku', $idBuku);

        $stokBuku = $buku->first()->stok;
        $buku->update([
            'stok' => $stokBuku + $jmlBuku
        ]);
        $keranjang->delete();
        return redirect()->back()->with('message', 'data Berhasil di hapus');
    }
}
