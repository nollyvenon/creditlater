

            <!-- start content -->
            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title">
                            <div class="col-md-12">
                                <h4 class="mb-1 mt-0">Category</h4>
                            </div>
                        </div>
                        @if($categories)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Categories Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Featured</th>
                                                    <th>Approved</th>
                                                    <th>Date Added</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $category->category_name }}</a></td>
                                                    <td><a href="#"><img src="{{ asset($category->category_image) }}" alt="image"></a></td>
                                                    <td><a href="#"><i class="fa fa-{{ $category->is_feature ? 'check text-success' : 'times text-danger' }}"></i></a></td>
                                                    <td><a href="{{ url('/admin/category_approve/'.$category->category_id) }}"><i class="fa fa-{{ $category->is_approved ? 'check text-success' : 'times text-danger' }}"></i></a></td>    
                                                    <td>{{ date('d M Y', strtotime($category->date_added)) }}</td>
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
                         <div class="alert-danger p-3 text-center">There are no Categories Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
