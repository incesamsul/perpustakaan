<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak laporan</title>
    <style>
        body {
            /* color: rgba(0, 0, 0, 0.8); */
        }

        .full-width {
            width: 100%;
        }

        .logo {
            float: left;
            margin-bottom: 15px;
            margin-right: 5px;
            margin-left: 100px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .header {
            color: #000000;
            border-bottom: 4px double #000000;
            margin-bottom: 10px;
        }

        .header-text {
            text-align: center;
        }

        .header-text * {
            margin: 1px;
        }

        .header-text p {
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        table {
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header clearfix">
            <div class="logo">
                <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents('img/smak.png'))}}" alt="image" width="100">
            </div>
            <div class="header-text">
                <br><br>
                <h4>Perpustakaan SMKN 7 Pangkep</h4>
                <p>Jl. Andi Muri Dg Lulu, Balanakang, Jagong, Kec. Pangkajene, Kabupaten Pangkajene Dan Kepulauan, Sulawesi Selatan 90612
                </p>
            </div>
        </div>
        <h4 class="text-center">Laporan Peminjaman</h4>

        <table class="full-width mt-10 mb-30" border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                    <td>Judul</td>
                    <td>Nama</td>
                    <td>Nisn</td>
                    <td>Kode buku</td>
                    <td>Pengarang</td>
                    <td>Tahun Terbit</td>
                    <td>Penerbit</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->buku->judul }}</td>
                        <td>{{ $row->user->name  }}</td>
                        <td>{{ $row->user->member->nomor_induk }}</td>
                        <td>
                            <button class="btn-unlihat btn btn-danger" style="display: none"><i class="fas fa-times"></i></button>
                            <button class="btn-lihat btn btn-primary"><i class="fas fa-eye"></i></button>
                            <div class="stok-wrapper" style="display: none">
                            @for ($i = $row->user->pinjam->last_code; $i<= ($row->user->pinjam->jml_buku * $row->user->pinjam->last_code); $i++)
                            {{ substr($row->buku->judul,0,3) }}-00{{ $i }} <br>
                            @endfor
                            </div>
                        </td>
                        <td>{{ $row->buku->pengarang }}</td>
                        <td>{{ $row->buku->tahun_terbit }}</td>
                        <td>{{ $row->buku->penerbit }}</td>
                        <td>
                            @if($row->status == 'diambil')
                            <span class="badge badge-primary">diambil</span>
                            @elseif($row->status = 'selesai')
                            <span class="badge badge-success">selesai</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
