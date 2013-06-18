$(function(){
   $('#request_type_selecter').change(function(){
       var status = $(this).val();
       if (status !== 'All') {
           $('.a_request').not('[status_code="'+status+'"]').hide(500);
           $('[status_code="'+status+'"]').show(500);
       } else {
           $('.a_request').show(500);
       }
   }); 
});

