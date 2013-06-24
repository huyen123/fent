$(function(){ 
    $('.reject_request').click(function(){
        var request_id = $(this).attr('request_id');
        var value = $(this).attr('value');
        rejectRequestAtHomepage(request_id, value);
    });
});

$(function(){ 
    $('.accept_request').click(function(){
        var request_id = $(this).attr('request_id');
        var value = $(this).attr('value');
        acceptRequestAtHomepage(request_id, value);
    });
});

function rejectRequestAtHomepage(request_id, value) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/rejectOrAccept';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
            value: value
        }
    }).success(function() {               
            $('#request_' + request_id).hide(window.FADING_DURATION);
        }).fail(function() {            
            alert('Fail !');
        });
}

function acceptRequestAtHomepage(request_id, value) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/rejectOrAccept';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
            value: value
        }
    }).success(function() {               
            location.reload();
        }).fail(function() {            
            alert('Fail !');
        });
}

$(function(){
    $('.finish_request').click(function(){
        var request_id = $(this).attr('request_id');
        finishRequestAtHome(request_id);
    });
});

function finishRequestAtHome(request_id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/finish';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id
        }
    }).success(function() {               
            $('#request_' + request_id).hide(window.FADING_DURATION);
        }).fail(function() {            
            alert('Fail !');
        });
}