<head>
     <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('dist/css/home.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('dist/css/navboot.css') }}" rel="stylesheet"> --}}

</head>
@if (session()->has('status'))
    <script>alert('{{ session()->get('status') }}')</script>
@endif
@include('frontend.includes.navbar')

<section class="banner" id="top" style="background-image: url({{asset('images/homecar.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Book a Car. Travel For Fun!!</h2>
                    <div class="blue-button">
                        <a href="{{url('contact')}}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="abtus">
                    <div class="left-content">
                        <br>
                        <h4>About us</h4>
                        <p>Cars Easy is a simple to use Car rental site brought to you people so that car renting gets as easy as it can.</p>
                        <div class="blue-button">
                            <a href="{{url('about')}}">Discover More</a>
                        </div>

                        <br>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{asset('images/carlogo.png')}}" class="img-about" alt="About">
                </div>
            </div>
        </div>
    </section>

    <section class="featured-places">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>New Cars</h4>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($new_cars['rows'] as $new_car )

                <div class="cardoffer">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{asset('images/cars/'.$new_car->logo)}}" alt="">
                        </div>

                        <div class="down-content">
                            <h4>{{$new_car->car_name}}</h4>

                            <span><strong>{{$new_car->minimum_charge}}</strong> per day</span>

                            <p>{{$new_car->seat_capacity}}</p>

                            <div class="text-button">
                                <a href="{{ route('newcars_details',['id' => $new_car->id]) }}">Book Now</a>
                            </div>
                        </div>
            </div>
                </div>
                @endforeach

                </div>


            </div>
        </div>
    </section>

</main>
<footer class="main-footer">
    <strong>Copyright &copy;2022 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
    <div >

  </footer>
