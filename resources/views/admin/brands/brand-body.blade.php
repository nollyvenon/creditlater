


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
                                       <!-- <form action="" method="">
                                           <div class="row">
                                           <div class="col-lg-12">
                                                <input type="text" id="brand" name="brand" class="form-control" placeholder="Enter brand">
                                            </div>
                                           </div>
                                       </form> -->
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Brand</h4>
                            </div>
                        </div>
                        @if($brands)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Brand Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Featured</th>
                                                    <th>Date Added</th>
                                                    <th>is_approved</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($brands as $brand)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $brand->brand_name }}</a></td>
                                                    <td><i class="fa fa-{{ $brand->is_feature ? 'check text-success' : 'times text-danger' }}"></i></td>                                                    
                                                    <td>{{ date('d M Y', strtotime($brand->brand_date_added)) }}</td>
                                                    <td><a href="{{ url('/admin/brand_approved/'.$brand->brand_id) }}"><i class="fa fa-{{ $brand->is_approved ? 'check text-success' : 'times text-danger' }}"></i></a></td>
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
                         <div class="alert-danger p-3 text-center">There are no Brands Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
