

@if(Session::has('cart'))


<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form action="{{ url('/installments') }}" method="post">
                    <div class="row">
                    
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="theme-form">
                                <div class="row check-out ">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        @if($errors->first('first_name'))
                                        <div class="text-danger">{{ $errors->first('first_name')}}</div>
                                        @endif
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="" placeholder="First name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                       @if($errors->first('last_name'))
                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                        @endif
                                        <label>Last Name</label>
                                        <input type="text" name="last_name"  value="" placeholder="Last name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        @if($errors->first('phone'))
                                        <div class="text-danger">{{ $errors->first('phone')}}</div>
                                        @endif
                                        <label class="field-label">Phone</label>
                                        <input type="text" name="phone" value="" placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        @if($errors->first('email'))
                                        <div class="text-danger">{{ $errors->first('email')}}</div>
                                        @endif
                                        <label class="field-label">Email Address</label>
                                        <input type="text" name="email" value="" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                       @if($errors->first('address'))
                                        <div class="text-danger">{{ $errors->first('address')}}</div>
                                        @endif
                                        <label class="field-label">Address</label>
                                        <input type="text" name="address" value="" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        @if($errors->first('city'))
                                        <div class="text-danger">{{ $errors->first('city')}}</div>
                                        @endif
                                        <label class="field-label">Town/City</label>
                                        <input type="text" name="city" value="" placeholder="City">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        @if($errors->first('state'))
                                        <div class="text-danger">{{ $errors->first('state')}}</div>
                                        @endif
                                        <label class="field-label">State</label>
                                        <input type="text" name="state" value="" placeholder="State">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        @if($errors->first('country'))
                                        <div class="text-danger">{{ $errors->first('country')}}</div>
                                        @endif
                                        <label class="field-label">County</label>
                                        <input type="text" name="country" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        @if($errors->first('postal_code'))
                                        <div class="text-danger">{{ $errors->first('postal_code')}}</div>
                                        @endif
                                        <label class="field-label">Postal Code</label>
                                        <input type="text" name="postal_code" value="" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach(Session::get('cart')->_items as $values)
                                        @php($cart_item = $values['product'])
                                        @php($total = $values['quantity'] * $cart_item['products_price'])
                                        <li>{{ $cart_item['products_name'] }} × {{ $values['quantity'] }} <span>@money($total) </span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">@money(Session::get('cart')->_totalPrice)</span></li>
                                        <li>Shipping
                                            <div class="shipping">
                                                @if($errors->first('shipping'))
                                                <div class="text-danger" style="font-size: 12px;">{{ $errors->first('shipping')}}</div>
                                                @endif
                                               
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="shipping"  class="shipping-method-check-box" value="free shipping">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="shopping-option">

                                                    <input type="checkbox" name="shipping" class="shipping-method-check-box" value="local pickup">
                                                    <label for="local-pickup">Local Pickup</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total: <span class="count"><b>@money(Session::get('cart')->_totalPrice)</b></span></li>
                                        <li>Maximum installments: <span class="count">{{ $installments }}</span></li>
                                        <li>Initial payment allowed: <span class="count">@money($initial_payment)</span></li>
                                    </ul>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        @if(Session::has('amount_error'))
                                        <div class="text-danger">{{ Session::get('amount_error') }}</div>
                                        @endif
                                        @if($errors->first('amount'))
                                        <div class="text-danger">{{ $errors->first('amount')}}</div>
                                        @endif
                                        <label class="field-label">Amount</label>
                                        <input type="hidden" name="count" value="{{ $installments }}">
                                        <input type="number" min='1' name="amount" value="" placeholder="Amount">
                                    </div>
                                    </div>
                                </div>
                                    <div class="text-right">
                                        @if(Session::has('verification_error'))
                                        <div class="alert-danger p-3 mb-3 text-center">
                                            You have not registered for installment yet.
                                            Click <a href="{{ url('/verification') }}" style="color: orangered"> Register</a> to be able to pay installment
                                        </div>
                                        @endif
         
                                        <a href="{{ url('/checkout') }}" class="btn-normal btn" id="pay_installment_btn" data-url="">One time payment</a>
                                        <button type="submit" class="btn-normal btn">Place order</button>
                                        <!-- <a href="#"  id="place_order_btn" data-url="{{ url('/paystack-payment') }}">Place Order</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>













<!--pay stack popup -->
 <script src="https://js.paystack.co/v1/inline.js"></script>  

