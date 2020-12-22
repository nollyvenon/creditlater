
@if(Session::has('user') && $wishlist_items)
<!--section start-->
<section class="wishlist-section section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">Image</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @foreach($wishlist_items as $wishlist)
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ url('detail/'.$wishlist->id) }}"><img src="{{ asset(image($wishlist->products_image, 0)) }}" alt="product" class="img-fluid  "></a>
                        </td>
                        <td>
                            <a href="{{ url('detail/'.$wishlist->id) }}">cotton shirt</a><br>
                            @if($wishlist->size != 'unspecified')
                            <span>Size: {{ $wishlist->size }}</span>
                            @endif
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <p>in stock</p>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">@money($wishlist->products_price)</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="{{ url('/delete-wishlist-item') }}" id="{{ $wishlist->id }}" data-size="{{ $wishlist->size }}" class="icon mr-1 delete_wishlist_item"><i class="fa fa-close"></i> </a><a href="{{ url('/add-wishlist-item-to-cart') }}" class="cart add_wishlist-item-to-cart" data-size="{{ $wishlist->size }}" id="{{ $wishlist->id }}"><i class="fa fa-shopping-cart"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                        <h2>@money($wishlist->products_price)</h2></td>
                        <td>
                            <p>{{ $wishlist->quantity}}</p>
                        </td>
                        <td><a href="{{ url('/delete-wishlist-item') }}" id="{{ $wishlist->id }}" data-size="{{ $wishlist->size }}" class="icon mr-1 delete_wishlist_item"><i class="fa fa-close"></i> </a><a href="{{ url('/add-wishlist-item-to-cart') }}" class="cart add_wishlist-item-to-cart" data-size="{{ $wishlist->size }}" id="{{ $wishlist->id }}"><i class="fa fa-shopping-cart"></i></a></td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="{{ url('/products') }}" class="btn btn-normal">continue shopping</a></div>
        </div>
    </div>
</section>
@else
<!-- section start -->
<section class="p-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="error-section">
                    <h2>wish list is empty</h2>
                    <a href="{{ url('/products') }}" class="btn btn-normal">continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endif
<!--section end-->




