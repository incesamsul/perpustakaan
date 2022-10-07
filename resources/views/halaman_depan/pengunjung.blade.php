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
                    <h5>Scan kartu perpustakaanmu disini</h5>
                    <div style="width: 80%" id="reader"></div>
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

@section('script')
    <script>


        function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
            // console.log(`Scan result: ${decodedText}`, decodedResult);
            console.log(`Scan result: ${decodedText}`, decodedResult);
            document.location.href = '/pengunjung/' + decodedResult.decodedText;
        }

        function onScanError(errorMessage) {
            // handle on error condition, with error message
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
@endsection

