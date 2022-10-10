@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Scan buku pinjaman</h4>

                </div>
                <div class="card-body p-0 d-flex align-items-center justify-content-center">
                    <div style="width: 40%" id="reader"></div>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Buku pinjaman siswa</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header  mr-3" placeholder="Cari Data  ..." id="searchbox">
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-buku table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Judul</td>
                                <td>Nama</td>
                                <td>Pengarang</td>
                                <td>Tahun Terbit</td>
                                <td>Penerbit</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->buku->judul }}</td>
                                    <td>{{ $row->user->name }}</td>
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
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                <a data-detail='@json($row)' data-kategori='@json($row->buku->kategori)' data-path={{ asset('data/gambar_buku/' . $row->buku->gambar) }} data-toggle="modal" data-target="#modalPreview" class="dropdown-item detail" href="#"><i class="fas fa-info"> Detail</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body" id="previewBody">

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>

        $(document).ready(function(){
            // TOMBOL DETAIL
            $('.table-buku tbody').on('click', 'tr td a.detail', function() {
                let detail = $(this).data('detail');
                let kategori = $(this).data('kategori');
                let path = $(this).data('path');

                let detailHTML = '';
                    detailHTML += '<img class="img-thumbnail" src="' + path + '" alt="what"><hr>';
                    detailHTML += "Judul : " + detail.buku.judul + '<hr>';
                    detailHTML += "Pengarang : " + detail.buku.pengarang + '<hr>';
                    detailHTML += "Tahun terbit : " + detail.buku.tahun_terbit + '<hr>';
                    detailHTML += "Penerbit : " + detail.buku.penerbit + '<hr>';
                    detailHTML += "Isbn : " + detail.buku.isbn + '<hr>';
                    detailHTML += "Stok : " + detail.buku.stok + '<hr>';
                    detailHTML += "Lokasi : " + detail.buku.lokasi + '<hr>';
                    detailHTML += "Asal : " + detail.buku.asal + '<hr>';
                    detailHTML += "Kategori : " + kategori.nama_kategori + '<hr>';
                $('#previewBody').html(detailHTML);
            })
        })
        $('#{{$sidebar}}').addClass('aktif');

        function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
            // console.log(`Scan result: ${decodedText}`, decodedResult);
            console.log(`Scan result: ${decodedText}`, decodedResult);

            if(decodedResult.decodedText != ''){
                alert('scan berhasil tunggu sebentar');
                setTimeout(() => {
                    document.location.href = decodedResult.decodedText;
                }, 1500);
            }
        }

        function onScanError(errorMessage) {
            // handle on error condition, with error message
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
@endsection
