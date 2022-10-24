<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;
use DateTime;
use DateTimeZone;
use Dompdf\Dompdf;
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
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        return view('pages.pinjamkan.index', $data);
    }

    public function cetakPeminjaman()
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['buku'] = Pinjam::where('status', 'diambil')->get();
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        $html = view('pages.cetak.peminjaman', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("peminjaman.pdf", array("Attachment" => false));
        exit(0);
    }

    public function cetakPengembalian()
    {

        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['buku'] = Pinjam::where('status', 'selesai')->get();
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        $html = view('pages.cetak.peminjaman', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("peminjaman.pdf", array("Attachment" => false));
        exit(0);
    }

    public function denda()
    {
        $data['headerTitle'] = 'Denda';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['title'] = 'Belum diambil';
        $data['url'] = 'belum_diambil';
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $data['tanggal_hari_ini'] = $date->format('Y-m-d');
        $data['buku'] = Pinjam::where('status', 'selesai')->get();
        return view('pages.denda.index', $data);
    }
    public function pengembalian()
    {
        $data['headerTitle'] = 'Pengembalian';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi perpustakaan';
        $data['sidebar'] = 'liPengembalian';
        $lastSegment = getLastSegment() -1;
        $data['buku'] = Pinjam::where('status', 'selesai')->where('segment',$lastSegment)->get();
        return view('pages.pinjamkan.index', $data);
    }


    public function pinjamkanBuku($idUser)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        Pinjam::where('id_user', $idUser)->where('status', 'blm_diambil')->update([
            'status' => 'diambil',
            'tgl_pinjam' => $tanggal
        ]);

        return redirect()->back()->with('message', 'buku berhasil dipinjamkan');
    }

    public function kembalikanBuku($idUser)
    {
        $timezone = 'Asia/Makassar';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        $segment= Pinjam::latest()->first();
        $segmentPinjam = 0;
        if(!$segment){
            $segmentPinjam = 1;
        } else {
            $segmentPinjam = $segment->segment + 1;
        }
        $pinjam = Pinjam::where('id_user', $idUser)->where('status', 'diambil');


        foreach ($pinjam->get() as $row) {
            $buku = Buku::where('id_buku', $row->buku->id_buku);
            $stokBuku = $buku->first()->stok;
            $stokSemula = $stokBuku + $row->jml_buku;

            $buku->update([
                'stok' => $stokSemula,
                'last_code' => $buku->first()->last_code - $row->jml_buku
            ]);
        }


        $pinjam->update([
            'status' => 'selesai',
            'segment' => $segmentPinjam,
            'tgl_kembali' => $tanggal
        ]);
        return redirect()->back()->with('message', 'buku berhasil kembalian');
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
            'password' => bcrypt('12345'),
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
