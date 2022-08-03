@extends('admin.layouts.app',['panel' => 'Booking','page' => 'List'])

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Bookings')

@section('content')
    <div class="row">
        <div class="col-12">

            @include('admin.includes.flash_message')

            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Bookings</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Booked By</th>
                                <th>Car Name</th>
                                <th>Car Brand</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data['rows'] as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->createdBy->name }}</td>
                                    <td>{{ $row->car->car_name }}</td>
                                    <td>{{ $row->car->car_brand->brand }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td style="display:flex">
                                        {{-- <a class="btn btn-primary btn-sm mr-2"
                                            href="{{ route('car.show', ['id' => $row->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm mr-2"
                                            href="{{ route('car.edit', ['id' => $row->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <form action="{{ route('car.delete', ['id' => $row->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm delete-confirm" type="button">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                     </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div> --}}
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Fixed Header Table</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <tr>
                            <th>Booking ID</th>
                            <th>Booked By</th>
                            <th>Car Name</th>
                            <th>Car Brand</th>
                            <th>Start Date</th>
                            <th>End Date</th>

                            <th>Status</th>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['rows'] as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->createdBy->name }}</td>
                                    <td>{{ $row->car->car_name }}</td>
                                    <td>{{ $row->car->car_brand->brand }}</td>
                                    <td>{{ date('Y-m-d', strtotime($row->start_date))}}</td>
                                    <td>{{ date('Y-m-d', strtotime($row->end_date))}}</td>

                                    <td>{{ $row->status }}</td>

                                </tr>
                            @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.js') }}"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable();
        });

        $(".delete-confirm").click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("form").submit();
            }
            })
        });
    </script>
@endsection
