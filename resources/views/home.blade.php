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
                        <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst. Vel sequi odit similique repudiandae ipsum iste, quidem tenetur id impedit, eaque et, aliquam quod.</p>
                        <div class="blue-button">
                            <a href="{{url('about')}}">Discover More</a>
                        </div>

                        <br>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="img/about-1-720x480.jpg" class="img-about" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="featured-places">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>Offers</h4>
                        <h2>Lorem ipsum dolor sit amet ctetur.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cardoffer">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="img/offer-1-720x480.jpg" alt="">
                        </div>

                        <div class="down-content">
                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <span>from <strong><sup>$</sup>120</strong> per weekend</span>

                            <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>

                            <div class="text-button">
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardoffer">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="img/offer-1-720x480.jpg" alt="">
                        </div>

                        <div class="down-content">
                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <span>from <strong><sup>$</sup>120</strong> per weekend</span>

                            <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>

                            <div class="text-button">
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardoffer">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="img/offer-1-720x480.jpg" alt="">
                        </div>

                        <div class="down-content">
                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <span>from <strong><sup>$</sup>120</strong> per weekend</span>

                            <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>

                            <div class="text-button">
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
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
