@if($installment_orders)
<!--section start-->
<section class="cart-section order-history section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">product</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">detail</th>
                        <th scope="col">status</th>
                    </tr>
                    </thead>
                    @foreach($installment_orders as $order)
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ url('detail/'.$order->id) }}"><img src="{{ asset(image($order->products_image, 0)) }}" alt="{{ $order->products_name }}" class="img-fluid  "></a>
                        </td>
                        <td><a href="{{ url('detail/'.$order->id) }}">order no: <span class="dark-data">{{ $order->id }}</span> <br>{{ $order->products_name }}</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <h4 class="td-color">@money( $order->price)</h4></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="#" class="icon"><i class="fa fa-times"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h4>@money( $order->price)</h4></td>
                        <td>
                            @if($order->small)
                            <span>Size: S </span>
                            @endif
                            @if($order->medium)
                            <span>Size: M </span>
                            @endif
                            @if($order->large)
                            <span>Size: L</span>
                            @endif
                            @if($order->xtra_large)
                            <span>Size: XL </span>
                            @endif
                            @if($order->unspecified)
                            <span>Size: Unspecified</span>
                            @endif
                            <br>
                            <span>Quntity: {{ $order->quantity }}</span>
                        </td>
                        <td>
                            <div class="responsive-data">
                                <h4 class="price">$63.00</h4>
                                @if($order->small)
                                <div><span>Size: S </span> |  <span>Quntity: {{ $order->small }}</span></div>
                                @endif
                                @if($order->medium)
                               <div> <span>Size: M </span> | <span>Quntity: {{ $order->medium }}</span></div>
                                @endif
                                @if($order->large)
                                <div><span>Size: L</span> | <span>Quntity: {{ $order->large }}</span></div>
                                @endif
                                @if($order->xtra_large)
                                <div> <span>Size: XL </span> | <span>Quntity: {{ $order->xtra_large }}</span></div>
                                @endif
                                @if($order->unspecified)
                               <div> <span>Size: Unspecified</span> | <span>Quntity: {{ $order->unspecified }}</span></div>
                                @endif
                            </div>
                            <span class="dark-data">Delivered </span>( {{ explode(' ', $order->paid_date)[0] }} )
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
<!-- complete payment table start-->
@if(Request::is("installment-orders/complete-payment"))
@if($installment_balance)
<section class="cart-section order-history section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">Total</th>
                        <th scope="col">Initial payment</th>
                        <th scope="col">Installment</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Date Paid</th>
                    </tr>
                    </thead>
                    @foreach($installment_balance as $installment_paid)
                    <tbody>
                    <tr>
                        <td>
                            <li>@money($installment_paid->balance_total_price)</li>
                        </td>
                        <td><a href="#">Initial payment: <span class="dark-data">@money($order->initial_payment)</span> <br>Paid: @money($installment_paid->balance_paid)</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="text" name="quantity" class="form-control input-number" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h4 class="td-color">@money($installment_paid->balance_total_price)</h4></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h4>{{ $order->installment }}</h4></td>
                        <td>
                            <span>Balance: @money($installment_paid->balance_balance)</span>
                            <br>
                            <span>Quntity: 1</span>
                        </td>
                        <td>
                            <div class="responsive-data">
                                <h4 class="price">$63.00</h4>
                                <span>Size: L</span>|<span>Quntity: 1</span>
                            </div>
                            <span class="dark-data">Paid on:</span>( {{ explode(' ', $installment_paid->paid_date)[0] }} )
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endif
@endif
<!-- complete payment table end-->
        <div class="row cart-buttons">
            @if(Request::is("installment-orders/complete-payment"))
            <div class="col-12 pull-right"><a href="{{ url('/complete-payment') }}" class="btn btn-normal btn-sm">Complet payment</a></div>
            @endif
            @if(Request::is("installment-orders/all"))
            <div class="col-12 pull-right"><a href="{{ url('/installment-orders') }}" class="btn btn-normal btn-sm">show less Orders</a></div>
            @endif
            @if(Request::is("installment-orders"))
            <div class="col-12 pull-right"><a href="{{ url('/installment-orders/all') }}" class="btn btn-normal btn-sm">show all orders</a></div>
            @endif
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


