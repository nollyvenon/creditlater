
<!--footer start-->
<footer>
    <div class="app-link-block">
        <div class="container">
            <div class="row">
                <div class="app-link-bloc-contain">
                    <div class="app-item-group">
                        <div class="app-item">
                            <img src="{{ asset('web/images/layout-1/app/1.png') }}" class="img-fluid  " alt="app-banner">
                        </div>
                        <div class="app-item">
                            <img src="{{ asset('web/images/layout-1/app/2.png') }}" class="img-fluid  " alt="app-banner">
                        </div>
                    </div>
                    <div class="app-item-group ">
                        <div class="sosiyal-block" >
                            <h6>follow us</h6>
                            <ul class="sosiyal">
                                <li><a href="#"><i class="fa fa-facebook" ></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" ></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" ></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" ></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" ></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-1 section-mb-space">
        <div class="container">
            <div class="logo-contain">
                <div class="row">
                    <div class="col-lg-3 col-md-12 ">
                        <div class="logo-block">
                            <a href="{{ url('/') }}"><img src="{{ asset(settings()->logo) }}" class="img-fluid  " alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 pr-lg-0">
                        <div class="logo-detail">
                            <p>{{ settings()->about }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-1 section-mb-space">
        <div class="container">
            <div class="footer-box">
                <div class="row">
                    <div class="col-md-8 pr-md-0">
                        <div class="footer-link">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="footer-sub-box account">
                                        <div class="footer-title">
                                            <h5>my account</h5>
                                        </div>
                                        <div class="footer-contant">
                                            <ul>
                                                <li><a href="{{ url('/account') }}">Account</a></li>
                                                <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                                <li><a href="{{ url('/order-history') }}">Orders</a></li>
                                                <li><a href="{{ url('/return-product') }}">Return products</a></li>
                                                <li><a href="{{ url('/verification') }}">Verification</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="footer-sub-box">
                                        <div class="footer-title">
                                            <h5>quick link</h5>
                                        </div>
                                        <div class="footer-contant">
                                            <ul>
                                                <li><a href="#">store location</a></li>
                                                <li><a href="{{ url('/account') }}"> my account</a></li>
                                                <li><a href="{{ url('/order-history') }}"> orders tracking</a></li>
                                                <li><a href="#">FAQ </a></li>
                                                <li><a href="{{ url('products/new-products') }}">new products</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  pl-md-0">
                        <div class="footer-sub-box footer-contant-box">
                            <div>
                                <div class="footer-title">
                                    <h5>contact us</h5>
                                </div>
                                <div class="footer-contant">
                                    <ul class="contact-list">
                                        <li><i class="fa fa-map-marker"></i>32 Akinremi street, Ikeja, Lagos. <br></li>
                                        <li><i class="fa fa-phone"></i>call us: <span>08027257478, 08054511357</span></li>
                                        <li><i class="fa fa-envelope-o"></i><span>email: onyxdatasystems@gmail.com</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-1 section-mb-space">
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-8 col-sm-12">
                        <div class="footer-end">
                            <p>{{ settings()->copy_rights }}
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-4 col-sm-12">
                        <div class="payment-card-bottom">
                        @if(payment_method())
                            <ul>
                                @foreach(payment_method() as $method)
                                <li><a href="{{ url($method->payment_link) }}"><img src="{{ asset($method->payment_method_image) }}" class="img-fluid" alt="pay"></a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->



