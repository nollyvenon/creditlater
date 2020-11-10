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
                                <h4 class="mb-1 mt-0">Installment Detail</h4>
                            </div>
                        </div>
                        
                        @if($get_installment)
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
                                                    Email: {{ $get_installment[0]->email }}
                                                    <br>
                                                    Phone: {{ $get_installment[0]->phone }}
                                                    <br>
                                                    Postal code: {{ $get_installment[0]->postal_code }}
                                                </div>
                                            </div>
                                            <div class="float-sm-left">
                                                <h4 class="m-0 d-print-none"><i class="fa fa-circle text-primary"></i></h4>
                                                <dl class="row mb-2 mt-3">
                                                    <dt class="col-sm-3 font-weight-normal">First name :</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ $get_installment[0]->first_name }}</dd>

                                                    <dt class="col-sm-3 font-weight-normal">Last name :</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ $get_installment[0]->last_name }}</dd>

                                                    <dt class="col-sm-3 font-weight-normal">Date paid:</dt>
                                                    <dd class="col-sm-9 font-weight-normal">{{ explode(' ', $get_installment[0]->paid_date )[0] }}</dd>
                                                    
                                                </dl>
                                                Intallments: <b>{{ $get_installment[0]->installment }}</b>
                                                <br>
                                                Reference: <b>#{{ $get_installment[0]->reference }}</b>
                                            </div>
                                            
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <h6 class="font-size-16">Shipping Address</h6>
                                                <address>
                                                     Home: {{ $get_installment[0]->address }}
                                                     <br>
                                                     City: {{ $get_installment[0]->city }}
                                                     <br>
                                                     State: {{ $get_installment[0]->state }}
                                                     <br>
                                                     Country: {{ $get_installment[0]->country }}
                                                </address>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="text-md-right">
                                                     Initial payment: <b>@money($get_installment[0]->initial_payment )</b>
                                                     <h6 class="font-weight-normal">Total: </h6>
                                                    <h2>@money($get_installment[0]->total_price)</h2>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <br><br>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="table-responsive">
                                                <h4 class="header-title mt-0 mb-1">Installment Table</h4>
                                                <!-- <p class="sub-header"></p> -->
                                                    <table id="basic-datatable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Reference ID</th>
                                                            <th>Total</th>
                                                            <th>Paid</th>    
                                                            <th>Balance</th>
                                                            <th>Balance Installment</th>                                                            
                                                            <th>Date</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        @php($balance_installment = $get_installment[0]->installment)
                                                        @php($total_installment = 0)
                                                        @foreach($get_installment as $installment)
                                                        @php($balance_installment--)
                                                        @php($total_installment += $installment->balance_paid)
                                                        <tr>
                                                            <td><a href="#" style="color: #717171">product name</a></td>
                                                            <td>#{{ $installment->balance_reference }}</td>
                                                            <td>@money($installment->total_price)</td>
                                                            <td>@money( $installment->balance_paid)</td>
                                                            <td>@money($installment->balance_balance)</td>
                                                            <td>{{ $balance_installment }}</td>
                                                            <td>{{ explode(' ', $installment->balance_paid_date)[0] }}</td>
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
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-right mt-4">
                                                    <p><span class="font-weight-medium">Initial Paid:</span> <span
                                                            class="float-right">@money($get_installment[0]->initial_payment)</span></p>
                                                    <p><span class="font-weight-medium">Installment Paid :</span> <span
                                                            class="float-right">@money($total_installment)</span></p>
                                                    <h3>
                                                       @if(($total_installment + $get_installment[0]->initial_payment) == $get_installment[0]->total_price)
                                                         <div>@money($get_installment[0]->total_price)</div>
                                                         <span class="fa text-success">Completed!</span>
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        @else
                         <div class="alert-danger p-3 text-center">There are no Installment Pyament Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                

            </div>

        </div>
        <!-- END wrapper -->