

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
                                <h4 class="mb-1 mt-0">Sold products</h4>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Sold Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Reference</th>
                                                    <th>quantity</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($sold_products)
                                                @foreach($sold_products as $sold_product)
                                                <tr>
                                                    <td>{{ $sold_product->products_name }}</td>
                                                    <td>#{{ $sold_product->reference_number}}</td>
                                                    <td>{{ $sold_product->quantity }}</td>
                                                    <td>@money($sold_product->total)</td>
                                                    <td>{{ date('d M Y' ,strtotime($sold_product->paid_date)) }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/sold-products/delete/'.$sold_product->paid_id) }}" style="color: #717171;"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr> 
                                                @endforeach  
                                            @endif
                                            </tbody>
                                        </table> 

                                        @if($sold_products)
                                        <div class="text-right"><b>TOTAL</b>: @money($total) </div>
                                        @endif

                                        @if(!$sold_products)
                                        <div class="alert p-3 text-center">There are no sold products yet.</div>
                                        @endif
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                       
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
