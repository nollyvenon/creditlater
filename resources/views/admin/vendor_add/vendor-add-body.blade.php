 <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <form action="{{ url('/admin/vendor-add') }}" method="post" class="form-horizontal" >
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">Add vendor</a></li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Add vendor</h4>
                            @if(Session::has('success'))
                            <div class="alert-success p-3">{{ Session::get('success')}}</div>
                            @endif
                        </div>
                    </div>


                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- cta -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mt-3 mt-sm-0">
                                                   
                                                        <div class="row">
                                                                <div class="col-lg-12 col-md-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('first_name'))
                                                                        <div class="text-danger">{{ $errors->first('first_name')}}</div>
                                                                        @endif
                                                                        <label for="category_round">First name:</label>
                                                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('last_name'))
                                                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Last name:</label>
                                                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('email'))
                                                                        <div class="text-danger">{{ $errors->first('email')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Email:</label>
                                                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('phone'))
                                                                        <div class="text-danger">{{ $errors->first('phone')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Phone:</label>
                                                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter phone">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-6">
                                                                    <div class="form-group">
                                                                        @if($errors->first('address'))
                                                                        <div class="text-danger">{{ $errors->first('address')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Address:</label>
                                                                        <textarea class="form-control" name="address" id="address"cols="30" rows="5">{{ old('address') }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <!-- cart header start -->
                            <div class="card p-3">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                @if($errors->first('city'))
                                                <div class="text-danger">{{ $errors->first('city')}}</div>
                                                @endif
                                                <label for="category_round">City:</label>
                                                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="Enter city">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                @if($errors->first('state'))
                                                <div class="text-danger">{{ $errors->first('state')}}</div>
                                                @endif
                                                <label for="category_round">State:</label>
                                                <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}" placeholder="Enter state">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                @if($errors->first('country'))
                                                <div class="text-danger">{{ $errors->first('country')}}</div>
                                                @endif
                                                <label for="category_round">Country:</label>
                                                <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}" placeholder="Enter country">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                @if($errors->first('password'))
                                                <div class="text-danger">{{ $errors->first('password')}}</div>
                                                @endif
                                                <label for="category_round">Password:</label>
                                                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Enter state">
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        @csrf
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>


            <div class="create-margin" style="margin-bottom: 120px;"></div>