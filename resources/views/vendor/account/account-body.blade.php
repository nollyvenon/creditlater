
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <h4 class="mb-1 mt-0">Profile</h4>
                        </div>
                    </div>
                    @if($vendor)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mt-3">
                                         @if($vendor->image)
                                         <img src="{{ asset($vendor->image) }}" alt="" class="avatar-lg rounded-circle" />
                                         @else
                                         <img src="{{ asset('vendors/images/vendor_image/1.png') }}" alt="" class="avatar-lg rounded-circle" />
                                         @endif
                                        <h5 class="mt-2 mb-0">{{ $vendor->first_name }}</h5>
                                        <h6 class="text-muted font-weight-normal mt-2 mb-0">User Experience Specialist
                                        </h6>
                                        <h6 class="text-muted font-weight-normal mt-1 mb-4">
                                        {{ $vendor->city }}, {{ $vendor->state }}
                                        </h6>

                                        <button type="button" class="btn btn-primary btn-sm mr-1">Follow</button>
                                        <button type="button" class="btn btn-white btn-sm">Message</button>
                                    </div>

                                    <!-- profile  -->
                                    <div class="mt-5 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">About</h4>
                                        <p class="text-muted mb-4">{{ $vendor->about}}</p>
                                    </div>
                                    <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Contact Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td>{{ $vendor->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone</th>
                                                        <td>{{ $vendor->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Address</th>
                                                        <td>{{ $vendor->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State</th>
                                                        <td>{{ $vendor->state }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Country</th>
                                                        <td>{{ $vendor->country }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        @else
                         <div class="alert-danger p-3 text-center">Login or sign up to view vendor profile</div>
                        @endif
                        </div>
                </div>
