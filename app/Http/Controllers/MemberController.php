<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data['headerTitle'] = 'Anggota';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['member'] = Member::all();
        return view('pages.member.index', $data);
    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->nama_member,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'role' => 'anggota',
        ]);

        Member::create([
            'nomor_induk' => $request->nomor_induk,
            'id_user' => $user->id,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $member = Member::where([
            ['id_member', '=', $request->id]
        ]);

        $idUser = $member->first()->id_user;
        User::where('id', $idUser)->update([
            'name' => $request->nama_member,
            'email' => $request->email,
            'password' => bcrypt($request->email),
        ]);

        $member->update([
            'nomor_induk' => $request->nomor_induk,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete(Request $request)
    {
        $member = Member::where([
            ['id_member', '=', $request->id]
        ]);

        $idUser = $member->first()->id_user;
        User::where('id', $idUser)->delete();

        $member->delete();
        return 1;
    }
}
