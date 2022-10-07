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
                  <div class="row">
                      <div class="col-sm-7">
                        <h5 class="mb-5">
                            Login
                          </h5>
                          <form action="{{ URL::to('/postlogin') }}" method="post">
                            @csrf
                            @if (session('fail'))
                            <p class="text-danger">{{ session('fail') }}</p>
                            @endif

                            <div class="form-group text-secondary">
                                <label for="username"><i class="fas fa-user"></i> username</label>
                                <input type="text" class="form-control border-0 my-custom-form" name="username" placeholder="masukkan username ....">
                            </div>
                            <div class="form-group text-secondary">
                                <label for="password"><i class="fas fa-lock"></i> password</label>
                                <input type="text" class="form-control border-0 my-custom-form" name="password" placeholder="masukkan password ....">
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" bg-main text-white form-control border-0 my-custom-btn">Masuk</button>
                            </div>
                        </form>
                      </div>
                  </div>
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



@endsection
