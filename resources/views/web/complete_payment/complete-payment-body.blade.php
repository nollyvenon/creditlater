
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Complete Payment</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">Complete Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">payment Form</h3>
                    <form class="theme-form">
                        <div class="form-group">
                            <div class="text-danger verification-alert checkout_alert_0"></div>
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="complete_payment_email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <div class="text-danger verification-alert checkout_alert_1"></div>
                            <label for="review">Amount</label>
                            <input type="number"  min="0" class="form-control" id="complete_payment_amount" placeholder="Amount" required="">
                        </div>
                        <a href="{{ url('/complete-payment-now') }}" class="btn btn-normal" id="complete_installment_payment_btn">Pay now</a>
                        <a class="float-right txt-default mt-2" href="{{ url('/installment-orders/complete-payment') }}" id="fgpwd"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->






<script>

var paymentBtn = $("#complete_installment_payment_btn");
    $(paymentBtn).click(function(e){
        e.preventDefault();

        complete_installment();
    });



    function complete_installment(){
        var error_message = $(".verification-alert").html('');
        var url = $("#complete_installment_payment_btn").attr('href');
        var email = $("#complete_payment_email").val();
        var amount = $("#complete_payment_amount").val();

         csrf_token() //csrf token

         $.ajax({
            url: url,
            method: 'post',
            data: {
                email: email,
                amount: amount
            },
            success: function(response){
                if(response.errors){
                    if(response.errors.email){
                        $(".checkout_alert_0").html("*"+response.errors.email);
                    }
                    if(response.errors.amount){
                        $(".checkout_alert_1").html("*"+response.errors.amount);
                    }
                }
            }
         })
    }



    // laravel  csrf token 
    function csrf_token(){
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
            }
        });
    }
</script>