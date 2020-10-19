$(document).ready(function(){
    
// FUNCTION THAT CHECKS OR UNCHECK THE BRAND FIELD
// -----------------------------------------------
var brand = $("#brandSection .collection-filter-checkbox input");
var filterField = $("#filterField");
var btn = $("#formField");


    $.each(brand, function(index, current){
         $(this).prop("checked", false);  //unckecks all brand checkbox

    });

     // check clicked brand
    $(brand).click(function(e){
        var brand_id = parseInt($(this).attr("id"));
        $(brand).prop("checked", false);
        $(this).prop("checked", true);
        
        $(filterField).find($("#hiddenBrandField")).val(brand_id);
    });

    // show alert message if brand is not selected
    $(btn).click(function(e){
        if( $(filterField).find($("#hiddenBrandField")).val() == ""){
            e.preventDefault();
            alert("Select a field to filter!");
        }
    });
   


























    // end
});

