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
                                <label for="username"><i class="fas fa-envelope"></i> Email</label>
                                <input type="text" class="form-control border-0 my-custom-form" name="username" placeholder="masukkan email ....">
                            </div>
                            <div class="form-group text-secondary">
                                <label for="password"><i class="fas fa-lock"></i> Password</label>
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

      </div>

    </div>
  </section>
  <!-- end slider section -->
</div>



@endsection
