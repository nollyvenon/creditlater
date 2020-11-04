
<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">Edit Password</h3>
                    @if($errors = $errors->all())
                    @foreach($errors as $error)
                        <div class="alert-danger p-2 mb-1 text-center">{{ $error}}</div>
                    @endforeach
                    @endif
                    <form action="{{ url('/change-password/'.Session::get('user')['id'] ) }}" method="post" class="theme-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Comfirm password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm assword" value="" required>
                        </div>
                        <button  type="submit" name="value" class="btn btn-normal">Edit</button>
                        @csrf
                    </form>
                    <!-- <p class="mt-3"></p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
