


<!--section start-->
<section class="cart-section section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">action</th>
                        <th scope="col">total</th>
                    </tr>
                    </thead>
                    @php($total_price = 0)
                    @foreach($cart as $cart_items)
                    @php($total_price += $cart_items->total )
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ url('detail/'.$cart_items->product_id) }}"><img src="{{ asset(image($cart_items->products_image, 0)) }}" alt="cart"  class=" "></a>
                        </td>
                        <td><a href="{{ url('detail/'.$cart_items->product_id) }}">{{ $cart_items->products_name }}</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="text" name="quantity" class="form-control input-number" value="{{ $cart_items->quantity }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">@money($cart_items->products_price)</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="#" class="icon"><i class="fa fa-times"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h2>@money($cart_items->products_price)</h2></td>
                        <td>
                            <div class="qty-box">
                                <div class="input-group">
                                    <input type="number" name="quantity" class="form-control input-number" value="{{ $cart_items->quantity }}">
                                </div>
                            </div>
                        </td>
                        <td><a href="#" class="icon"><i class="fa fa-times"></i></a></td>
                        <td>
                            <h2 class="td-color">@money($cart_items->total)</h2></td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>total price :</td>
                        <td>
                            <h2>@money($total_price)</h2></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ url('/products') }}" class="btn btn-normal">continue shopping</a> <a href="#" class="btn btn-normal ml-3">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->

