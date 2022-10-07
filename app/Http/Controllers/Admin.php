<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Pinjam;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{

    protected $userModel;
    protected $profileUserModel;
    protected $kritikSaranModel;
    protected $kuisionerModel;
    protected $penilaianModel;


    public function __construct()
    {
        $this->userModel = new User();
    }

    public function pengguna()
    {
        $data['headerTitle'] = 'Pengguna';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['pengguna'] = User::all();
        return view('pages.pengguna.index', $data);
    }

    public function pinjamkan()
    {
        $data['headerTitle'] = 'Peminjaman';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['sidebar'] = 'liPinjamkan';
        $data['buku'] = Pinjam::where('status', 'diambil')->get();
        return view('pages.pinjamkan.index', $data);
    }

    public function pinjamkanBuku($idPinjam)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        Pinjam::where('id_pinjam', $idPinjam)->update([
            'status' => 'diambil',
            'tgl_pinjam' => $tanggal
        ]);

        return redirect()->back()->with('message', 'buku berhasil dipinjamkan');
    }

    public function kembalikanBuku($idPinjam)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        Pinjam::where('id_pinjam', $idPinjam)->update([
            'status' => 'selesai',
            'tgl_kembali' => $tanggal
        ]);
        return redirect()->back()->with('message', 'buku berhasil kembalikan');
    }

    public function pengembalian()
    {
        $data['headerTitle'] = 'Pengembalian';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['sidebar'] = 'liPengembalian';
        $data['buku'] = Pinjam::where('status', 'selesai')->get();
        return view('pages.pinjamkan.index', $data);
    }

    public function profileUser()
    {
        $data['user'] = User::all();
        $data['profile'] = $this->profileUserModel->getProfileUser();
        return view('pages.rekaptulasi_data.index', $data);
    }






    // fetch data user by admin
    function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if ($request->filter == "") {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            } else {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('role', '=', $request->filter)
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            }

            return view('pages.pengguna.users_data', $data)->render();
        }
    }

    public function createPengguna(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di tambahkan');
    }


    public function updatePengguna(Request $request)
    {
        $user = User::where([
            ['id', '=', $request->id]
        ])->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di update');
    }

    public function deletePengguna(Request $request)
    {
        User::destroy($request->post('user_id'));
        return 1;
    }
}
