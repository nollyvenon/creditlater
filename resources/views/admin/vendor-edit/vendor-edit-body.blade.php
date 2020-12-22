 <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">vendor</a></li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">{{ ucfirst($vendor->first_name) }} {{ $vendor->last_name }}</h4>
                            @if(Session::has('success'))
                            <div class="alert-success p-3">{{ Session::get('success')}}</div>
                            @endif
                        </div>
                    </div>


                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- cta -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mt-3 mt-sm-0">
                                                    <form action="{{ url('/admin/vendor-edit/'.$vendor->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                                        <div class="row">
                                                               <div class="col-lg-12">
                                                                    @if($vendor->image)
                                                                    <div class="logo">
                                                                        <img src="{{ asset($vendor->image) }}" alt="{{ $vendor->first_name }}" style="width: 200px;">
                                                                    </div> 
                                                                    @else
                                                                    <div class="logo">
                                                                        <img src="{{ asset('vendors/images/vendor_image/1.png') }}" alt="image" style="width: 200px;">
                                                                    </div> 
                                                                    @endif
                                                                    <div class="form-group">
                                                                        @if(Session::has('image_error'))
                                                                        <div class="text-danger">{{ Session::get('image_error') }}</div>
                                                                        @endif
                                                                        <label for="category_round">Profile image:</label>
                                                                        <input type="file" class="form-control" name="image">
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('first_name'))
                                                                        <div class="text-danger">{{ $errors->first('first_name')}}</div>
                                                                        @endif
                                                                        <label for="category_round">First name:</label>
                                                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $vendor->first_name ?? old('first_name') }}" placeholder="First name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('last_name'))
                                                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Last name:</label>
                                                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $vendor->last_name ?? old('last_name') }}" placeholder="Last name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('email'))
                                                                        <div class="text-danger">{{ $errors->first('email')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Email:</label>
                                                                        <input type="email" class="form-control" name="email" id="email" value="{{ $vendor->email ?? old('email') }}" placeholder="Enter email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('phone'))
                                                                        <div class="text-danger">{{ $errors->first('phone')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Phone:</label>
                                                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $vendor->phone ?? old('phone') }}" placeholder="Enter phone">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('address'))
                                                                        <div class="text-danger">{{ $errors->first('address')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Address:</label>
                                                                        <textarea class="form-control" name="address" id="address"cols="30" rows="5">{{ $vendor->address ?? old('address') }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('city'))
                                                                        <div class="text-danger">{{ $errors->first('city')}}</div>
                                                                        @endif
                                                                        <label for="category_round">City:</label>
                                                                        <input type="text" class="form-control" name="city" id="city" value="{{ $vendor->city ?? old('city') }}" placeholder="Enter city">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('state'))
                                                                        <div class="text-danger">{{ $errors->first('state')}}</div>
                                                                        @endif
                                                                        <label for="category_round">State:</label>
                                                                        <input type="text" class="form-control" name="state" id="state" value="{{ $vendor->state ?? old('state') }}" placeholder="Enter state">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('country'))
                                                                        <div class="text-danger">{{ $errors->first('country')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Country:</label>
                                                                        <input type="text" class="form-control" name="country" id="country" value="{{ $vendor->country ?? old('country') }}" placeholder="Enter country">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('about'))
                                                                        <div class="text-danger">{{ $errors->first('about')}}</div>
                                                                        @endif
                                                                        <label for="category_round">About:</label>
                                                                        <textarea class="form-control" name="about" id="about"cols="30" rows="5">{{ $vendor->about ?? old('about') }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                                @csrf
                                                            </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-5">
                            <!-- cart header start -->
                            <div class="card p-3">
                                <h4 class="mb-1 mt-0">Products posted</h4>
                                @if(count($vendor_products) != '')
                                <div class="row">
                                    @foreach($vendor_products as $vendor_product)
                                    <div class="col-lg-6 col-md-3">
                                        <img src="{{ asset(explode(',', $vendor_product->products_image)[0]) }}" alt="" style="width: 50px;">
    
                                        <a href="avascript:void(0);" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                            <i class='fa fa-eye'></i>
                                        </a>
                                         <!-- dropdown start -->
                                        <div class="dropdown-menu dropdown-menu-right payment-dropdown-container p-3" style="z-index: 1000;">
                                            <h6 class="mb-1 mt-0"><b>Name: </b>{{ $vendor_product->products_name }}</h6>
                                            <span><b>Quantity:</b> {{ $vendor_product->products_quantity }}</span><br>
                                            <span><b>Sold:</b> {{ $vendor_product->quantity_sold }}</span><br>
                                            <span><b>Price slashed:</b> @money($vendor_product->products_price_slash) </span><br>
                                            <span class="text-success"><b>Price:</b> @money($vendor_product->products_price) </span><br>
                                        </div> <!-- end dropdown menu-->
                                        <div class="detail">{{ $vendor_product->products_name }} </div>
                                    </div>
                                    @endforeach
                                </div>
                                 @else 
                                    <div class="alert-danger text-center p-3">There are available products</div>
                                @endif
                            </div>
                            <!-- card header end -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="create-margin" style="margin-bottom: 120px;"></div>