

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
                                <h4 class="mb-1 mt-0">Installment Sold products</h4>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Installment Table</h4>
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
                                               @foreach($installment_products as $installment_product)
                                               <tr>
                                                   <td>{{ $installment_product->products_name }}</td>
                                                   <td>{{ $installment_product->reference_number }}</td>
                                                   <td>{{ $installment_product->quantity}}</td>
                                                   <td>@money($installment_product->total)</td>
                                                   <td>{{ date('d M Y', strtotime($installment_product->paid_date)) }}</td>
                                                   <td><a href="{{ url('/admin/installment-products/delete/'.$installment_product->installment_product_id) }}" style="color: #717171"><i class="fa fa-trash"></i></a></td>
                                               </tr>
                                               @endforeach
                                            </tbody>
                                        </table> 
                                        @if($installment_products)
                                        <div class="text-right"><b>TOTAL</b>: @money($total) </div>
                                        @endif

                                        @if(!$installment_products)
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
