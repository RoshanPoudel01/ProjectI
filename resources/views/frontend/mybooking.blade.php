@include('frontend.includes.navbar')
 <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>


 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@if (session()->has('success_message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    {{ session()->get('success_message') }}
</div>
@endif
    <div class="row">
        <div class="col-12">
         <div class="card">
            {{-- @include('frontend.includes.flashmessage') --}}

                <div class="card-body">

            <table id="dataTable" class="table table-striped">

                        <thead>
                                 <tr>
                                    <th>S.N.</th>
                                    <th>Image</th>
                                    <th>Car Name</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>

                        </thead>
                        <tbody>
                            @foreach ($data['books'] as $booking )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{asset('images/cars/'.$booking->car->logo)}}" alt="product img" /></td>
                                    <td>{{ $booking->car->car_name }}</td>
                                    <td>{{ $booking->amount }}</td>

                                    <td style="display:flex">
                                        <button class="btn" id='{{$booking->id}}' style="background-color: #5C2D91; cursor: pointer; color: #fff;">Pay with Khalti</button>

                                        <form action="{{ route('booking.cancel', ['id' => $booking->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm cancel-confirm" type="button">

                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <script>
                                    var config = {
                                        // replace the publicKey with yours
                                        "publicKey": "{{ config('app.khalti_public_key') }}",
                                        "productIdentity": '{{$booking->id}}',
                                        "productName": '{{ $booking->car->car_name }}',
                                        "productUrl": "http://carseasy.com/",
                                        "paymentPreference": [
                                            "KHALTI",

                                            ],
                                        "eventHandler": {
                                            onSuccess (payload) {
                                               $.ajax({
                                                type : "POST",
                                                url : "{{ route('khalti.verifypayment') }}",
                                                data: {
                                                    'amount' :{{ $booking->amount }},
                                                    'token' : payload.token,
                                                    '_token' : "{{ csrf_token() }}",

                                                },
                                                success: function(res){
                                                    $.ajax({
                                                        type: "POST",
                                                        url : "{{ route('khalti.storepayment') }}",
                                                        data:{
                                                            'response':res,
                                                            '_token' : "{{ csrf_token() }}",

                                                        },
                                                            success: function(res){
                                                            alert('Payment Successful');
                                                            console.log('success');
                                                        }
                                                    })
                                                    console.log(res)
                                                }
                                            });
                                                console.log(payload);
                                            },
                                            onError (error) {
                                                console.log(error);
                                            },
                                            onClose () {
                                                console.log('widget is closing');
                                            }
                                        }
                                    };

                                    var checkout = new KhaltiCheckout(config);
                                    var btn = document.getElementById("{{$booking->id}}");
                                    btn.onclick = function () {
                                        // minimum transaction amount must be 10, i.e 1000 in paisa.
                                        checkout.show({amount:{{ $booking->amount }}});
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.js') }}"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable();
        });

        $(".cancel-confirm").click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("form").submit();
            }
            })
        });
    </script>

