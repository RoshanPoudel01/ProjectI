@extends('admin.layouts.app',['panel' => 'Car','page' => 'Show'])

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ $data['row']->car_name }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $data['row']->plate_no }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td> <img src="{{asset('images/cars/'.$data['row']->logo)}}" height="130px" width="200px" alt=""></td>
                </tr>
                <tr>
                    <th>Seats</th>
                    <td>{{ $data['row']->seat_capacity }}</td>
                </tr>
                <tr>
                    <th>Fuel Type</th>
                    <td>{{ $data['row']->fuel_type }}</td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td>{{ $data['row']->stock }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['row']->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $data['row']->updated_at }}</td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
    </div>
@endsection
