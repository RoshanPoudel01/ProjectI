
@include('frontend.includes.navbar')
<link href="{{ asset('dist/css/booking.css') }}" rel="stylesheet">
<div class="imgbck">
<img src='{{asset('images/cars/'.$cars_details->logo)}}' class="img-fluid" width='100px'>
</div>


{!! Form::open(['route' => 'car.book', 'method' => 'post','enctype'=>'multipart/form-data']) !!}
<div class="card-body">
    <input type="hidden" name="car_id" value="{{ $cars_details->id }}">
    <input type="hidden" name="amount" value="{{ $cars_details->minimum_charge }}">
    <div class="form-group row mb-3">
   {{-- <label class="col-3 col-form-label"> Car Name= </label>
   <input type="text" class="form-control" id="car_name" value="{{$cars_details->car_name}}" readonly><br><br> --}}

        {{ Form::label('car_name', 'Car Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('car_name', null, ['class' => 'form-control col-6', 'id' => 'car_name', 'placeholder' => "{$cars_details->car_name}",'readonly']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'car_name'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('start_date', 'Booking Starts At *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('start_date', null, ['class' => 'form-control col-3', 'id' => 'start_date', 'placeholder' => 'Booking Start Date']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'start_date'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('end_date', 'Booking Ends At *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('end_date', null, ['class' => 'form-control col-3', 'id' => 'end_date', 'placeholder' => 'Booking End Date']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'end_date'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('address', 'Pick Up Location *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('address', null, ['class' => 'form-control col-6', 'id' => 'address', 'placeholder' => 'Pick Up Location']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'address'])
        </div>
    </div>
</div>
<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
