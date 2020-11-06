

@if($verification)
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
                            <li><a href="{{ url('/account') }}">My Account</a></li>
                            <li><a href="{{ url('/order-history') }}">My Orders</a></li>
                            <li><a href="{{ url('/wishlist') }}">My Wishlist</a></li>
                            <li><a href="{{ url('/cart') }}">My Cart</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li class="active"><a href="{{ url('/verification') }}">Verification</a></li>
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
                        <!-- <div class="text-right"><a href="#" class="registration-form-anchor">Edit </a></div> -->
                        <div class="box-account box-info">
                            <div class="box-head"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Buyer Information</h3></div>
                                        <div class="box-content">
                                            <h6>First Name: {{ $verification->first_name }}</h6>
                                            <h6>Last Name: {{  $verification->last_name }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3><a href="{{ url('/registration-form/'.$verification->user_id.'/edit') }}">Edit</a></div>
                                        <div class="box-content">
                                            <h6>Phone: {{  $verification->phone }}</h6>
                                            <h6>Nation ID number: {{ $verification->national_id }}</h6>
                                            <h6>Home Address: {{ $verification->address }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Personal Information</h3><a href="{{ url('/registration-form/'.$verification->user_id.'/edit') }}">Edit</a></div>
                                        <div class="box-content">
                                            <h6>Date of birth: {{ $verification->date_of_birth }}</h6>
                                            <h6>Marital status: {{  $verification->status }}</h6>
                                            <h6>Occupation: {{ $verification->occupation }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Guarantor Information</h3></div>
                                        <div class="box-content">
                                            <h6>First Name: {{ $verification->guarantor_first_name }}</h6>
                                            <h6>Last Name: {{  $verification->guarantor_last_name }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3><a href="{{ url('/registration-form/'.$verification->user_id.'/edit') }}">Edit</a></div>
                                        <div class="box-content">
                                            <h6>Phone: {{  $verification->guarantor_phone }}</h6>
                                            <h6>Nation ID number: {{ $verification->guarantor_national_id }}</h6>
                                            <h6>Home Address: {{ $verification->guarantor_address }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Personal Information</h3><a href="{{ url('/registration-form/'.$verification->user_id.'/edit') }}">Edit</a></div>
                                        <div class="box-content">
                                            <h6>Date of birth: {{ $verification->guarantor_date_of_birth }}</h6>
                                            <h6>Marital status: {{  $verification->guarantor_status }}</h6>
                                            <h6>Occupation: {{ $verification->guarantor_relationship }}</h6>
                                            <h6>Relationship with buyer: {{ $verification->guarantor_occupation }}</h6>
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
@else
   @include("web.verification.verification-registration")
@endif