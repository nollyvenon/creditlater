

$(document).ready(function(){
   
//   BUYER PROFILE PAGE SWITCHER
//-------------------------------------------------------------
var buyerBtn = $(".buyer-profile-btn");
var profiles = $(".buyer_profile_container");
var n = 0;
    function hide_profile(n){
          for(var i = 0; i < profiles.length; i++){
            $(profiles[i]).hide();
          }

          $(profiles[n]).show();
    }
    hide_profile(n);

   

    $.each($(buyerBtn), function(index, current){
        $(this).click(function(e){
            e.preventDefault();
            hide_profile(index);
        });
    });



















    // end of document.ready
});