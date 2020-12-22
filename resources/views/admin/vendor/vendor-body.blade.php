


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
                                    <!-- <ol class="breadcrumb">
                                       <a href="{{ url('/dashboard/products/add') }}" class="add-item-btn">Add products</a>
                                    </ol> -->
                                </nav>
                                <h4 class="mb-1 mt-0">Manage vendors</h4>
                            </div>
                        </div>

                        @if(Session::has('success'))
                            <div class="text-center alert-success p-3">{{ Session::get('success') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Vendor Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Email</th>
                                                    <th>Last login</th>
                                                    <th>Date Joined</th>
                                                    <th>Deactivate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            @if(count($vendors) != '')
                                            <tbody>
                                                @foreach($vendors as $vendor)
                                                <tr>
                                                    <td>{{ ucfirst($vendor->first_name) }}</td>
                                                    <td>
                                                        @if($vendor->image)
                                                            <img src="{{ asset('vendors/images/vendor_image/1.png') }}" alt="{{ $vendor->first_name}}" style="width: 50px;">
                                                        @else
                                                            <img src="{{ asset('vendors/images/vendor_image/1.png') }}" alt="{{ $vendor->first_name}}" style="width: 50px;">
                                                        @endif
                                                        <i class="fa fa-circle {{ $vendor->active ? 'text-success' : 'text-danger'}} active_vendors"></i>
                                                    </td>
                                                    <td>{{ $vendor->email }}</td>
                                                    <td>
                                                        {{ date('H : i : s', strtotime($vendor->last_login)) }} 
                                                        <br>
                                                        {{ date('d M Y', strtotime($vendor->last_login)) }} 
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($vendor->date_joined)) }}</td>
                                                    <td>
                                                       <a href="{{ url('/admin/vendor-deactivate/'.$vendor->id) }}" > <i class="fa  {{ $vendor->is_deactivate ? 'fa-times text-danger' : 'fa-check text-success'}}"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/admin/vendor-edit/'.$vendor->id) }}" style="color: #717171"><i class="fa fa-pencil"></i></a>
                                                        <span style="padding: 0px 10px"></span>
                                                        <a href="{{ url('/admin/vendor-delete/'.$vendor->id) }}" style="color: #717171"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                @endforeach
                                                </tr>
                                                </tbody>
                                            @endif
                                          
                                        </table>
                                        @if(count($vendors) != '')
                                        <div class="total_vendor text-right"><b>Total Vendors:</b> {{ count($vendors) }}</div>
                                        @endif
                                        @if(count($vendors) == '')
                                         <div class="alert text-center">There are no vendors yet</div>
                                        @endif
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                       
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


