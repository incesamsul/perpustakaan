<?php


use App\Models\FavoritModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;
use App\Models\Member;

use App\Models\Pinjam;
use App\Models\LogAktivitasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\isNull;



function getLastSegment(){
    $segment= Pinjam::orderBy('updated_at', 'desc')->first();
        $segmentPinjam = 0;
        if(!$segment){
            $segmentPinjam = 1;
        } else {
            $segmentPinjam = $segment->segment + 1;
        }
        return $segmentPinjam;

}
function getJumlahMemberPerBulan($bulan)
{
    return Member::whereMonth('created_at', '=', $bulan)
        ->get();
}

function dateDiff($tgl_mulai, $tgl_akhir)
{
    // $tgl_mulai = "2009-06-24";
    // $tgl_akhir = "2009-06-26";

    $diff = abs(strtotime($tgl_akhir) - strtotime($tgl_mulai));

    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

    return $days;
}
function removeSpace($string)
{
    return str_replace(" ", "", $string);
}

function getUserRoleName($userRoleId)
{
    return DB::table('users')
        ->Join('role', 'role.id_role', '=', 'users.id_role')
        ->where('users.id_role', $userRoleId)
        ->select('nama_role')
        ->first()->nama_role;
}


function sweetAlert($pesan, $tipe)
{
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
        Swal.fire(
            "' . $pesan . '",
            "proses berhasil di lakukan",
            "' . $tipe . '",
        );
    })</script>';
}
