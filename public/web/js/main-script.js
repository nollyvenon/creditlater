$(document).ready(function(){

// GET WISHLIST ALERT ERROR 
// ----------------------------------------------
var wishlistError = $(".alert-content-bar");

if($(wishlistError).text().length > 0){
   // display error when screen is greater than 767px
    if($(window).width() > 767){
        $(wishlistError).css({
            transform: 'translate(0)'
        });

        setTimeout(remove_alert_size, 4000);
    
        function remove_alert_size(){
            $(wishlistError).css({
                transform: 'translate(400px)'
            });
        }
    }
    
    
    // display error when screen is less than 767px
    if($(window).width() < 767){
        $(wishlistError).css({
            top: '0px'
        });

        setTimeout(remove_alert_top, 4000);
    
        function remove_alert_top(){
            $(wishlistError).css({
                top: '-70px'
            });
        }
    }

}




// GET ALERT SUCCESS MESSAGE 
// ----------------------------------------------
var alertSuccess = $(".alert-success-content");
if($(alertSuccess).text().length > 0){
    // display error when screen is greater than 767px
     if($(window).width() > 767){
         $(alertSuccess).css({
             transform: 'translate(0)'
         });
 
         setTimeout(remove_succss_side, 4000);
     
         function remove_succss_side(){
             $(alertSuccess).css({
                 transform: 'translate(400px)'
             });
         }
     }
     
     
     // display error when screen is less than 767px
     if($(window).width() < 767){
         $(alertSuccess).css({
             top: '0px'
         });
 
         setTimeout(remove_success_top, 4000);
     
         function remove_success_top(){
             $(alertSuccess).css({
                 top: '-70px'
             });
         }
     }
 
 }








// -----------------------------------------------
// FUNCTION THAT HANDLES BRAND CHECK BUTTONS
// -----------------------------------------------

var filterField = $("#filterField");
var brand_id_field = $(filterField).find($("#formField #hiddenBrandField"));
var price_id_field = $(filterField).find($("#formField #hiddenPriceField"));

class Checked{
    constructor(string){
        var action = this;
        this.input_check = $(string).find($("#brandSection input"));
        this.price_check = $(string).find($("#priceFilter input"));
        this.btn = $(string).find($("#formField button"));


        $(this.input_check).on("click", function(){
            action.uncheck_brand_fields($(this));
            action.input_brand_id($(this));
        });

        $(this.price_check).on("click", function(){
            action.uncheck_price_fields($(this));
            action.input_price_id($(this));
        });

        

        this.btn.on("click", function(e){
            action.button_action(e);
        });

        
    }
 
    // uncheck brand input field
    uncheck_brand_fields(field){
        var inputs = $(filterField).find( $("#brandSection input"));
            $.each(inputs, function(index, current){
                if($(this).attr("id") != $(field).attr("id")){
                        $(this).prop("checked", false);
                    }
            });
    }

    // add brand id to hidden input field
    input_brand_id(field){
        var id = $(field).attr("id");
        $(brand_id_field).val(id);
        
        if($(field).is(':checked') == false){
            $(brand_id_field).val('');
        }

    }

 // uncheck price input field
    uncheck_price_fields(field){
        var inputs = $(filterField).find( $("#priceFilter input"));
        $.each(inputs, function(index, current){
            var ids = $(current).attr("id").split('-')[1];
            if(ids != $(field).attr('id').split('-')[1]){
                $(this).prop("checked", false);
            }
        });
    }

     // add brand id to hidden price field
    input_price_id(field){
        var price_id = $(field).attr("id").split("-")[1];
        $(price_id_field).val(price_id);
        if($(field).is(':checked') == false){
            $(price_id_field).val('');
        }
    }



    button_action(e){
        if($(brand_id_field).val() == "" && $(price_id_field).val() == ""){
            e.preventDefault();
            alert("Choose brand or price range");
        }
    }
    
}

var checked = new Checked(filterField);


// -----------------------------------------------
// FUNCTION THAT HANDLES THE QUICK VIEW MODAL
// -----------------------------------------------

var modalContainer = $("#quick-view");
var quickViewBtn = $(".quick-view-btn");
var closeBtn = $(".modal-body button.close");
var quickViewDropDwon = $("#quick_view_dropdown_modal");


    $(quickViewBtn).click(function(e){
        e.preventDefault();
        preloader();
        var product_id = $(this).attr("id");
        var url =  $(this).attr("href");

        csrf_token()   // gets page csrf token
        
        
        $.ajax({
            url: url,
            method: "post",
            data: {
                product_id: product_id
            },
            success: function (response){
                $("#quick_view_dropdown_modal").html(response)
            }
        });

    });


// preloader hides after one minute
function preloader(){
    setTimeout(function(){
        $(".quick-view-preloader").hide();
    }, 1500);
    $(".quick-view-preloader").show();
}

// hide preloader when modal is being closed
$(closeBtn).click(function(){
    $(".quick-view-preloader").hide();
});


// QUICK VIEW QUANTITY BUTTONS
// -------------------------------------------
var quickViewQtyBtn = $("#quick_view_dropdown_modal");
var quick_view_quantity = 1;

    // quntity plus  
    $(quickViewQtyBtn).on('click', '.quantity-right-plus', function(e){
        e.preventDefault();
        quick_view_quantity++;

        $("#quick_view_qty_container input").val(quick_view_quantity);
    });


     // quantity minus
     $(quickViewQtyBtn).on('click', '.quantity-left-minus', function(e){
        e.preventDefault();
       if(quick_view_quantity > 1){
            quick_view_quantity--;
            $("#quick_view_qty_container input").val(quick_view_quantity);
       }
    });


// click to activate quick view sizes buttons
var quickViewSizeBtn = $("#quick_view_dropdown_modal");
    $(quickViewSizeBtn).on('click', 'ul li', function(e){
        e.preventDefault();
        $(quickViewSizeBtn).find("ul li").removeClass('active');
        $(this).addClass('active');
        var size  = $(this).children().attr('id');

        $(quickViewSizeBtn).find("#detail_product_size").val(size); 
    });

   

// QUICK VIEW ADD TO CART
$(quickViewSizeBtn).on('click', '.quick-view-addToCart', function(e){
         e.preventDefault();
         var url = $(this).attr('href');
         var product_id = $(this).attr('id');
         var qty = $("#quick_view_quantity").val();
         var size = $(quickViewSizeBtn).find("#detail_product_size").val(); 

         csrf_token()   // gets page csrf token

        $.ajax({
             url: url,
             method: "post",
             data: {
                size: size,
                quantity: qty,
                product_id: product_id,
             },
             success: function (response){
                if(response.data){
                    location.reload();
                }
             }
        });
});





// REMMOVE NEW LABEL HOVER ON MOBILE SCREENS
// --------------------------------------------
 $(".product-box .new-label").css("height", 0);






//  PRODUCT STAR RATING SYSTEM
// --------------------------------------------
var starRating = $("#product_star_ratings i");
var ratingForm = $("#product_rating_form");

    $(starRating).click(function(e){
        var id = $(this).attr("id");

        remove_stars() //resets stars to none

        for(var i = 0; i < id; i++){
            $(starRating[i]).addClass('text-warning');
        }
    
        $(ratingForm).find('#star_rating_amount').val(id); //collects star value
    });

    function remove_stars(){
        $.each($(starRating), function(index, current){
            $(this).removeClass('text-warning');
            $(this).addClass('text-primary');
        });
    }



    




//  PRODUCT REVIEW
// ------------------------------------------
var addReview = $("#review_product_btn");
var productRatingForm = $('#product_rating_form');

    $(addReview).click(function(e){
        e.preventDefault();
      
        var url = $(this).attr("data-url");
        var star = $(productRatingForm).find(".star").val();
        var product_id = $(productRatingForm).find(".product_id").val();
        var name = $(productRatingForm).find(".product_review_name").val();
        var email = $(productRatingForm).find(".product_review_email").val();
        var title = $(productRatingForm).find(".product_review_title").val();
        var review = $(productRatingForm).find(".product_review_review").val();


        clear_alert_fields();
            
        csrf_token()   // gets page csrf token
    
        $.ajax({
            url: url,
            method: "post",
            data: {
                product_id: product_id,
                star: star,
                name: name,
                email: email,
                title: title,
                review: review
            },
            success: function (response){
               if(response.data == "quest"){
                   location.reload();
               }
               if(response.data == "reviewed"){
                    location.reload();
               }else if(response.data == "not-reviewed"){
                    location.reload();
               }

               $(".review-email").html(response.data.email);
               $(".review-name").html(response.data.name);
               $(".review-title").html(response.data.title);
               $(".review-review").html(response.data.review);
               
            }
        });

    });




// clears all input field errors on review form
function clear_alert_fields(){
    $(".review-email").html('');
    $(".review-name").html('');
    $(".review-title").html('');
    $(".review-review").html('');
}




// SIZE BOX SELECT FUNCTION
// --------------------------------------------
var size = $("#size_box ul li a");
$("#size_box").find("input").val($($(size)[0]).attr("id"))
$(size).click(function(e){
    e.preventDefault();
    var id = $(this).attr("id");
    $(size).parent().removeClass("active");
    $(this).parent().addClass("active");
    $(this).parent().parent().parent().find("input").val(id);
});






// CSRF PAGE TOKEN
function csrf_token(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
        }
    });
}








