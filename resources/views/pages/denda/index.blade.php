@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Pengguna</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header  mr-3" placeholder="Cari Data Pengguna ..." id="cari-data-pengguna">
                        <select class="custom-select form-control mr-3" id="filter-data-pengguna">
                            <option value="" selected>Filter</option>
                            <option value=""></option>
                        </select>
                        <button type="button" class="btn bg-main text-white float-right" data-toggle="modal" id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                <table class="table table-striped">
            <tr>
                <td>#</td>
                <td>Buku</td>
                <td>jml hari</td>
                <td>jml Buku</td>
                <td>Nama</td>
                <td>Tgl pinjam</td>
                <td>Tgl kembali</td>
                <td>Terlambat</td>
                <td>Denda</td>

                <td>Aksi</td>
            </tr>
            @foreach ($buku as $row)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        <a href="{{ URL::to('/detail_buku/' . $row->id_buku) }}" class="text-secondary">
                            <img src="{{ asset('data/gambar_buku/' . $row->buku->gambar) }}" alt="" class="img-thumbnail" width="100">
                            <p>{{ $row->buku->judul }}</p></a>
                    </td>
                    <td class="align-middle">{{ $row->jml_hari }}</td>
                    <td class="align-middle">{{ $row->jml_buku }}</td>
                    <td class="align-middle">{{ $row->user->member->nomor_induk . ' ' . $row->user->name }}</td>
                    <td class="align-middle">{{ $row->tgl_pinjam == '' ? 'none' : $row->tgl_pinjam  }}</td>
                    <td class="align-middle">{{ $row->tgl_kembali == '' ? 'none' : $row->tgl_kembali  }}</td>
                    <?php
                    $jmlTerlambat = dateDiff($row->tgl_pinjam,$row->tgl_kembali) - $row->jml_hari;
                    ?>
                    <td class="align-middle">{{ $jmlTerlambat < 0 ? '0' : $jmlTerlambat }} Hari</td>
                    <td class="align-middle">{{ $jmlTerlambat < 0 ? '0' : 'Rp. '. number_format($jmlTerlambat * 500) }} </td>
                    <td>
                        <?php
                            $noHp = $row->user->member->no_hp;
                            $terlambat = $jmlTerlambat < 0 ? '0' : $jmlTerlambat;
                            $denda = $jmlTerlambat < 0 ? '0' : 'Rp. '. number_format($jmlTerlambat * 500);
                            $message = $row->user->name . 'Anda belum mengembalikan Buku perpustakaan sudah terlambat ' . $terlambat . ' hari dari tanggal ' . $row->tgl_pinjam . '  denda sebanyak  Rp '. $denda .' * dari Admin Perpustakaan*';
                        ?>
                        <a href="https://web.whatsapp.com/send?phone={{ $noHp }}&text={{ $message }}" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('script')
<script>
    $(document).ready(function() {

    });

    $('#liDenda').addClass('aktif');

</script>
@endsection
