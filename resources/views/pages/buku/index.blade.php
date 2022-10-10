@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Buku</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header  mr-3" placeholder="Cari Data  ..." id="searchbox">
                        <button type="button" class="btn bg-main text-white float-right" data-toggle="modal" id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-buku table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Kode buku</td>
                                <td>Judul</td>
                                <td>Pengarang</td>
                                <td>Tahun Terbit</td>
                                <td>Penerbit</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn-unlihat btn btn-danger" style="display: none"><i class="fas fa-times"></i></button>
                                        <button class="btn-lihat btn btn-primary"><i class="fas fa-eye"></i></button>
                                        <div class="stok-wrapper" style="display: none">
                                            @for ($i = $row->last_code; $i<= $row->stok + ($row->last_code - 1); $i++)
                                            {{ substr($row->judul,0,3) }}-00{{ $i }} <br>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->pengarang }}</td>
                                    <td>{{ $row->tahun_terbit }}</td>
                                    <td>{{ $row->penerbit }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                <a data-detail='@json($row)' data-kategori='@json($row->kategori)' data-path={{ asset('data/gambar_buku/' . $row->gambar) }} data-toggle="modal" data-target="#modalPreview" class="dropdown-item detail" href="#"><i class="fas fa-info"> Detail</i></a>
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id="{{ $row->id_buku }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
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
<div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body" id="main-body">
                <form id="formbuku" action="{{ URL::to('/admin/create_buku') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input required type="text" class="form-control" name="judul" id="judul">
                    </div>
                    <div class="form-group">
                        <label for="kategori">kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">-- kategori --</option>
                            @foreach ($kategori as $row)
                                <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_buku">Kode buku</label>
                        <input readonly value="" required type="text" class="form-control" name="kode_buku" id="kode_buku">
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input required type="text" class="form-control" name="pengarang" id="pengarang">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input required type="year" class="form-control" name="tahun_terbit" id="tahun_terbit">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input required type="text" class="form-control" name="penerbit" id="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="isbn">Isbn</label>
                        <input required type="text" class="form-control" name="isbn" id="isbn">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input required type="number" class="form-control" name="stok" id="stok">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input required type="text" class="form-control" name="lokasi" id="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="asal">asal</label>
                        <select name="asal" id="asal" class="form-control" required>
                            <option value="">-- asal --</option>
                            <option>pembelian</option>
                            <option>sumbangan</option>
                            <option>denda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">sinopsis</label>
                        <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-main text-white" id="modalBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
    $(document).ready(function() {


        $('.btn-lihat').on('click',function(){
            $(this).next().css('display','block');
            $(this).css('display','none');
            $(this).prev().css('display','block');
        })

        $('.btn-unlihat').on('click',function(){
            $(this).next().next().css('display','none');
            $(this).css('display','none');
            $(this).next().css('display','block');
        })

        $(document).on('change','#kategori', function(){
            let text = $('#kategori option:selected').text();
            let kode = text.substr(0,3);
            let randomNumber = Math.floor(1000 + Math.random() * 9000);
            $('#kode_buku').val(kode + "-" + randomNumber)

        })

        // TOMBOL DETAIL
        $('.table-buku tbody').on('click', 'tr td a.detail', function() {
            let detail = $(this).data('detail');
            let kategori = $(this).data('kategori');
            let path = $(this).data('path');

            let detailHTML = '';
                detailHTML += '<img class="img-thumbnail" src="' + path + '" alt="what"><hr>';
                detailHTML += "Judul : " + detail.judul + '<hr>';
                detailHTML += "Pengarang : " + detail.pengarang + '<hr>';
                detailHTML += "Tahun terbit : " + detail.tahun_terbit + '<hr>';
                detailHTML += "Penerbit : " + detail.penerbit + '<hr>';
                detailHTML += "Isbn : " + detail.isbn + '<hr>';
                detailHTML += "Stok : " + detail.stok + '<hr>';
                detailHTML += "Lokasi : " + detail.lokasi + '<hr>';
                detailHTML += "Asal : " + detail.asal + '<hr>';
                detailHTML += "Kategori : " + kategori.nama_kategori + '<hr>';
            $('#previewBody').html(detailHTML);
        })

        // TOMBOL EDIT USER
        $('.table-buku tbody').on('click', 'tr td a.edit', function() {
            let edit = $(this).data('edit');
            $('#id').val(edit.id_buku);
            $('#judul').val(edit.judul);
            $('#kode_buku').val(edit.kode_buku);
            $('#pengarang').val(edit.pengarang);
            $('#tahun_terbit').val(edit.tahun_terbit);
            $('#penerbit').val(edit.penerbit);
            $('#isbn').val(edit.isbn);
            $('#stok').val(edit.stok);
            $('#lokasi').val(edit.lokasi);
            $('#asal').val(edit.asal);
            $('#kategori').val(edit.id_kategori);
            $('#sinopsis').val(edit.sinopsis);
            $('#formbuku').attr('action','/admin/update_buku')
        })

        // TOMBOL TAMBAH USER
        $('#addUserBtn').on('click', function() {
            $('#formbuku').attr('action','/admin/create_buku')
        });

        // TOMBOL HAPUS USER
        $('.table-buku tbody').on('click', 'tr td a.hapus', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/admin/delete_buku'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            })
        });





    });

    $('#liBuku').addClass('aktif');

</script>
@endsection
