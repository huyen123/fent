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
    initDatePiker();
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
            $('#status').fadeOut(window.FADING_DURATION, function(){
                $('#status').html('Un-expired');
                $('#status').fadeIn(window.FADING_DURATION);
            });
            $('#start_time').html(getDateFormat(new Date()));
            $('#button_group').hide(window.FADING_DURATION);
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
            $('#status').fadeOut(window.FADING_DURATION, function(){
                $('#status').html('Rejected');
                $('#status').fadeIn(window.FADING_DURATION);
            });
            $('#button_group').hide(window.FADING_DURATION);
        }).fail(function() {            
            alert('Fail !');
        });
}

$(function(){
    $('.finish_request_btn').click(function(){
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
            $('#status').fadeOut(window.FADING_DURATION, function(){
                $('#status').html('Finished');
                $('#status').fadeIn(window.FADING_DURATION);
            });
            $('#end_time').html(getDateFormat(new Date()));
            $('#finish_button').hide(window.FADING_DURATION);
        }).fail(function() {            
            alert('Fail !');
        });
}

function subDatePiker(input){
        var time = input.attr('request_start_time');
        input.datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            minDate: time,
            onSelect: function() {
                var date_end = input.datepicker('getDate');
                var request_id = input.attr('request_id');
                editRequest(date_end, request_id);
            }
        });
    }

function initDatePiker(id) {
    if (id === undefined) {
        $('.date_end').each(function(){
            subDatePiker($(this));
        });
    } else {
        $('#date_end_' + id).each(function(){
            subDatePiker($(this));
        });
    }
}

function editRequest(date_end, request_id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=request/editEndTime';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            date_end: getDateFormat(date_end, '-'),
            request_id: request_id
        }
    }).success(function() {
        location.reload();
        }).fail(function() {            
            alert('No');
        });
}