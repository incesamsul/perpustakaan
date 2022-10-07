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
            <h4>{{ $title }}</h4>
            @if (count($buku) > 0)
        <table class="table table-striped">
            <tr>
                <td>#</td>
                <td>Buku</td>
                <td>jml hari</td>
                <td>jml Buku</td>
                @if ($title != 'Belum diambil')
                <td>Tgl pinjam</td>
                <td>Tgl kembali</td>
                <td>Terlambat</td>
                <td>Denda</td>
                @endif
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
                    @if ($title != 'Belum diambil')
                        <td class="align-middle">{{ $row->tgl_pinjam == '' ? 'none' : $row->tgl_pinjam  }}</td>
                        <td class="align-middle">{{ $row->tgl_kembali == '' ? 'none' : $row->tgl_kembali  }}</td>
                        <?php
                        $jmlTerlambat = dateDiff($row->tgl_pinjam,$tanggal_hari_ini) - $row->jml_hari;
                        ?>
                        <td class="align-middle">{{ $jmlTerlambat < 0 ? '0' : $jmlTerlambat }} Hari</td>
                        <td class="align-middle">{{ $jmlTerlambat < 0 ? '0' : 'Rp. '. number_format($jmlTerlambat * 500) }} </td>
                    @endif
                    <td class="align-middle">
                    @if ($url == 'pinjaman_selesai')
                        <span class="badge badge-secondary">none</span>
                        @else
                        @if ($title == 'Belum diambil')
                        <button data-qrcode="{{ URL::to('/pustakawan/pinjamkan/' . $row->id_pinjam) }}" class="btn btn-lihat bg-main text-white"  data-toggle="modal" data-target="#qrcode" data-keyboard="false" data-backdrop="static">Lihat</button>
                        @else
                        <button data-qrcode="{{ URL::to('/pustakawan/kembalikan/' . $row->id_pinjam) }}" class="btn btn-lihat bg-main text-white"  data-toggle="modal" data-target="#qrcode" data-keyboard="false" data-backdrop="static">Lihat</button>
                        @endif
                    @endif
                    </td>
                </tr>
            @endforeach
        </table>
        @else
        <div class="col-sm-6 offset-sm-3 mt-4 text-center">
            <img src="{{ asset('bostorek/images/empty.svg') }}" alt="" width="300">
            <p>data anda kosong</p>
        </div>
        @endif
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
  <div class="modal fade border-0" id="qrcode" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrcodeLabel">Scan disini</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span id="btn-close" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex align-items-center justify-content-center">
            <div id="qrcode_user"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.btn-lihat').on('click',function(){
            let qrcodeText = $(this).data('qrcode');
            var qrcode = new QRCode("qrcode_user", {
                text: qrcodeText,
                width: 300,
                height: 300,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
            $('#btn-close').on('click',function(){
                document.location.href = '/{{ $url }}'
            })
        });

    });




    </script>

@endsection
