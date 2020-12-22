<div style="margin-top: 70px;">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Register</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-10" style="margin-left: 10%">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('error'))
                                <div class="alert-danger p-1 text-center mb-3">{{ Session::get('error')}}</div>
                                @endif
                                <h4 class="header-title mt-0 text-center">Register vendor </h4><br><br>
                                
                                <form action="{{ url('/vendor/register') }}" method="post" class="form-horizontal" >
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('first_name'))
                                                    <div class="text-danger">{{ $errors->first('first_name')}}</div>
                                                    @endif
                                                    <label for="first_name">First name</label>
                                                    <input type="text"  name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('last_name'))
                                                    <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                                    @endif
                                                    <label for="category_name">Last name</label>
                                                    <input type="text" class="form-control" name="last_name" value="" placeholder="Enter last name">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('email'))
                                                    <div class="text-danger">{{ $errors->first('email')}}</div>
                                                    @endif
                                                    <label for="category_round">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="" placeholder="Email">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('phone'))
                                                    <div class="text-danger">{{ $errors->first('phone')}}</div>
                                                    @endif
                                                    <label for="phone">Phone</label>
                                                    <input type="text"  name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    @if($errors->first('address'))
                                                    <div class="text-danger">{{ $errors->first('address')}}</div>
                                                    @endif
                                                    <label for="address">Address</label>
                                                    <input type="text"  name="address" class="form-control" value="{{ old('address') }}" placeholder="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    @if($errors->first('city'))
                                                    <div class="text-danger">{{ $errors->first('city')}}</div>
                                                    @endif
                                                    <label for="city">City</label>
                                                    <input type="text"  name="city" class="form-control" value="{{ old('city') }}" placeholder="city">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    @if($errors->first('state'))
                                                    <div class="text-danger">{{ $errors->first('state')}}</div>
                                                    @endif
                                                    <label for="state">State</label>
                                                    <input type="text"  name="state" class="form-control" value="{{ old('state') }}" placeholder="State">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    @if($errors->first('country'))
                                                    <div class="text-danger">{{ $errors->first('country')}}</div>
                                                    @endif
                                                    <label for="country">Country</label>
                                                    <input type="text"  name="country" class="form-control" value="{{ old('country') }}" placeholder="State">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    @if($errors->first('about'))
                                                    <div class="text-danger">{{ $errors->first('about')}}</div>
                                                    @endif
                                                    <label for="about">About</label>
                                                    <textarea name="about" id="" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('password'))
                                                    <div class="text-danger">{{ $errors->first('password')}}</div>
                                                    @endif
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('confirm_password'))
                                                    <div class="text-danger">{{ $errors->first('confirm_password')}}</div>
                                                    @endif
                                                    <label for="confirm_password">Confirm password</label>
                                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="">
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Register</button>
                                                </div>
                                             </div>
                                            @csrf
                                        </div>
                                </form>
                                <p>You have an account?  <a href="{{ url('/vendor/login') }}">login</a></p>
    
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
        </div>
    </div>