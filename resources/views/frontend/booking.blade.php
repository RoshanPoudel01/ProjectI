
@include('frontend.includes.navbar')
<link href="{{ asset('dist/css/booking.css') }}" rel="stylesheet">
<div class="imgbck">
<img src='{{asset('images/cars/'.$cars_details->logo)}}' class="img-fluid" width='100px'>
</div>
Car Name={{$cars_details->car_name}}   {{$cars_details->id}}

{!! Form::open(['route' => 'car.book', 'method' => 'post','enctype'=>'multipart/form-data']) !!}
<div class="card-body">
    <input type="hidden" name="car_id" value="{{ $cars_details->id }}">
    <input type="hidden" name="amount" value="{{ $cars_details->minimum_charge }}">

    <div class="form-group row mb-3">
        {{ Form::label('car_name', 'Car Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('car_name', null, ['class' => 'form-control', 'id' => 'car_name', 'placeholder' => 'Car Name']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'car_name'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('start_date', 'Booking Starts At *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('start_date', null, ['class' => 'form-control', 'id' => 'start_date', 'placeholder' => 'Booking Start Date']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'start_date'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('end_date', 'Booking Ends At *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::date('end_date', null, ['class' => 'form-control', 'id' => 'end_date', 'placeholder' => 'Booking End Date']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'end_date'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('address', 'Pick Up Location *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Pick Up Location']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'address'])
        </div>
    </div>
</div>
<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
