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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Settings</h4>
                            @if(Session::has('success'))
                            <div class="alert-success p-3">{{ Session::get('success')}}</div>
                            @endif
                        </div>
                    </div>


                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- cta -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mt-3 mt-sm-0">
                                                    <form action="{{ url('/admin/settings') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                                        <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('contact'))
                                                                        <div class="text-danger">{{ $errors->first('contact')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Contact number:</label>
                                                                        <input type="text" class="form-control" name="contact" id="contact" value="{{ $settings->contact }}" placeholder="Contact">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('copy_right'))
                                                                        <div class="text-danger">{{ $errors->first('copy_right')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Copy right:</label>
                                                                        <input type="text" class="form-control" name="copy_right" id="copy_right" value="{{ $settings->copy_rights}}" placeholder="Copy right">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('top_nav'))
                                                                        <div class="text-danger">{{ $errors->first('top_nav')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Top nav:</label>
                                                                        <input type="text" class="form-control" name="top_nav" id="top_nav" value="{{ $settings->top_banner}}" placeholder="Enter something...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('top_nav_amount'))
                                                                        <div class="text-danger">{{ $errors->first('top_nav_amount')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Top nav amount:</label>
                                                                        <input type="number" class="form-control" name="top_nav_amount" id="top_nav_amount" value="{{ $settings->top_nav_amount }}" placeholder="Enter amount">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        @if($errors->first('about'))
                                                                        <div class="text-danger">{{ $errors->first('about')}}</div>
                                                                        @endif
                                                                        <label for="category_round">Footer about:</label>
                                                                        <textarea class="form-control" name="about" id="about"cols="30" rows="5">{{ $settings->about }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    @if($settings->logo)
                                                                    <div class="logo">
                                                                        <img src="{{ asset($settings->logo) }}" alt="logo">
                                                                    </div> 
                                                                    @endif
                                                                    <div class="form-group">
                                                                        @if(Session::has('image_error'))
                                                                        <div class="text-danger">{{ Session::get('image_error') }}</div>
                                                                        @endif
                                                                        <label for="category_round">Logo:</label>
                                                                        <input type="file" class="form-control" name="logo">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                                @csrf
                                                            </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- cart header start -->
                            <div class="card p-3">
                                <form action="{{ url('/admin/payment-method-header') }}" method="post">
                                    <div class="form-group">
                                        @if($errors->first('payment_method_header'))
                                        <div class="text-danger">{{ $errors->first('payment_method_header')}}</div>
                                        @endif
                                        <label for="payment_name">Payment method header:</label>
                                        <input type="text" class="form-control" name="payment_method_header" value="{{ $settings->payment_method_header ?? old('payment_method_header') }}" placeholder="Write something..">
                                    </div>
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                            <!-- card header end -->

                        <div class="card p-3">
                            <div class="payment-frame">
                                <label for="">Payment method:</label> <br>
                                @if($payment_method)
                                <div class="row">
                                @foreach($payment_method as $method)
                                    <div class="col-lg-12 m-2">
                                       <img src="{{ asset($method->payment_method_image) }}" alt="">
                                        <div class="dropdown float-right">
                                            <a href="avascript:void(0);" class="dropdown-toggle arrow-none text-muted" id="{{ $method->id }}" data-toggle="dropdown" aria-expanded="false">
                                                <i class='uil uil-ellipsis-h'></i>
                                            </a>
                                            <!-- dropdown start -->
                                            <div class="dropdown-menu dropdown-menu-right payment-dropdown-container">
                                                <a href="{{ url('/admin/payment_method-activate/'.$method->id) }}" data-type="activate" class="dropdown-item">
                                                   <i class="fa  {{ $method->active ?  'fa-circle text-success' : 'fa-circle-o text-secondary' }}"></i> Active
                                                </a>
                                                <a href="{{ url('/admin/payment_method-deactivate/'.$method->id) }}" data-type="deactivate" class="dropdown-item">
                                                    <i class="fa {{ !$method->active ?  'fa-circle text-success' : 'fa-circle-o text-secondary' }}"></i> Deactive
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item" id="{{ $method->id }}">
                                                    <i class='uil uil-edit mr-1'></i>Edit
                                                </a>
                                                <a href="{{ url('/admin/payment_method-delete/'.$method->id) }}" id="{{ $method->id }}" class="dropdown-item text-danger">
                                                    <i class='uil uil-trash-alt mr-1'></i>Delete
                                                </a>
                                            </div> <!-- end dropdown menu-->
                                        </div> <!-- end dropdown-->
                                        
                                        <span>{{ $method->payment_method_name }}</span>
                                    </div>
                                @endforeach
                                </div>
                                @endif
                            </div>
                            <!-- dropdown add new-->
                            <div class="btn-group dropdown mt-2 mr-1">
                                <button class="btn btn-primary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Add new <i class="icon"><span data-feather="chevron-down"></span></i>
                                </button>
                                <form class="dropdown-menu dropdown-lg p-3 submit_payment_method" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="text-danger" id="alert_payment_0"></div>
                                        <label for="payment_name">Payment name:</label>
                                        <input type="text" class="form-control"
                                            id="payment_name" name="payment_name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <div class="text-danger" id="alert_payment_1"></div>
                                        <label for="payment_link">Url link:</label>
                                        <input type="text" class="form-control"
                                            id="payment_link" name="payment_link" placeholder="Enter url link">
                                    </div>
                                    <div class="form-group">
                                        <div class="text-danger" id="alert_payment_2"></div>
                                        <label for="payment_method_image">Image</label>
                                        <input type="file" class="form-control" style="overflow: hidden;"
                                            id="payment_method_image" name="payment_method_image" placeholder="Enter Image">
                                    </div>
                                    
                                    <button type="submit" id="submit_payment_method" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

<!-- ajax url -->
<a href="{{ url('/admin-add-payment-method') }}" class="admin-add-payment-method"></a>

<script>
    function check()
    {
        console.log($(this))
    }

$(document).ready(function(){

// CSRF PAGE TOKEN
function csrf_token(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
        }
    });
}




// ADDED PAYMENT METHOD
var url = $(".admin-add-payment-method").attr('href');
$(".submit_payment_method").submit( function(e){
    e.preventDefault();
    
    $("#alert_payment_0").html('');
    $("#alert_payment_2").html('');

    csrf_token();


    $.ajax({
        url: url,
        method: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function(response){
            if(!response.data){
                $("#alert_payment_0").html(response.errors.error_name);
                $("#alert_payment_2").html(response.errors.error_image);
            }else{
                location.reload();
            }
            
        }
    })
});




});
</script>