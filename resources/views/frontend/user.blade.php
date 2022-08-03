@include('frontend.includes.navbar')


<title> My Profile </title>
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
    <div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-9">
            @include('frontend.includes.flashmessage')

        <div class="card">
        <div class="card-header">
            <a class="btn btn-edit btn-md float-right" href="{{ route('myprofile.edit',['id' => $data['row']->id]) }}">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        </div>
                <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover">
                <tr>
                    <th style="padding:20px 10px">Profile Picture</th>

                    <td> <img src="{{ asset('images/'. $data['row']->images )}}" class="img-circle elevation-2" alt="User Image" style="width: 100px">

                    </td>
                </tr>
                <th style="padding:20px 10px">Name</th>
                <td>
                   {{ $data['row']->name }}
                    </td>
                </tr>
                <tr>
                <th style="padding:20px 10px">Email</th>

                <td> {{ $data['row']->email }}
                </td>
                </tr>
                <th style="padding:20px 10px">Phone</th>

                <td>{{ $data['row']->phone }}
                </td>
                </tr>
            <tr>
                <th style="padding:20px 10px"">Address</th>

                <td> {{ $data['row']->address }}
                </td>
                </tr>

    </table>

    </div>
    </div>
</div>
    </div>
</div>

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