// ADD TO CART  USING AJAX
// --------------------------------------------
var addToCart = $(".product-buttons #add_to_cart");
var productQty = $("#detail_qty_box #product_qty");
$(addToCart).click(function(e){
    e.preventDefault();
    
    var qty = parseInt($(productQty).val());

    var url = $(this).attr("href");
    var product_id = $(this).attr("data-id");
    var size = $("#detail_product_size").val();

    
    csrf_token()   // gets page csrf token
    
    $.ajax({
        url: url,
        method: "post",
        data: {
            quantity: qty,
            product_id: product_id,
            size: size
        },
        success: function (response){
           if(response.data){
               location.assign($("#cart_part").attr('data-url'))               
           }
        }
    });

     
});









// DELETE ITEMS FROM CART
// -------------------------------------------------
var DeleteCartBtn = $(".delete-cart-item");
$(DeleteCartBtn).click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var url = $(this).attr('href');
    var size = $(this).attr('data-size');

    csrf_token()   // gets page csrf token


    $.ajax({
        url: url,
        method: "post",
        data: {
            product_id: id,
            size: size
        },
        success: function (response){
           if(response.data)
           {
               location.reload();
               get_cart_quantity();
           }
        }
    });
    
});






// INCREASE OR DECREASE CART QUNATITY
// -------------------------------------------

