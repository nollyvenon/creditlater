<div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Basic</li>
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Product</h4>
                    </div>
                </div>

                @if(Session::has('success'))
                <div class="text-center alert-success p-3">{{ Session::get('success') }}</div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 text-center">Add Product</h4>

                                <form action="{{ url('/vendor/products/add') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- start form -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('product_name'))
                                                    <div class="text-danger">{{ $errors->first('product_name')}}</div>
                                                    @endif
                                                    <label for="category_name">Product name</label>
                                                    <input type="text" id="example-email" name="product_name" class="form-control" value="{{ old('product_name') }}" required placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                   @if($errors->first('brand'))
                                                    <div class="text-danger">{{ $errors->first('brand')}}</div>
                                                    @endif
                                                    <label for="brand">Brand</label>
                                                   <select name="brand" class="form-control" required>
                                                       <option value="">select</option>
                                                       @foreach($brands as $brand)
                                                       <option value="{{ $brand->brand_id}}">{{ $brand->brand_name }}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('category'))
                                                    <div class="text-danger">{{ $errors->first('category')}}</div>
                                                    @endif
                                                    <label for="category">Category</label>
                                                   <select name="category" class="form-control" required>
                                                       <option value="">select</option>
                                                       @foreach($categories as $category)
                                                       <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" value="{{ old('model') }}" placeholder="Enter model">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('price'))
                                                    <div class="text-danger">{{ $errors->first('price')}}</div>
                                                    @endif
                                                    <label for="price">Price</label>
                                                    <input type="number" name="price" class="form-control"  min:'1' value="{{ old('price') }}" required placeholder="Enter price">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('quantity'))
                                                    <div class="text-danger">{{ $errors->first('quantity')}}</div>
                                                    @endif
                                                    <label for="quantity">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control"  min:'1' value="{{ old('quantity') }}" required placeholder="Enter quantity">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('warranty'))
                                                    <div class="text-danger">{{ $errors->first('warranty')}}</div>
                                                    @endif
                                                    <label for="category_name">Warranty</label>
                                                    <input type="text" name="warranty" class="form-control" value="{{ old('warranty') }}" placeholder="Enter warranty">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    @if($errors->first('image'))
                                                    <div class="text-danger">{{ $errors->first('image')}}</div>
                                                    @endif
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mt-3 col-lg-6">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" name="type" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Small</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="type" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Medium</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" name="type" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Large</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="type" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Xtra Large</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="video_link">Video Link</label>
                                                    <input type="text" name="video_link" class="form-control" placeholder="Enter video link">
                                                </div>
                                            </div>
                                          <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="header-title mt-0 mb-1">Product Detail</h4>
                                                            @if($errors->first('details'))
                                                            <div class="text-danger">{{ $errors->first('details')}}</div>
                                                            @endif
                                                            <p class="sub-header"></p>
                                                             <!-- text editor start -->
                                                             <textarea id="details" name="details"> </textarea>
                                                            <script>
                                                                    CKEDITOR.replace( 'details' );
                                                            </script>
                                                             <!-- text editor end -->
                                                        </div>
                                                    </div> <!-- end card-->
                                            </div> <!-- end col-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    @if($errors->first('description'))
                                                    <div class="text-danger">{{ $errors->first('description')}}</div>
                                                    @endif
                                                    <label for="category_name">Description</label>
                                                     <!-- text editor start -->
                                                        <textarea id="description" name="description">{{ old('description') }} </textarea>
                                                        <script>
                                                                CKEDITOR.replace( 'description' );
                                                        </script>
                                                    <!-- text editor end -->
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="" class="btn btn-primary">Add Product</button>
                                                </div>
                                            </div>
                                        </div>
                                          </div>
                        <!-- end row-->    @csrf
                                        <!-- end form -->
                                    </div>
                                </form>
    
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
        </div>
    </div>