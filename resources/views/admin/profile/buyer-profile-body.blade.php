
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                @if($buyer)
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="buyer-profile-btn"><a href="#">Buyer</a></li>
                                    <li class="buyer-profile-btn"><a href="#">Guarantor</a></li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Profile</h4>
                        </div>
                    </div>

                    <!-- buyer info start -->
                    <div class="row buyer_profile_container">
                        <div class="col-lg-12">
                        <h4 class="text-center">Product buyer</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mt-3">
                                        <img src="{{ asset($buyer->image) }}" alt=""
                                            class="avatar-lg rounded-circle" />
                                        <h5 class="mt-2 mb-0">{{ $buyer->buyer_name }}</h5>
                                        <h6 class="text-muted font-weight-normal mt-2 mb-0">{{ $buyer->occupation }}
                                        </h6>
                                    </div>
                                   
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Contact Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td>{{ $buyer->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone one</th>
                                                        <td>{{ $buyer->phone_one }}</td>
                                                    </tr>
                                                    @if($buyer->phone_two)
                                                    <tr>
                                                        <th scope="row">Phone</th>
                                                        <td>{{ $buyer->phone_two }}</td>
                                                    </tr>
                                                    @endif
                                                   
                                                    <tr>
                                                        <th scope="row">Address</th>
                                                        <td>{{ $buyer->address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Personal Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Date of birth</th>
                                                        <td>{{ $buyer->date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State of origin</th>
                                                        <td>{{ $buyer->state_of_origin}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Local Gov Area</th>
                                                        <td>{{ $buyer->lga }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Country</th>
                                                        <td>{{ $buyer->country }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Marital status</th>
                                                        <td>{{ $buyer->marital_status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Occupation</th>
                                                        <td>{{ $buyer->occupation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Company name</th>
                                                        <td>{{ $buyer->company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Company address</th>
                                                        <td>{{ $buyer->company_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Additional Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                   <td>-</td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- buyer info end -->
                    </div>
                    <!-- end row -->

                      <!-- guarantor info start -->
                    <div class="row buyer_profile_container">
                        <div class="col-lg-12">
                        <h4 class="text-center">Quarantor</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mt-3">
                                        <img src="{{ asset($buyer->guarantor_image) }}" alt=""
                                            class="avatar-lg rounded-circle" />
                                        <h5 class="mt-2 mb-0">{{ $buyer->guarantor_name }}</h5>
                                        <h6 class="text-muted font-weight-normal mt-2 mb-0">{{ $buyer->occupation }}
                                        </h6>
                                    </div>
                                   
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Contact Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td>{{ $buyer->guarantor_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone one</th>
                                                        <td>{{ $buyer->guarantor_phone_one }}</td>
                                                    </tr>
                                                    @if($buyer->guarantor_phone_two)
                                                    <tr>
                                                        <th scope="row">Phone</th>
                                                        <td>{{ $buyer->guarantor_phone_two }}</td>
                                                    </tr>
                                                    @endif
                                                   
                                                    <tr>
                                                        <th scope="row">Address</th>
                                                        <td>{{ $buyer->guarantor_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Personal Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Date of birth</th>
                                                        <td>{{ $buyer->guarantor_date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State of origin</th>
                                                        <td>{{ $buyer->guarantor_state_of_origin}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Local Gov Area</th>
                                                        <td>{{ $buyer->guarantor_lga }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Country</th>
                                                        <td>{{ $buyer->guarantor_country }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Marital status</th>
                                                        <td>{{ $buyer->guarantor_marital_status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Occupation</th>
                                                        <td>{{ $buyer->guarantor_occupation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Company address</th>
                                                        <td>{{ $buyer->guarantor_company_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                     <!-- profile start -->
                                     <div class="mt-3 pt-2 border-top">
                                        <h4 class="mb-3 font-size-15">Identification Information</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0 text-muted">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Company address</th>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                </div>
                            </div>
                        <!-- end card -->
                    </div>
                    <!-- guarantor info end -->
                @else
                <br><br>
                <div class="alert alert-danger text-center">No such buyer exist yet!</div>
                @endif
            </div> <!-- container-fluid -->

        </div> <!-- content -->