var quantity = $(".cart_item_quantity");
    $(quantity).click(function(e){
            var qty = $(this).val();
            var id = $(this).parent().attr('id');
            var url = $(this).parent().attr('data-url');
            var size = $(this).attr('data-size');
           

            csrf_token();

             $.ajax({
            url: url,
            method: 'post',
            data: {
              product_id: id,
              quantity: qty,
              size: size
            },
            success: function(response){
                if(response.data)
                {
                    location.reload();
                }
            }
        });
    }); 





// GET CART QUANTITY
// ------------------------------------------------
function get_cart_quantity(){
    var url = $("#get_cart_quantity").attr('data-url');

    csrf_token()   // gets page csrf token

    $.ajax({
        url: url,
        method: "post",
        data: {
            quantity: 'quantity'
        },
        success: function (response){
            $("#shopping_cart_quantity").html(response.cart_quantity);
            get_cart_dropdown(); //get cart dropdown
        }
    });
}



// QUICK ADD TO CART
// ------------------------------------------------
var quickAddToCartBtn = $(".quick-add-to-cartBtn");
    $(quickAddToCartBtn).click(function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url = $(this).attr('data-url');

        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                product_id: id,
                size: 'unspecified',
                quantity: 1
            },
            success: function (response){
                if(response.data){
                    get_cart_quantity()   //gets cart quantity
                }
               
            }
        });
    });





// GET CART DROPDOWN
// ------------------------------------------------
function get_cart_dropdown(){
    var url = $("#get_cart_dropdown").attr('data-url');

    csrf_token()   // gets page csrf token

    $.ajax({
        url: url,
        method: "post",
        data: {
           cart: 'cart'
        },
        success: function (response){
           $(".cart_item_container").html(response);
        }
    });
}






// QUICK DELETE CART DROPDOWN ITEM
// -------------------------------------------------
var deleteDropdownCartItem =    $('.cart_item_container');
    $(deleteDropdownCartItem).on('click', '.delete-cart-dropdown-item', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url = $(this).attr('href');
        var size = $(this).attr('data-size');


        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
               product_id: id,
               size: size
            },
            success: function (response){
               if(response.data){
                    get_cart_quantity()   //gets cart quantity
               }
            }
        });
    });






