


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
                                       <form action="{{ url('vendor/brand/add') }}" method="post">
                                           <div class="row">
                                           <div class="col-lg-12">
                                               @if($errors->first('brand'))
                                               <div class="text-danger">{{ $errors->first('brand') }}</div>
                                               @endif
                                               @if(Session::has('error'))
                                               <div class="text-danger">{{ Session::get('error') }}</div>
                                               @endif
                                                <input type="text" id="vendor_brand" name="brand" class="" value="" placeholder="Enter brand">
                                                <button type="submit" style="" id="submit_brand">Add brand</button>
                                            </div>
                                           </div>
                                           @csrf
                                       </form>
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
                                            @if(Session::has('success'))
                                            <div class="alert-success p-3 text-center">{{ Session::get('success') }}</div>
                                            @endif
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Featured</th>
                                                    <th>Date Added</th>
                                                    <th>Approved</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($brands as $brand)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $brand->brand_name }}</a></td>
                                                    <td><a href="{{ url('/vendor/brand-feature') }}" class="vendor_feature_brand" id="{{ $brand->brand_id }}"><i class="fa fa-{{ $brand->is_feature ? 'check text-success' : 'times text-danger' }}"></i></a></td>
                                                    <td>{{ explode(' ', $brand->brand_date_added)[0] }}</td>
                                                    <td><a href="#" ><i class="fa fa-{{ $brand->is_approved ? 'check text-success' : 'times text-danger' }}"></i></a></td>                                                   
                                                    <td>
                                                       <a href="#"  style="color: #717171" class="vendor_brand_edit" id="{{ $brand->brand_id }}" data-val="{{ $brand->brand_name }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></a>
                                                       <span style="padding: 0px 10px;"></span>
                                                       <a href="{{ url('/vendor/brand-delete') }}" style="color: #717171" class="vendor_delete_brand" id="{{ $brand->brand_id }}"> <i class="fa fa-trash" ></i> </a>
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
                         <div class="alert-danger p-3 text-center">There are no Brands Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
