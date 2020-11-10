

            <!-- start content -->
            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                           <!-- something here -->
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Delivery</h4>
                            </div>
                        </div>
                        @if($deliveries)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Delivery Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Warranty</th>
                                                    <th>Quantity</th>
                                                    <th>Shipping</th>
                                                    <th>Delivered</th>
                                                    <th>Delivery Date</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($deliveries as $delivery)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{$delivery->products_name  }}</a></td>
                                                    <td><img src="{{ asset( image($delivery->products_image, 0)) }}" style="width: 25px;" alt="{{ $delivery->products_name }}"></td>
                                                    <td>@money($delivery->products_price)</td>
                                                    <td>{{ $delivery->warranty }}</td>
                                                    <td>{{ $delivery->quantity }} </td>
                                                    <td>{{ $delivery->shipping }}</td>
                                                    <td>
                                                       @if($delivery->is_delivered)
                                                       <span class="text-success">Delivered</span>
                                                       @else
                                                       <span class="text-warning">pending</span>
                                                       @endif
                                                    </td>
                                                    <td>
                                                       @if($delivery->date_delivered)
                                                          {{ $delivery->date_delivered }}
                                                       @else
                                                         -
                                                       @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        @else
                         <div class="alert-danger p-3 text-center">There are no Order Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
