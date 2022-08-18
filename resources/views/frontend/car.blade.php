

@include('frontend.includes.navbar')
<link href="{{ asset('dist/css/card.css') }}" rel="stylesheet">
<div class="container">
<div class="row">

    @foreach ($cars['rows'] as $car )


<div class="cardoffer">
    <div class="featured-item">
        <div class="thumb">
            <img src="{{asset('images/cars/'.$car->logo)}}" alt="">
        </div>

        <div class="down-content">
            <h4>Name:{{$car->car_name}}</h4>

            <span>Charge Per Day:Rs.{{$car->minimum_charge}} per day</span>
             <p>Seat Capacity:{{$car->seat_capacity}}</p>
             <p>Fuel Type:{{$car->fuel_type}}</p>
            <div class="text-button">
                <a href="{{ route('cars_details',['id' => $car->id]) }}">Book Now</a>
            </div>
        </div>
    </div>
</div>


@endforeach

</div>
</div>

