          
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
                        <h4 class="mb-1 mt-0">Vendors supply history table</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                 <h4 class="header-title mt-0 mb-1">Histroy table</h4>
                                @if($delivery)
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Product name</th>
                                            <th>Amount</th>
                                            <th>First installment</th>
                                            <th>Buyer</th>
                                            <th>Dispatcher</th>
                                            <th>Supply date</th>
                                            <th>Delivered</th>
                                            <th>Return status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($delivery as $delivered)
                                        <tr>
                                            <td>{{ $delivered->product_name }}</td>
                                            <td>@money($delivered->product_price)</td>
                                            <td>@money($delivered->first)</td>
                                            <td><a href="{{ url('/profile/'.$delivered->buyer_id) }}" style="color: #747474">{{ $delivered->buyer }}</a></td>
                                            <td>{{ $delivered->dispatcher }}</td>
                                            <td>{{ $delivered->date_supplied }}</td>
                                            <td>
                                                @if($delivered->delivered)
                                                   <span class="text-success">Delivered</span>
                                                @else
                                                    <span class="text-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$delivered->return)
                                                   <span class="text-success">Not returned</span>
                                                @else
                                                    <span class="text-danger">Returned</span>
                                                @endif
                                            </td>
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
