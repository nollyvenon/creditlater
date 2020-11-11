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
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 text-center">Add Product</h4>

                                <form class="form-horizontal">
                                    <div class="row">
                                        <!-- start form -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="category_name">Product name</label>
                                                    <input type="email" id="example-email" name="example-email"
                                                        class="form-control" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="brand">Brand</label>
                                                   <select name="brand" class="form-control">
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                   <select name="category" class="form-control">
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                       <option value="">select</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" placeholder="Enter model">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" name="price" class="form-control" placeholder="Enter price">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="category_name">Model</label>
                                                    <input type="text" name="model" class="form-control" placeholder="Enter model">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mt-3 col-lg-6">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1"checked>
                                                    <label class="custom-control-label" for="customCheck1">Small</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Medium</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Large</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
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
                                                            <p class="sub-header"></p>
                                                             <!-- text editor start -->
                                                             <textarea name="editor1"></textarea>
                                                            <script>
                                                                    CKEDITOR.replace( 'editor1' );
                                                            </script>
                                                             <!-- text editor end -->
                                                        </div>
                                                    </div> <!-- end card-->
                                            </div> <!-- end col-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="category_name">Description</label>
                                                    <textarea name="description" id="description" class="form-control" cols="10" rows="5"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="" class="btn btn-primary">Add Product</button>
                                                </div>
                                            </div>
                                        </div>
                                          </div>
                        <!-- end row-->
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