
<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                    <div class="block-content ">
                        <ul>
                            <li class="active"><a href="{{ url('/account') }}">My Account</a></li>
                            <li><a href="{{ url('/wishlist') }}">My Wishlist</a></li>
                            <li><a href="{{ url('/cart') }}">My Cart</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li><a href="{{ url('/order-history') }}">My Orders</a></li>
                            <li><a href="{{ url('/verification') }}">Verification</a></li>
                            <li><a href="{{ url('/installment-orders') }}">Installment Orders</a></li>
                            <li><a href="{{ url('/change-password') }}">Change Password</a></li>
                            <li class="last"><a href="{{ url('/logout') }}">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                        @if(Session::has('success'))
                        <div class="alert-success p-3 text-center mb-3">{{ Session::get('success') }}</div>
                        @endif
                       
                            <h2>My Dashboard</h2></div>
                        <div class="welcome-msg">
                            <p>Hello,  {{ Session::get('user')['first_name'] }} !</p>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of 
                                your recent account activity and update your account information. Select a 
                                link below to view or edit information.<br>
                                click on<a href="{{ url('/verification') }}" style="color: orangered;"> verification</a> link to register for installments payment.    
                            </p>
                        </div>
                        <div class="box">
                            <div class="box-title">
                                <h3>Complete Transactions</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>Outstanding transactions</h6><address>You have a pending transaction...<br><a href="{{ url('installment-orders/complete-payment') }}">Complete transaction</a></address>
                                </div>
                            </div>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account Information</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3><a href="{{ url('/edit-info') }}">Edit</a></div>
                                        <div class="box-content">
                                            <h6> {{ Session::get('user')['last_name'] }} </h6>
                                            <h6> {{ Session::get('user')['email'] }} </h6>
                                            <h6><a href="{{ url('change-password') }}">Change Password</a></h6></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Newsletters</h3><a href="#">Edit</a></div>
                                        <div class="box-content">
                                            <p>You are currently not subscribed to any newsletter.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3><a href="#">Manage Addresses</a></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6>Default Billing Address</h6><address>You have not set a default billing address.<br><a href="#">Edit Address</a></address></div>
                                        <div class="col-sm-6">
                                            <h6>Default Shipping Address</h6><address>You have not set a default shipping address.<br><a href="#">Edit Address</a></address></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->