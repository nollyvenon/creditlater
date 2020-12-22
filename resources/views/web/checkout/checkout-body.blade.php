

@if(Session::has('cart'))


<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form action="{{ url('/checkout') }}" method="post">
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
                                                <div class="">
                                                    <input type="hidden" name="amount" value="{{ Session::get('cart')->_totalPrice }}">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total: <span class="count"><b>@money(Session::get('cart')->_totalPrice)</b></span></li>
                                    </ul>
                                </div>
                                    <div class="text-right">
                                        
                                        <a href="{{ url('/installments') }}" class="btn-normal btn" id="pay_installment_btn" data-url="">Pay installment</a>
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
<!-- section end -->
@endif





 <script src="https://js.paystack.co/v1/inline.js"></script>
<script>
        
    //     var placeOrderBtn = $("#place_order_btn");
    //     var total_amount = $("#cart_item_total_price").val();
    //     var user_email = $("#user_chechout_email").val();

    //         $(placeOrderBtn).click(function(e){
    //             e.preventDefault();
    //             var error_message = $(".verification-alert").html('');
    //             var url = $("#get_validate_form").attr('data-url');
    //             var first_name = $("#checkout_first_name").val();
    //             var last_name = $("#checkout_last_name").val();
    //             var phone = $("#checkout_phone").val();
    //             var email = $("#buyer_checkout_email").val();
    //             var state = $("#buyer_checkout_city").val();
    //             var city = $("#buyer_checkout_city").val();
    //             var address = $("#buyer_checkout_address").val();
    //             var country = $("#buyer_country").val();
    //             var postal_code = $("#buyer_postal_code").val();
    //             var shipping = $("#hidden_shipping_method").val();
               
                
    //             csrf_token() //laravel csfr token

    //             $.ajax({
    //                 url: url,
    //                 method: 'post',
    //                 data: {
    //                      first_name: first_name,
    //                      last_name: last_name,
    //                      phone: phone,
    //                      email: email,
    //                      state: state,
    //                      city: city,
    //                      address: address,
    //                      country: country,
    //                      postal_code: postal_code,
    //                      shipping: shipping,
    //                      amount: total_amount
    //                 },
    //                 success: function(response){
    //                    if(response.errors){
    //                         if(response.errors.first_name){
    //                             $(".checkout_alert_0").html("*"+response.errors.first_name);
    //                         }
    //                         if(response.errors.last_name){
    //                             $(".checkout_alert_1").html("*"+response.errors.last_name);
    //                         }
    //                         if(response.errors.phone){
    //                             $(".checkout_alert_2").html("*"+response.errors.phone);
    //                         }
    //                         if(response.errors.email){
    //                             $(".checkout_alert_3").html("*"+response.errors.email);
    //                         }
    //                         if(response.errors.address){
    //                             $(".checkout_alert_5").html("*"+response.errors.address);
    //                         }
    //                         if(response.errors.city){
    //                             $(".checkout_alert_6").html("*"+response.errors.city);
    //                         }
    //                         if(response.errors.country){
    //                             $(".checkout_alert_7").html("*"+response.errors.country);
    //                         }
    //                         if(response.errors.postal_code){
    //                             $(".checkout_alert_8").html("*"+response.errors.postal_code);
    //                         }
    //                         if(response.errors.shipping){
    //                             $(".checkout_alert_9").html("*"+response.errors.shipping);
    //                         }
    //                    }else if(response.data){
    //                        payWithPaystack();
    //                    }
    //                 }
    //             });
    //         });

       
    //     // laravel  csrf token 
    //      function csrf_token(){
    //         $.ajaxSetup({
    //             headers: {
    //                 "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
    //             }
    //         });
    //     }


        
    // function payWithPaystack(e) {
    //     // e.preventDefault();
    //     let handler = PaystackPop.setup({
    //     key: 'pk_test_42550ade26808bb2d47dde8ab5f2f897fce81eea', // Replace with your public key
    //     email: user_email,
    //     amount: total_amount * 100,
    //     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    //     // label: "Optional string that replaces customer email"
    //     onClose: function(){
    //     alert('Window closed.');
    //     },

    //     callback: function(response){
    //     let message = response.reference;
    //     __store_paid_products(message);
    //     }

    // });
    //     handler.openIframe();
    // }



    // // ajax function that stores the bougth items after payment have been made 
    // function __store_paid_products(message){
    //     var url = $(placeOrderBtn).attr('data-url');

    //     csrf_token() //laravel csfr token

    //     $.ajax({
    //         url: url,
    //         method: 'post',
    //         data: {
    //            payment: 'payment',
    //            reference: message
    //         },
    //         success: function(response){
    //             if(response.data){
    //                 location.reload();
    //                 // _show_order_succss(message);
    //             }
    //         }
    //     });
        
    // }



//   var orderSuccess = $("#get_order_success_page");
//       $(orderSuccess).click(function(e){
//           e.preventDefault();

//           _show_order_succss()
//       })
//     function _show_order_succss(){
//         var url = $("#get_order_success_page_url").attr('data-url');

//         csrf_token() //laravel csfr token

//         $.ajax({
//             url: url,
//             method: 'post',
//             data: {
//             reference: '773431461'
//             },
//             success: function(response){
//                console.log(response)
//             }
//         });
//     }

// _show_order_succss();
</script>



















