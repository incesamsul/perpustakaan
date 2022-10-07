@extends('layouts.front.frontend')

@section('content')
<!-- slider section -->
<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h5>
                    PerpusWeb
                  </h5>
                  <h1>
                    Penuhi <br>
                    Kebutuhan membacamu
                  </h1>
                  <p>
                      Cari buku lebih mudah dengan perpusweb, lakukan peminjaman secara online kapanpun dan dimanapun
                  </p>
                  <a href="">
                    Lebih lanjut
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ asset('bostorek/images/slider-img.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                    <h5>
                        PerpusWeb
                      </h5>
                      <h1>
                        Penuhi <br>
                        Kebutuhan membacamu
                      </h1>
                      <p>
                          Cari buku lebih mudah dengan perpusweb, lakukan peminjaman secara online kapanpun dan dimanapun
                      </p>
                      <a href="">
                        Lebih lanjut
                      </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ asset('bostorek/images/slider-img.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                    <h5>
                        PerpusWeb
                      </h5>
                      <h1>
                        Penuhi <br>
                        Kebutuhan membacamu
                      </h1>
                      <p>
                          Cari buku lebih mudah dengan perpusweb, lakukan peminjaman secara online kapanpun dan dimanapun
                      </p>
                      <a href="">
                        Lebih lanjut
                      </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ asset('bostorek/images/slider-img.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel_btn_box">
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <!-- end slider section -->
</div>


<!-- catagory section -->

<section class="catagory_section layout_padding" id="kategori">
  <div class="catagory_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          Kategori Buku
        </h2>
        <p>
          Aada banyak varian kategori buku yang tersedia, pilih kategori yang kamu sukai.
        </p>
      </div>
      <div class="row mt-3">
        @foreach ($kategori as $row)
        <div class="col-sm-2">
            <a href="{{ URL::to('/kategori/' . $row->id_kategori . '#kategori') }}" class="text-secondary">
                <div class="{{$id_kategori == $row->id_kategori ? 'active-card' : ''}} card p-4 d-flex flex-column align-items-center justify-content-center border-0 soft-shadow">
                    <i class="fas fa-book h1"></i>
                    <strong>{{ $row->nama_kategori }}</strong>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-sm-2">
            <a href="{{ URL::to('/') }}" class="text-secondary">
                <div class="card p-4 d-flex flex-column align-items-center justify-content-center border-0 soft-shadow">
                    <i class="fas fa-book h1"></i>
                    <strong>Semua buku</strong>
                </div>
            </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end catagory section -->


<!-- catagory section -->

<section class="buku_section layout_padding" id="buku">
  <div class="catagory_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex">
            <h2>
                Daftar Buku
              </h2>
              <button class="btn btn-light" id="btn-search">
                  <i class="fas fa-search"></i>
              </button>
        </div>

      </div>
      <div class="row">
        @if (count($buku) > 0)
        @foreach ($buku as $row)
        <div class="col-sm-3">
            <a href="{{ URL::to('/detail_buku/' . $row->id_buku) }}" class="text-secondary">
                <div class="card books-card d-flex flex-column  border-0 soft-shadow">
                    <img src="{{ asset('data/gambar_buku/' . $row->gambar) }}" alt="buku">
                    <div class="books-capt p-4 d-flex flex-column">
                        <strong>{{ $row->judul }}</strong>
                        <span>Penerbit : {{ $row->penerbit }}</span>
                        <span>Stok : {{ $row->stok }}</span>
                        <span class="small">{{ $row->tahun_terbit  . " - " . $row->isbn}}</span>

                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
            <div class="col-sm-6 offset-sm-3 mt-4 text-center">
                <img src="{{ asset('bostorek/images/empty.svg') }}" alt="" width="300">
                <p>Mohon maaf buku yang anda cari tidak tersedia</p>
            </div>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- end catagory section -->


<!-- info section -->

<section class="info_section layout_padding2" id="tentang_kami">
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
@section('script')
<script>

    $('#btn-search').on('click',function(){
        alert('hwta')
    })

</script>
@endsection
