$(function(){ 
    $('.reject_request_btn').click(function(){
        var request_id = $(this).attr('request_id');
        var value = $(this).attr('value');
        rejectRequest(request_id, value);
    });
    $('.accept_request_btn').click(function(){
        var request_id = $(this).attr('request_id');
        var value = $(this).attr('value');
        acceptRequest(request_id, value);
    });
});

function acceptRequest(request_id, value) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/rejectOrAccept';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
            value: value
        }
    }).success(function() {     
            $('#status').fadeOut(500, function(){
                $('#status').html('Un-expired');
                $('#status').fadeIn(500);
            });
            $('#start_time').html(getDate());
            $('#button_group').hide(500);
        }).fail(function() {            
            alert('Fail !');
        });
}

function rejectRequest(request_id, value) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/rejectOrAccept';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            request_id: request_id,
            value: value
        }
    }).success(function() { 
            $('#status').fadeOut(500, function(){
                $('#status').html('Rejected');
                $('#status').fadeIn(500);
            });
            $('#button_group').hide(500);
        }).fail(function() {            
            alert('Fail !');
        });
}

function getDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd < 10){
        dd = '0' + dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    return dd+'/'+mm+'/'+yyyy;
}