<script>

    
// CHECK FOR VERIFICATION 
// -----------------------------------------------------------
// var installmentBtn = ("#pay_installment_btn");
//     $(installmentBtn).click(function(e){
//         e.preventDefault();
//         check_verification();
//     });


//         // laravel  csrf token 
//         function csrf_token(){
//             $.ajaxSetup({
//                 headers: {
//                     "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
//                 }
//             });
//         }


//     // check for verification
//     function check_verification(){

//         var url = $("#get_installment_verification_url").attr('data-url');
 
//         csrf_token()   // gets page csrf token
 
//         $.ajax({
//             url: url,
//             method: "post",
//             data: {
//                verify: 'verify'
//             },
//             success: function (response){
//                 if(!response.data){
//                     $('.verification-div-hidden').show();
//                 }else if(response.data == 'not_approved'){
//                     $(".verification-not-approved-div-hidden").show();
//                 }else{
//                     get_installment_details();
//                 }
//             }
//         });
//     }



//     function get_installment_details(){
//         var error_message = $(".verification-alert").html('');
//         var url = $("#get_installment_payment_url").attr('data-url');
//         var first_name = $("#installment_first_name").val();
//         var last_name = $("#installment_last_name").val();
//         var phone = $("#installment_phone").val();
//         var email = $("#installment_email").val();
//         var state = $("#installment_state").val();
//         var city = $("#installment_city").val();
//         var address = $("#installment_address").val();
//         var country = $("#installment_country").val();
//         var postal_code = $("#installment_postal_code").val();
//         var shipping = $("#hidden_shipping_method").val();
//         var initial_payment = $("#installment_initial_payment_field").val();

//         csrf_token()   // gets page csrf token

//          $.ajax({
//                     url: url,
//                     method: 'post',
//                     data: {
//                          first_name: first_name,
//                          last_name: last_name,
//                          phone: phone,
//                          email: email,
//                          state: state,
//                          city: city,
//                          address: address,
//                          country: country,
//                          postal_code: postal_code,
//                          shipping: shipping,
//                          initial_payment: initial_payment
//                     },
//                     success: function(response){
//                         if(response.errors){
//                             if(response.errors.first_name){
//                                 $(".checkout_alert_0").html("*"+response.errors.first_name);
//                             }
//                             if(response.errors.last_name){
//                                 $(".checkout_alert_1").html("*"+response.errors.last_name);
//                             }
//                             if(response.errors.phone){
//                                 $(".checkout_alert_2").html("*"+response.errors.phone);
//                             }
//                             if(response.errors.email){
//                                 $(".checkout_alert_3").html("*"+response.errors.email);
//                             }
//                             if(response.errors.address){
//                                 $(".checkout_alert_5").html("*"+response.errors.address);
//                             }
//                             if(response.errors.city){
//                                 $(".checkout_alert_6").html("*"+response.errors.city);
//                             }
//                             if(response.errors.country){
//                                 $(".checkout_alert_7").html("*"+response.errors.country);
//                             }
//                             if(response.errors.postal_code){
//                                 $(".checkout_alert_8").html("*"+response.errors.postal_code);
//                             }
//                             if(response.errors.shipping){
//                                 $(".checkout_alert_9").html("*"+response.errors.shipping);
//                             }
//                             if(response.errors.initial_payment){
//                                 $(".checkout_alert_10").html("*"+response.errors.initial_payment);
//                             }
//                        }else if(response.data){
//                             payWithPaystack(response.initial_payment);
//                        }
//                     }
//                 });

//     }






// // pay with paystack
// var user_email = $("#installment_method_email").val();

// function payWithPaystack(initial_payment) {
//         // e.preventDefault();
//         let handler = PaystackPop.setup({
//         key: 'pk_test_42550ade26808bb2d47dde8ab5f2f897fce81eea', // Replace with your public key
//         email: user_email,
//         amount: initial_payment * 100,
//         ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
//         // label: "Optional string that replaces customer email"
//         onClose: function(){
//         alert('Window closed.');
//         },

//         callback: function(response){
//         let message = response.reference;
//         __store_paid_products(message);
//         }

//     });
//         handler.openIframe();
//     }




//  // store paid  items after payment have been made 
//  function __store_paid_products(reference){
//         var url = $("#store_intallment_items_url").attr('data-url');

//         csrf_token() //laravel csfr token

//         $.ajax({
//             url: url,
//             method: 'post',
//             data: {
//                installment: 'installment',
//                reference: reference
//             },
//             success: function(response){
//                if(response.data){
//                    location.reload();
//                }
//             }
//         });
        
//     }


</script>















<!-- section end -->
@endif
