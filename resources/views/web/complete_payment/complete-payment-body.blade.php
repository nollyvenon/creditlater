
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




<!-- istallment orders -->
<section class="">
    <div class="">
        <div class="row">
            <div class="col-sm-12 p-5 table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @php($x = 1)
                    @foreach($installment_products as $product)
                    <tbody>
                        <td>{{ $x }}</td>
                        <td><img src="{{ asset(explode(',', $product->products_image)[0]) }}" alt="" style="width: 50px; height: 50px;"></td>
                        <td>{{ $product->products_name }}</td>
                        <td>@money($product->products_price) </td>
                        <td>{{ $product->quantity }}</td>
                        <td>@money($product->total)</td>
                        <td><i class="fa fa-trash"></i></td>
                    </tbody>
                    @php($x++)
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
<!-- end of installment orders-->

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
                    <form action="{{ url('/complete-payment') }}" method="post" class="theme-form">
                        <div class="form-group">
                            @if($errors->first('email'))
                                <div class="text-danger">{{ $errors->first('email')}}</div>
                            @endif
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            @if($errors->first('amount'))
                                <div class="text-danger">{{ $errors->first('amount')}}</div>
                            @endif
                            <label for="review">Amount</label>
                            <input type="number"  min="1" class="form-control" name="amount" placeholder="Amount" required>
                        </div>
                        <div class="form-group">
                            <p style="color: #555;">Installments: {{ $payment_balance->installment_count }}</p>
                            <label for="balance">Balance: @money($payment_balance->balance)</label>
                        </div>
                        <button class="btn btn-normal" id="complete_installment_payment_btn">Pay now</button>
                        <a class="float-right txt-default mt-2" href="{{ url('/installment-orders/complete-payment') }}" id="fgpwd"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Back</a>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->






<!-- <script>

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





</script> -->