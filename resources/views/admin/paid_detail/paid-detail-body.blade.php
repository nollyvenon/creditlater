            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title mt-2 d-print-none">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                      <!-- something here -->
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Payment Details</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Logo & title -->
                                        <div class="clearfix">
                                            <div class="float-sm-right">
                                                <img src="assets/images/logo.png" alt="" height="48" />
                                                <h4 class="m-0 d-inline align-middle">Contact Info</h4>
                                                <div class="pl-2 mt-2">
                                                    Email: {{ $paid_details[0]->email }}
                                                    <br>
                                                    Phone: {{ $paid_details[0]->phone }}
                                                    <br>
                                                    Postal code: {{ $paid_details[0]->postal_code }}
                                                </div>
                                            </div>
                                            <div class="float-sm-left">
                                                <h4 class="m-0 d-print-none"><i class="fa fa-circle text-warning"></i></h4>
                                                <dl class="row mb-2 mt-3">
                                                    <dt class="col-sm-3 font-weight-normal">First name :</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ $paid_details[0]->first_name }}</dd>

                                                    <dt class="col-sm-3 font-weight-normal">Last name :</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ $paid_details[0]->last_name }}</dd>

                                                    <dt class="col-sm-3 font-weight-normal">Date paid :</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ explode(' ', $paid_details[0]->paid_date)[0] }}</dd>
                                                </dl>
                                                Reference: <b>#{{ $paid_details[0]->reference }}</b>
                                            </div>
                                            
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <h6 class="font-size-16">Shipping Address</h6>
                                                <address>
                                                     Home: {{ $paid_details[0]->address }}
                                                     <br>
                                                     City: {{ $paid_details[0]->city }}
                                                     <br>
                                                     State: {{ $paid_details[0]->state }}
                                                     <br>
                                                     Country: {{ $paid_details[0]->country }}
                                                </address>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="text-md-right">
                                                    <h6 class="font-weight-normal">Total</h6>
                                                    <h2>@money($paid_details[0]->amount)</h2>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    
                                        <div class="row">
                                            <div class="col-12"><br><br>
                                                <div class="table-responsive">
                                                    <h4 class="header-title mt-0 mb-1">Transaction Table</h4>
                                                    <!-- <p class="sub-header"></p> -->
                                                        <table id="basic-datatable" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Reference ID</th>
                                                                <th>Price</th>    
                                                                <th>Quantity</th>
                                                                <th>Product Type</th> 
                                                                <th>Total</th>                                                           
                                                                <th>Date</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    
                                                        <tbody>
                                                            @foreach($paid_details as $paid)
                                                            <tr>
                                                            <td><a href="#" style="color: #717171;">{{ $paid->products_name }}</a></td>
                                                            <td>#{{ $paid->reference }}</td>
                                                            <td>@money($paid->products_price)</td>
                                                            <td>{{ $paid->quantity }}</td>
                                                            <td>
                                                                @if($paid->small)
                                                                    <div> small: {{ $paid->small }}</div>
                                                                @endif
                                                                @if($paid->medium)
                                                                    <div> medium: {{ $paid->medium }}</div>
                                                                @endif
                                                                @if($paid->large)
                                                                    <div>large: {{ $paid->large }}</div>
                                                                @endif
                                                                @if($paid->xtra_large)
                                                                    <div>Extra large: {{ $paid->xtra_large }}</div>
                                                                @endif
                                                                @if($paid->unspecified)
                                                                    <div>unspecified: {{ $paid->unspecified }}</div>
                                                                @endif
                                                            </td>
                                                            <td>@money($paid->total)</td>
                                                            <td>{{ explode(' ', $paid->paid_date)[0] }}</td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                    </table>

                                                </div> <!-- end card body-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="clearfix pt-5">
                                                        <!-- something here -->
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-right mt-4">
                                                    <h3>@money($paid_details[0]->amount)</h3>
                                                </div>
                                                <div class="clearfix">
                                                   
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

        
            </div>
        </div>
        <!-- END wrapper -->