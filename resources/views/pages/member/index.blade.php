@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Member</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header  mr-3" placeholder="Cari Data  ..." id="searchbox">
                        <button type="button" class="btn bg-main text-white float-right" data-toggle="modal" id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-member table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Nama member</td>
                                <td>email</td>
                                <td>Nomor induk</td>
                                <td>Alamat</td>
                                <td>Kelas</td>
                                <td>No hp</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->user->email }}</td>
                                    <td>{{ $row->nomor_induk }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->kelas }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id="{{ $row->id_member }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
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
                <h5 class="modal-title" id="ModalLabel">member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body" id="main-body">
                <form id="formmember" action="{{ URL::to('/admin/create_member') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_member">Nama member</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input required type="text" class="form-control" name="nama_member" id="nama_member">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="nomor_induk">Nomor induk</label>
                        <input required type="text" class="form-control" name="nomor_induk" id="nomor_induk">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input required type="text" class="form-control" name="kelas" id="kelas">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input required type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No hp</label>
                        <input required type="text" class="form-control" name="no_hp" id="no_hp">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-main text-white" id="modalBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {


        // TOMBOL EDIT USER
        $('.table-member tbody').on('click', 'tr td a.edit', function() {
            let edit = $(this).data('edit');
            $('#nama_member').val(edit.user.name);
            $('#email').val(edit.user.email);
            $('#nomor_induk').val(edit.nomor_induk);
            $('#kelas').val(edit.kelas);
            $('#alamat').val(edit.alamat);
            $('#no_hp').val(edit.no_hp);
            $('#id').val(edit.id_member);
            $('#formmember').attr('action','/admin/update_member')
        })

        // TOMBOL TAMBAH USER
        $('#addUserBtn').on('click', function() {
            $('#formmember').attr('action','/admin/create_member')
        });

        // TOMBOL HAPUS USER
        $('.table-member tbody').on('click', 'tr td a.hapus', function() {
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
                        , url: '/admin/delete_member'
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

    $('#liAnggota').addClass('aktif');

</script>
@endsection
