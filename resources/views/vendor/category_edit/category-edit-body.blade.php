<div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Category</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6" style="margin-left: 25%">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('error'))
                                <div class="alert-danger p-1 text-center mb-3">{{ Session::get('error')}}</div>
                                @endif
                                <h4 class="header-title mt-0 text-center">Edit category</h4>
                                
                                <form action="{{ url('/vendor/category/'.$category->category_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    @if($errors->first('category_name'))
                                                    <div class="text-danger">{{ $errors->first('category_name')}}</div>
                                                    @endif
                                                    <label for="category_name">Category name</label>
                                                    <input type="text" id="example-email" name="category_name" class="form-control" value="{{ old('category_name') ?? $category->category_name }}" placeholder="Enter category">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    @if($errors->first('category_image'))
                                                    <div class="text-danger">{{ $errors->first('category_image')}}</div>
                                                    @endif
                                                    <label for="category_name">Category image</label>
                                                    <input type="file" class="form-control" name="category_image" id="category_image" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    @if($errors->first('round_category'))
                                                    <div class="text-danger">{{ $errors->first('round_category')}}</div>
                                                    @endif
                                                    <label for="category_round">Round Category</label>
                                                    <input type="file" class="form-control" name="round_category" id="round_category" value="">
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                                </div>
                                             </div>
                                            @csrf
                                        </div>
                                    </div>
                                </form>
    
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
        </div>
    </div>