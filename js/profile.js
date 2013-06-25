$(function(){ 
    $('#being_considered_requests_button').click(function(){
        var $being_considered_requests = $('#being_considered_requests');
        var count = $being_considered_requests.attr('count_consider');
        if ($being_considered_requests.is(':hidden')) {
            $('#being_considered_requests_button').val(' Hide being considered requests (' + count + ')');
            $being_considered_requests.show(window.FADING_DURATION);
        } else {
            $('#being_considered_requests_button').val('Show being considered requests (' + count + ')');
            $being_considered_requests.hide(window.FADING_DURATION);
        }
    });
});

$(function(){ 
    $('#accepted_requests_button').click(function(){
        var $accepted_request = $('#accepted_request');
        var count = $accepted_request.attr('count_accept');
        if ($accepted_request.is(':hidden')) {
            $('#accepted_requests_button').val('Hide accepted Requests (' + count + ')');
            $accepted_request.show(window.FADING_DURATION);
        } else {
            $('#accepted_requests_button').val('Show accepted Requests (' + count + ')');
            $accepted_request.hide(window.FADING_DURATION);
        }
    });
});

$(function(){ 
    $('#finished_requests_button').click(function(){
        var $finished_requests = $('#finished_requests');
        var count = $finished_requests.attr('count_finish');
        if ($finished_requests.is(':hidden')) {
            $('#finished_requests_button').val('Hide finished Requests (' + count + ')');
            $finished_requests.show(window.FADING_DURATION);
        } else {
            $('#finished_requests_button').val('Show finished Requests (' + count + ')');
            $finished_requests.hide(window.FADING_DURATION);           
        }
    });
});