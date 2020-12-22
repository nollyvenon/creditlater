@if($installment_orders)
<!--section start-->

<section class="">
    <div class="">
        <div class="row">
            <div class="col-sm-12 p-5 table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">initial payment</th>
                        <th scope="col">Total price</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @foreach($installment_orders as $order)
                    <tbody>
                        <tr>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>{{ $order->initial_payment }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td><span class="text-warning">Not completed</span></td>
                            <td>{{ date('d M Y', strtotime($order->paid_date)) }}</td>
                            <td><a href="{{ url('/complete-payment/'.$order->reference) }}" style="color: #717171;"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
<!--section end-->
@else
<section class="p-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="error-section">
                    <h2>You have no orders Yet</h2>
                    <a href="{{ url('/products') }}" class="btn btn-normal">continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endif


