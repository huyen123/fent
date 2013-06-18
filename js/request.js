$(function(){ 
    $('.reject_request').click(function(){
        var request_id = $(this).attr('request_id');
        rejectRequest(request_id);
    });
});

function rejectRequest(request_id){
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/reject';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id           
        }
    }).success(function() {               
            $('#request_' + request_id).hide(400);
        }).fail(function() {            
            alert('No !');
        });
}