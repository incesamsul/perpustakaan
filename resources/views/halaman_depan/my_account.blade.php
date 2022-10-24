@extends('layouts.front.frontend')

@section('content')



<!-- end catagory section -->


<!-- catagory section -->

<section class="buku_section layout_padding">
  <div class="catagory_container">
    <div class="container ">
      {{-- <div class="heading_container heading_center">

      </div> --}}
      <div class="row mt-5">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-6">
                    <div class="section-title table-responsive">
                        <h2>Detail Akun</h2>
                        <div class="d-flex flex-column align-items-start mb-3">
                          <img  src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto) }}" alt="" class="rounded-circle-profile mb-2" width="100">
                          <a href="" class="btn bg-main text-white btn-sm" data-toggle="modal" data-target="#modal">
                            <i class="fas fa-camera"></i> Ganti Foto Profil
                          </a>
                        </div>
                          <p>nama : {{ auth()->user()->name }}</p>
                          <p>email : {{ auth()->user()->email }}</p>
                          <p>nomor induk : {{ auth()->user()->member->nomor_induk }}</p>
                          <p>alamat : {{ auth()->user()->member->alamat }}</p>
                          <p>nomor hp : {{ auth()->user()->member->no_hp }}</p>
                          <p>kelas : {{ auth()->user()->member->kelas }}</p>
                    </div>
                </div>
                <div class="col-sm-6  d-flex align-items-center justify-content-start">
                    <div id="qrcode_user"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            @include('components.menu_pengguna')
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end catagory section -->


<!-- info section -->

<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 info-col">
        <div class="info_detail">
          <h4>
            Tentang kami
          </h4>
          <p>
            Perpustakaan web adalah aplikasi berbasis web yang mempermudah pengelolaan buku dan peminjaman buku pada perpustakaan
          </p>
          <div class="info_social">
            <a href="">
              <i class="fab fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fab fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fab fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 info-col">
        <div class="info_contact">
          <h4>
            Address
          </h4>
          <div class="contact_link_box">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Jl. Andi muri dg lulu
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Telp +02345683722
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                smkn7@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 info-col">
        <div class="info_contact">
          <h4>
            Email
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Kirim
            </button>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 info-col">
        <div class="map_container">
          <div class="map">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end info section -->


  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">ganti foto profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 d-flex flex-column justify-content-center align-items-center">
                    <img id="preview" src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto . '/'. auth()->user()->foto) }}" alt="" class="rounded-circle mb-2" width="100">
                    <label for="ket_simulator">Ganti foto profile</label>
                    <div class="custom-file">
                        <form action="{{ URL::to('/ubah_foto_profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <input accept="image/*" wire:model='photo' required type="file" class="custom-file-input" id="customFile" name="foto" onchange="loadFile(event)">
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ganti</button>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var qrcode = new QRCode("qrcode_user", {
            text: '{{ auth()->user()->member->nomor_induk }}',
            width: 300,
            height: 300,
            colorDark : "#063547",
            colorLight : "#F5F6F9",
            correctLevel : QRCode.CorrectLevel.H
        });

    });






    var loadFile = function(event){
        var output = document.querySelector('#preview');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    $('.btn-preview').on('click', function() {
        let path = $(this).data('path');
        $('#iframe-preview').attr('src',path);
    })


</script>
@endsection


