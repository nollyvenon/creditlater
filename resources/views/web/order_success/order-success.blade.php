
<!-- thank-you section start -->
<section class="section-big-py-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>thank you</h2>
                    <p>Payment is successfully processsed and your order is on the way</p>
                    <p>Transaction ID: {{ $order[0]->reference }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- order-detail section start -->
<section class="section-big-py-space mt--5 bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    <h3>your order details</h3>
                    @php($subTotal = 0)
                    @foreach($order as $orders)
                    @php($subTotal += $orders->total)
                    <div class="row product-order-detail">
                        <div class="col-3"><img src="{{ asset(image($orders->products_image, 0)) }}" alt="" class="img-fluid "></div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>product name</h4>
                                <h5>{{ $orders->products_name}}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>quantity</h4>
                                <h5>{{ $orders->quantity }}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>price</h4>
                                <h5>@money($orders->total)</h5></div>
                        </div>
                    </div>
                    @endforeach
                    <div class="total-sec">
                        <ul>
                            <li>subtotal <span>@money($subTotal)</span></li>
                            <li>shipping <span>$12.00</span></li>
                            <li>tax(GST) <span>$10.00</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>$77.00</span></h3></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>summery</h4>
                        <ul class="order-detail">
                            <li>order ID: {{ $order[0]->reference }}</li>
                            <li>Order Date: {{ $order[0]->paid_date }}</li>
                            <li>Order Total: $907.28</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>shipping type</h4>
                        <ul class="order-detail">
                            <li>{{ $order[0]->shipping }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>shipping address</h4>
                        <ul class="order-detail">
                            <li>{{ $order[0]->address }}</li>
                            <li>Contact No. {{ $order[0]->phone }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>payment method</h4>
                        <p>Pay on Delivery (Cash/Card). Cash on delivery (COD) availabel. Card/Net banking acceptance subject to device availability.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="text-right"> <a href="{{ url('/') }}" class="btn-normal btn">Exit</a></div>
                        <div class="delivery-sec">
                            <h3>expected date of delivery</h3>
                            <h2>october 22, 2018</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