// SIDE LOGIN 
// -------------------------------------------------------------
var sideLoginBtn = $("#ajax_login_form");
var sideLoginError = $(".side-login-error");
    $(sideLoginError).hide();
    $(sideLoginBtn).find('#side_login_btn').click(function(e){
        e.preventDefault();
        $(sideLoginError).hide();
        $(sideLoginError).html('');

        var url = $(this).attr('href');
        var email = $(sideLoginBtn).find("#email").val();
        var password = $(sideLoginBtn).find("#password").val();
        
        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
               email: email,
               password: password
            },
            success: function (response){
                if(!response.data){
                    $(sideLoginError).show();
                    $(sideLoginError).html(response.errors);   
                }else{
                    location.reload();
                }
            }
        });

    });






// ADD TO WISH LIST IN DETAIL PAGE
// ------------------------------------------------------
var addToWishListBtn = $(".add-to-wishlist-btn");
    $(addToWishListBtn).click(function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        var url = $(this).attr('data-url');
        var size = $("#detail_product_size").val();
        var quantity = $("#detail_qty_box").find("#product_qty").val();
        var url_relocate = $("#get_wishlist_items").attr("data-url");

        
        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
              product_id: id,
              size: size,
              quantity: quantity
            },
            success: function (response){
               if(response.data){
                   location.assign(url_relocate);
               }
            }
        });
    })





// DELETE WISH LIST ITEM
// ---------------------------------------------------------
var deleteWishlistItem = $(".delete_wishlist_item");
     $(deleteWishlistItem).click(function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        var url = $(this).attr('href');
        var size = $(this).attr('data-size');

        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
              product_id: id,
              size: size
            },
            success: function (response){
                if(response.data){
                    location.reload();
                }
            }
        });
    });






// QUICK ADD TO WISH LIST
// ----------------------------------------------------------
var quickAddToWishList = $(".quick-add-to-wishlist");
    $(quickAddToWishList).click(function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var id = $(this).attr('id');
        var size = 'unspecified';
        var quantity = 1;

        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
              product_id: id,
              size: size,
              quantity: quantity
            },
            success: function (response){
               if(response.data){
                    wishlist_quantity();
                    get_wish_list();
               }
            }
        });
    });








// WISH LIST QUANTYT
// ----------------------------------------------------------
   function wishlist_quantity(){
       var url = $("#get_wishlist_items_quantity").attr('data-url');

       csrf_token()   // gets page csrf token

       $.ajax({
            url: url,
            method: "post",
            data: {
                quantity: 'quantity'
            },
            success: function (response){
                    $(".get-wishlist-qty").html(response.quantity+" item")
            }
       });
   }








   
// GET WISH LIST
// ------------------------------------------------------
function get_wish_list(){
    var url = $("#get_quick_wishlist_items").attr('data-url');

    csrf_token()   // gets page csrf token

    $.ajax({
        url: url,
        method: "post",
        data: {
           wishlist_items: 'wishlist_items'
        },
        success: function (response){
             $(".side-wishlist-container").html(response)
        }
    });
}






   
// QUICK DELETE WISHLIST ITEM
// ------------------------------------------------------
var quickDeleteWishList = $(".side-wishlist-container");
    $(quickDeleteWishList).on("click", ".quick-delete-wishlist-item", function(e){
        e.preventDefault();

        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var size = $(this).attr('data-size');


        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
               product_id: id,
               size: size
            },
            success: function (response){
                if(response.data){
                    get_wish_list();
                    wishlist_quantity();
                }
            }
        });
    });










// GET SHIPPING METHOD
// ------------------------------------------------------------
// var shiipingMethod = $(".shipping-method-check-box");
// var hiddenShippingMethod = $("#hidden_shipping_method");
    
//     $(shiipingMethod).click(function(e){
//             $(shiipingMethod).prop("checked", false)
//             $(this).prop("checked", true);
//             var value = $(this).attr("id").split('-');
//             var id = value[0]+" "+value[1];
//            $(hiddenShippingMethod).val(id);
//     });







    
// ADD WISHLIST ITEMS TO CART
// ------------------------------------------------------------
var wislistCartBtn = $(".add_wishlist-item-to-cart");
    $(wislistCartBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var size = $(this).attr('data-size');

        
        csrf_token()   // gets page csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
               product_id: id,
               size: size
            },
            success: function (response){
                if(response.data)
                {
                    location.reload();
                }
            }
        });
    })
  
   





 










    // end
});




















