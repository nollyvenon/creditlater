

$(document).ready(function(){

// BRAND DELETE FUNCTION
var brandDeleteBtn = $(".vendor_delete_brand"); 
    $(brandDeleteBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');

        csrf_token() //csrf token
        
        var confirmed = confirm("Do you want to delete this brand?");
        if(confirmed == true){
            delete_brand(url, id);
        }
        
    });


function delete_brand(url, id){
    $.ajax({
        url: url,
        method: "post",
        data: {
            brand_id: id
        },
        success: function (response){
          if(response.data){
              location.reload();
          }
        }
    });
}




// CSRF PAGE TOKEN
function csrf_token(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
        }
    });
}




// BRAND FEATURE FUNCTION
var brandFeatureBtn = $(".vendor_feature_brand");
    $(brandFeatureBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');

        csrf_token() //csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                brand_id: id
            },
            success: function (response){
                if(response.data){
                    location.reload();
                }
            }
        });
        
    });







var brandEditBtn = $(".vendor_brand_edit");
    $(brandEditBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var brand_name = $(this).attr('data-val');

        $("#edit_brand_input").val(brand_name);
        $(".confirm_edit_brand_btn").attr('id', id);

        csrf_token() //csrf token

       

    });


var brandModalBtn = $(".confirm_edit_brand_btn")
    $(brandModalBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var brand_name = $("#edit_brand_input").val();
        $(".brand-edit-error").html('');

        csrf_token() //csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                brand_id: id,
                brand_name: brand_name
            },
            success: function (response){
               if(response.error)
               {
                   $(".brand-edit-error").html(response.error.brand);
               }else if(response.data){
                   location.reload()
               }
            }
        });
    });





// CATEGROY FEATUER FUNCTION
var $categoryFeatureBtn = $(".category_feature_btn");
    $($categoryFeatureBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');

        csrf_token() //csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                category_id: id,
            },
            success: function (response){
                if(response.data){
                    location.reload()
                }
            }
        });
    });

   



// CATEGORY DELETE FUNCTION
var categoryDelete = $(".category_delete_btn");
    $(categoryDelete).click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('id');

        csrf_token() //csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                category_id: id,
            },
            success: function (response){
                if(response.data){
                    location.reload();
                }
            }
        });
    });



// get category id in put it in  edit modal box dropdown
var categoryEditBtn = $(".category_edit_btn");
    $(categoryEditBtn).click(function(e){
        e.preventDefault();
        var id  = $(this).attr('id');
        var category_name  = $(this).attr('data-val');

        $(".category-edit-error").html('');
        $(".confirm_edit_category_btn").attr('id', id);
        $("#edit_category_name_input").val(category_name);
    });




// CATEGORY EDIT FUNCTION
var categoryBtn = $(".confirm_edit_category_btn");
    $(categoryBtn).click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        var id = $(this).attr("id");
        var category_name = $("#edit_category_name_input").val();
        
        csrf_token() //csrf token

        $.ajax({
            url: url,
            method: "post",
            data: {
                category_id: id,
                category_name: category_name
            },
            success: function (response){
               if(response.error){
                   $(".category-edit-error").html(response.error)
               }else if(response.data){
                   console.log(response.data)
               }
            }
        });
    });




















    // end
});