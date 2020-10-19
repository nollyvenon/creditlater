<!-- middle navigation -->
<div class="layout-header1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="menu-left">
                        <div class="sm-nav-block">
                            <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                            <ul class="nav-slide">
                                <li>
                                    <div class="nav-sm-back">
                                        back <i class="fa fa-angle-right pl-2"></i>
                                    </div>
                                </li>
                                <li><a href="#">western ware</a></li>
                                <li><a href="#">TV, Appliances</a></li>
                                <li><a href="#">Pets Products</a></li>
                                <li><a href="#">Car, Motorbike</a></li>
                                <li><a href="#">Industrial Products</a></li>
                                <li><a href="#">Beauty, Health Products</a></li>
                                <li><a href="#">Grocery Products </a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Bags, Luggage</a></li>
                                <li><a href="#">Movies, Music </a></li>
                                <li><a href="#">Video Games</a></li>
                                <li><a href="#">Toys, Baby Products</a></li>
                                <li class="mor-slide-open">
                                    <ul>
                                        <li><a href="#">Bags, Luggage</a></li>
                                        <li><a href="#">Movies, Music </a></li>
                                        <li><a href="#">Video Games</a></li>
                                        <li><a href="#">Toys, Baby Products</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="mor-slide-click">
                                        more categories
                                        <i class="fa fa-angle-down pro-down" ></i>
                                        <i class="fa fa-angle-up pro-up" ></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="brand-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{asset('web/images/layout-1/logo/logo.png') }}" class="img-fluid  " alt="logo-header">
                            </a>
                        </div>
                    </div>
                    <div class="menu-right">
                        <div class="toggle-block">
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                    </li>
                                    <!--HOME-->
                                    <li><a href="{{ url('/') }}">Home</a> </li>
                                    <li><a href="#">Products</a> </li>
                                    <li><a href="#">Helps</a> </li>
                                    <!--HOME-END-->

                                    <!--SHOP-->
                                    
                                </ul>
                            </nav>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="mobile-user onhover-dropdown" onclick="openAccount()"><a href="#"><i class="fa fa-user"></i></a>
                                    </li>
                                    <li class="mobile-wishlist" onclick="openWishlist()">
                                        <a href="#">
                                            <i class="fa fa-heart"></i>
                                            <div class="cart-item"><div>0 item<span>wishlist</span></div></div></a></li>
                                    <li class="mobile-search"><a href="#"><i class="fa fa-search"></i></a>
                                        <div class ="search-overlay">
                                            <div>
                                                <span class="close-mobile-search">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group"><input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product"></div>
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></li>
                                    <li class="mobile-setting mobile-setting-hover" onclick="openSetting()"><a href="#"><i class="fa fa-settings"></i></a>
                                    </li>
                                </ul>
                                <div class="cart-block mobile-cart cart-hover-div" onclick="openCart()">
                                    <a href="#"><span class="cart-product">0</span><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- middle navigation end -->