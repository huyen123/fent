$(function(){ 
    $('.reject_request').click(function(){
        var request_id = $(this).attr('request_id');
        var value = $(this).attr('value');
        rejectOrAcceptRequest(request_id, value);
    });
});

function rejectOrAcceptRequest(request_id, value) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/rejectOrAccept';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
            value: value
        }
    }).success(function() {               
            $('#request_' + request_id).hide(400);
        }).fail(function() {            
            alert('Fail !');
        });
}

$(function(){
    $('.finish_request').click(function(){
        var request_id = $(this).attr('request_id');
        finishRequest(request_id);
    });
});

function finishRequest(request_id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/finish';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
        }
    }).success(function() {               
            $('#request_' + request_id).hide(400);
        }).fail(function() {            
            alert('Fail !');
        });
}