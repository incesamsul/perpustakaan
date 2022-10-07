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
        <div class="col-sm-5">
            <img src="{{ asset('data/gambar_buku/' . $buku->gambar) }}" alt="" width="400">
        </div>
        <div class="col-sm-7">
            <h4>{{ $buku->judul }}</h4>
            <p><small>penerbit : {{ $buku->penerbit }}</small></p>
            <h5>Sinopsis</h5>
            <p>{{ $buku->sinopsis }}</p>
            <p>ISBN : {{ $buku->isbn }}</p>
            <p>Tahun terbit : {{ $buku->tahun_terbit }}</p>
            <p>Stok : {{ $buku->stok }}</p>
            @if ($buku->stok > 0)
            <div class="form">
                <form action="{{ URL::to('/simpan_ke_keranjang') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="hidden" name="buku" value="{{ $buku->id_buku }}">
                            <input required placeholder="Jumlah hari" type="number" name="jml_hari" id="jml_hari" class="form-control" size="1" max="7" min="1">
                        </div>
                        <div class="col-sm-4">
                            <input required placeholder="Jumlah buku" type="number" name="jml_buku" id="jml_buku" class="form-control" size="1" max="{{ $buku->stok }}" min="1">
                        </div>
                        <div class="col-sm-4">
                             <button type="submit" class="btn bg-main text-white">Pinjam</button>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <span class="alert alert-info">Stok buku habis</span>
            @endif
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

@endsection
