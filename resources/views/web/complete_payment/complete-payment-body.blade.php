
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
                    @if(Session::has('success'))
                    <div class="alert-success p-3 mb-3 text-center">{{ Session::get('success') }}</div>
                    @endif
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
                        <div class="form-group">
                            <p style="color: #555;">Installments: {{ $balance->installment }}</p>
                            <label for="balance">Balance: @money($balance->balance)</label>
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
                }else if(response.data){
                    payWithPaystack(email, amount);
                }
            }
         });
    }





// paystack payment function
function payWithPaystack(email, amount) {
        let handler = PaystackPop.setup({
        key: 'pk_test_42550ade26808bb2d47dde8ab5f2f897fce81eea', // Replace with your public key
        email: email,
        amount: amount * 100,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
        alert('Window closed.');
        },

        callback: function(response){
        let message = response.reference;
        __update_installment(message);
        }

    });
        handler.openIframe();
}





    // laravel  csrf token 
    function csrf_token(){
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
            }
        });
    }




     function __update_installment(reference){
        var url = $("#update_installments_url").attr('data-url');

        csrf_token() //csrf token
        
        $.ajax({
            url: url,
            method: 'post',
            data: {
                update: 'update',
                reference: reference
            },
            success: function(response){
                if(response.data){
                    location.reload();
                }
            }
        });
     }





</script>