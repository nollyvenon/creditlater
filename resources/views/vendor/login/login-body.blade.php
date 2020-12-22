<div class="admin-login-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Login</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('error'))
                                <div class="alert-danger p-1 text-center mb-3">{{ Session::get('error')}}</div>
                                @endif
                                <h4 class="header-title mt-0 text-center">vendor login</h4><br><br>
                                
                                <form action="{{ url('/vendor/login') }}" method="post" class="form-horizontal" >
                                    <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    @if($errors->first('email'))
                                                    <div class="text-danger">{{ $errors->first('email')}}</div>
                                                    @endif
                                                    <label for="category_round">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    @if($errors->first('password'))
                                                    <div class="text-danger">{{ $errors->first('password')}}</div>
                                                    @endif
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </div>
                                             </div>
                                            @csrf
                                        </div>
                                </form>
                                <p>Not yet an vendor <a href="{{ url('/vendor/register') }}">register</a></p>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
        </div>
    </div>