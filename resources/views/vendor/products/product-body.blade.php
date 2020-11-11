


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
                                        <a href="{{ url('/vendor/products/add') }}" class="add-item-btn">Add product</a>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Products</h4>
                            </div>
                        </div>
                        @if($products)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Product Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Product Price</th>
                                                    <th>Price Slash</th>
                                                    <th>Featured</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $product->products_name }}</a></td>
                                                    <td><a href="#"><img src="{{ asset(image($product->products_image, 0)) }}" alt="image" class="table-product-image"></a></td>
                                                    <td>{{ $product->brand_name }}</td>
                                                    <td>{{ $product->category_name }}</td>
                                                    <td>@money($product->products_price)</td>
                                                    <td>@money($product->products_price_slash)</td>
                                                    <td><a href="#"><i class="fa fa-{{ $product->is_feature ? 'check text-success' : 'times text-danger' }}"></i></a></td>
                                                    <td>{{ $product->products_quantity }}</td>
                                                    <td><i class="fa fa-trash"></i> <i class="fa fa-edit"></i></td>
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
                         <div class="alert-danger p-3 text-center">There are no Products Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
