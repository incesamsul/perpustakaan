<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class General extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function dashboard()
    {
        $data['member'] = Member::all();
        $data['dipinjam'] = Pinjam::where('status', 'diambil')->get();
        $data['dikembalikan'] = Pinjam::where('status', 'selesai')->get();
        $data['totalBuku'] = Buku::all();
        $data['headerTitle'] = 'Dashboard';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        return view('pages.dashboard.index', $data);
    }

    public function profile()
    {
        $data['headerTitle'] = 'Profile pengguna';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['user'] = $this->userModel->getUserProfile(auth()->user()->id);
        return view('pages.profile.index', $data);
    }

    public function bantuan()
    {
        return view('pages.bantuan.index');
    }

    public function ubahRole(Request $request)
    {
        User::where('id', auth()->user()->id)
            ->update(['role' => $request->post('role')]);
        return redirect()->back();
    }

    public function ubahFotoProfile(Request $request)
    {

        $extensions = ['jpg', 'jpeg', 'png'];

        $result = array($request->foto->getClientOriginalExtension());

        if (in_array($result[0], $extensions)) {
            $file = $request->foto;
        } else {
            return redirect()->back()->with('error', 'format file tidak di dukung');
        }

        // $fileName = auth()->user()->email . "." . $request->foto->extension();
        $fileName = uniqid() . "." . $request->foto->extension();
        $request->foto->move(public_path('data/foto_profile/'), $fileName);

        // Storage::disk('uploads')->put($fileName, file_get_contents($request->foto->getRealPath()));

        User::where('id', auth()->user()->id)
            ->update(['foto' => $fileName]);
        return redirect()->back();
    }
}
