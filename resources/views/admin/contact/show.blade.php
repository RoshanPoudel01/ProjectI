@extends('admin.layouts.app',['panel' => 'Contact','page' => 'Show'])

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ $data['row']->FullName }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data['row']->Email }}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{ $data['row']->Message }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['row']->created_at }}</td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
    </div>
@endsection
