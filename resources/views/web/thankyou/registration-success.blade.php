

@section("content")
    <!-- thank-you section start -->
    @if(Session::has('success'))
    <section class="section-big-py-space light-layout" style="height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top: 150px;">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>thank you {{ Session::get('user')['first_name'] }}</h2>
                        <p>{{ Session::get('success') }}</p>
                        <p><a href="{{ url('/account') }}" class="btn btn-normal">Back to Account</a></p>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Section ends -->
@endsection