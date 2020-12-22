

            <!-- start content -->
            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                       <a href="{{ url('/vendor/category/add') }}" class="add-item-btn">Add Category</a>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Category</h4>
                            </div>
                        </div>
                        @if($categories)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Categories Table</h4>
                                        @if(Session::has('success'))
                                        <div class="text-center alert-success p-3">{{ Session::get('success') }}</div>
                                        @endif
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Round category</th>
                                                    <th>Featured</th>                                                    
                                                    <th>Date Added</th>
                                                    <th>Approved</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $category->category_name }}</a></td>
                                                    <td><a href="#"><img src="{{ asset($category->category_image) }}" alt="image" style="width: 30px;"></a></td>
                                                    <td><a href="#"><img src="{{ asset($category->round_cat_image) }}" alt="image" style="width: 30px;"></a></td>                                                   
                                                    <td><a href="{{ url('/vendor/category-feature') }}" id="{{ $category->category_id }}" class="category_feature_btn"><i class="fa fa-{{ $category->is_feature ? 'check text-success' : 'times text-danger' }}"></i></a></td>
                                                    <td>{{ explode(' ', $category->date_added)[0] }}</td>
                                                    <td><i class="fa fa-{{ $category->is_approved ? 'check text-success' : 'times text-danger' }}"></i></td>                                                    
                                                    <td>
                                                        <a href="{{ url('/vendor/category/'.$category->category_id) }}" class="category_edit" style="color: #717171" id="{{ $category->category_id }}"><i class="fa fa-edit"></i></a>
                                                        <span style="padding: 0px 10px;"></span>
                                                        <a href="{{ url('/vendor/category-delete/'.$category->category_id) }}" id="{{ $category->category_id }}" style="color: #717171" class="category_delete_btn"><i class="fa fa-trash"></i></a>
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
                         <div class="alert-danger p-3 text-center">There are no Categories Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
