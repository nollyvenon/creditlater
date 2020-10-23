<!-- Add to cart bar -->
<div id="cart_side" class=" add_to_cart bottom ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        @if( cart(1) && count(cart(1)))
        <div class="cart_media">
            <ul class="cart_product">
                @php($total_price = 0)
                @foreach(cart(1) as $cart_items)
                @php($total_price += $cart_items->total )
                <li>
                    <div class="media">
                        <a href="{{ url('detail/'.$cart_items->product_id) }}">
                            <img alt="" class="mr-3" src="{{ asset(image($cart_items->products_image, 0)) }}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>{{ $cart_items->products_name }}</h4>
                            </a>
                            <h4>
                                <span>{{ $cart_items->quantity }} x @money($cart_items->products_price)</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endforeach
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>subtotal : <span>@money($total_price)</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ url('/cart') }}" class="btn btn-normal btn-xs view-cart">view cart</a>
                        <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
        @else
            <div class="cart-error text-center">
                <div class="alert-danger p-3">There are no items in cart </div>
                <br>
                <a href="{{ url('/products') }}" class="btn btn-normal btn-xs view-cart">Continue Shopping</a>
            </div>
        @endif
    </div>
</div>
<!-- Add to cart bar end-->