          
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
                                <li class="breadcrumb-item"><a href="#">Creditlater</a></li>
                                <li class="breadcrumb-item"><a href="#">vendor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">history</li>
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Product installment payment table</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Payment table</h4>
                                @if($payments)
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Product name</th>
                                            <th>Price</th>
                                            <th>Installments</th>
                                            <th>first</th>
                                            <th>Buyer</th>
                                            <th>second</th>
                                            <th>third</th>
                                            <th>fourth</th>
                                            <th>fift</th>
                                            <th>sixth</th>
                                        </tr>
                                    </thead>
                                
                                
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td><a href="#" style="color: #737373">{{ $payment->product_name }}</a></td>
                                            <td>@money($payment->product_price)</td>
                                            <td>{{ $payment->installment_amount }}</td>
                                            <td><a href="{{ url('/profile/'.$payment->buyer_id) }}" style="color: #747474">{{ $payment->buyer }}</a></td>

                                            @if($payment->first)
                                            <td>@money($payment->first)</td>
                                            @else
                                            <td>-</td>
                                            @endif

                                            @if($payment->second)
                                            <td>@money($payment->second)</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                          
                                            @if($payment->third)
                                            <td>@money($payment->third)</td>
                                            @else
                                            <td>-</td>
                                            @endif

                                             @if($payment->fourth)
                                            <td>@money($payment->fourth)</td>
                                            @else
                                            <td>-</td>
                                            @endif

                                             @if($payment->fifth)
                                            <td>@money($payment->fifth)</td>
                                            @else
                                            <td>-</td>
                                            @endif

                                             @if($payment->sixth)
                                            <td>@money($payment->sixth)</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger text-center">There are no payment made yet!</div>
                                @endif
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> 
        </div>
    </div>
 <!-- end of page content-->
