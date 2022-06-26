@include('frontend.includes.navbar')
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
                                @forelse(auth()->user()->booking as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="product-thumbnail"><a href="#"><img src="images/product/4.png" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">{{ $booking->car->car_name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ $booking->amount }}</span></td>


                                        <td class="product-remove"><a href="#">X</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Cart is empty</td>
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
