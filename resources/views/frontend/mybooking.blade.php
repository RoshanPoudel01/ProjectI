@include('frontend.includes.navbar')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@if (session()->has('success_message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    {{ session()->get('success_message') }}
</div>
@endif
<div class="cart-main-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Car Name</th>

                                    <th class="product-price">Total Amount</th>
                                    <th class="product-remove">Cancel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['books'] as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="product-thumbnail"><a href="#"><img src="{{asset('images/cars/'.$booking->car->logo)}}" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">{{ $booking->car->car_name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ $booking->amount }}</span></td>
                                       <td> <form action="{{ route('booking.delete', ['id' => $booking->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm delete-confirm" type="button" >
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6">No Bookings Right Now Create a booking to see more</td>
                                    </tr>
                                    @endforelse

                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

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
