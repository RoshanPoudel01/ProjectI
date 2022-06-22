@include('frontend.includes.header')

@include('frontend.includes.navbar')
<div class="card card-success">
    <div class="card-body">
@foreach ($cars['rows'] as $car )

      {{-- <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4">
          <div class="card mb-2 bg-gradient-dark">
            <img class="card-img-top" src="{{asset('images/cars/').$car->logo}}" alt="Dist Photo 1">
            <div class="card-img-overlay d-flex flex-column justify-content-end">
              <h5 class="card-title text-primary text-white">{{$car->car_name}}</h5>
              {{-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> --}}
              {{-- <a href="#" class="text-white">Last update 2 mins ago</a>
            </div>
          </div>
        </div> --}}
<div>
    Car Image=<img src='{{asset('images/cars').$car->logo}}' class="img-fluid" width='100px'></br>
    Car Name={{$car->car_name}}
    </div>
@endforeach

