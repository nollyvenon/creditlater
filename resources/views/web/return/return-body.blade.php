
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Return a Product</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">Return product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">Return Form</h3>
                    @if(Session::has('success'))
                    <div class="alert-success p-3 mb-3 text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert-danger p-3 mb-3 text-center">{{ Session::get('error') }}</div>
                    @endif
                    <form action="{{ url('return-product') }}" method="post" class="theme-form" enctype="multipart/form-data">
                        <div class="form-group">
                            @if($errors->first('email'))
                            <div class="text-danger verification-alert checkout_alert_0">{{ $errors->first('email') }}</div>
                            @endif
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            @if($errors->first('warranty_number'))
                            <div class="text-danger verification-alert checkout_alert_1">{{ $errors->first('warranty_number') }}</div>
                            @endif
                            <label for="warranty">Warranty Number</label>
                            <input type="text"  min="0" class="form-control" name="warranty_number" placeholder="Warranty number" required="">
                        </div>
                        <div class="form-group">
                            @if($errors->first('warranty_slip'))
                            <div class="text-danger verification-alert checkout_alert_1">{{ $errors->first('warranty_slip') }}</div>
                            @endif
                            <label for="warranty_slip">Warranty Slip</label>
                            <input type="file" class="form-control" name="warranty_slip">
                        </div>
                        <div class="form-group">
                            <button type="" class="btn btn-normal">Return Now</button>                         
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
