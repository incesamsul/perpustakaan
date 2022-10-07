@extends('layouts.front.frontend')

@section('content')



<!-- end catagory section -->


<!-- catagory section -->

<section class="buku_section layout_padding">
  <div class="catagory_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <h4>Keranjang saya</h4>
      </div>
      <div class="row mt-5">
        @if (count($keranjang) > 0)
        <table class="table table-striped">
            <tr>
                <td>#</td>
                <td>Buku</td>
                <td>Jumlah hari</td>
                <td>Jumlah Buku</td>
                <td>Aksi</td>
            </tr>
            @foreach ($keranjang as $row)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        <a href="{{ URL::to('/detail_buku/' . $row->id_buku) }}" class="text-secondary">
                            <img src="{{ asset('data/gambar_buku/' . $row->buku->gambar) }}" alt="" class="img-thumbnail" width="100">
                            <p>{{ $row->buku->judul }}</p></a>
                    </td>
                    <td class="align-middle">{{ $row->jml_hari }}</td>
                    <td class="align-middle">{{ $row->jml_buku }}</td>
                    <td class="align-middle">
                        <a href="{{ URL::to('/keranjang/hapus/' . $row->id_keranjang . '/' . $row->jml_buku) }}"><i class="fas fa-trash text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <form action="{{ URL::to('/checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="checkout" value='@json($keranjang)'>
            <button type="submit" class="btn bg-main text-white">Checkout</button>
        </form>
        @else
        <div class="col-sm-6 offset-sm-3 mt-4 text-center">
            <img src="{{ asset('bostorek/images/empty.svg') }}" alt="" width="300">
            <p>Keranjang pinjaman anda kosong</p>
        </div>
        @endif
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
