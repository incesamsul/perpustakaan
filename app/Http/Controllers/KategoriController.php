<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('pages.kategori.index', $data);
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $user = Kategori::where([
            ['id_kategori', '=', $request->id]
        ])->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete(Request $request)
    {
        $user = Kategori::where([
            ['id_kategori', '=', $request->id]
        ])->delete();
        return 1;
    }
}
