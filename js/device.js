$(function(){ 
    $('#like-button').click(function(){
        var device_id = $('#reason-textarea').attr('device_id');
        sendLikeOrUnlikeRequest(device_id);
    });
    $('#being_considered_requests_button').click(function(){
        var count = $('#being_considered_requests').attr('count_consider');
        if ($('#being_considered_requests').is(':hidden')) {
            $('#being_considered_requests_button').val('Hide being considered Requests (' + count + ')');
            $('#being_considered_requests').show(window.FADING_DURATION);
        } else {
            $('#being_considered_requests_button').val('Show being considered Requests (' + count + ')');
            $('#being_considered_requests').hide(window.FADING_DURATION);
        }
    });
    var existed = $('#request_form').attr('request_existed');    
    if (existed === '1') {
        disableForm();
    } else {
        initDatePiker();
        $('#request-button').click(function(){
            var device_id = $('#reason-textarea').attr('device_id');
            var reason = $('#reason-textarea').val();   
            var date_from = $('#from').datepicker('getDate');
            var date_to = $('#to').datepicker('getDate');        
            alert(date_from);
            //return;
            if (reason === '') {
                alert('Please fill in all fields !!!'); 
            } else {                              
                sendBorrowRequest(device_id, reason, date_from, date_to);
            }
        }); 
    }
});

$(function(){ 
    $('#finished_requests_button').click(function(){
        var count = $('#finished_requests').attr('count_finish');
        if ($('#finished_requests').is(':hidden')) {
            $('#finished_requests_button').val('Hide finished Requests (' + count + ')');
            $('#finished_requests').show(window.FADING_DURATION);
        } else {
            $('#finished_requests_button').val('Show finished Requests (' + count + ')');
            $('#finished_requests').hide(window.FADING_DURATION);
        }
    });
});

function initDatePiker() {    
    var dateToday = new Date();
    var dates = $("#from, #to").datepicker({
        defaultDate: "+1w",
        dateFormat: 'dd/mm/yy',
        changeMonth: true,        
        minDate: dateToday,
        onSelect: function(selectedDate) {
            var option = this.id === "from" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });
}

function sendBorrowRequest(device_id, reason, date_from, date_to) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=device/createRequest';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            device_id: device_id,
            reason: reason,
            date_from: getDateFormat(date_from, '-'),
            date_to: getDateFormat(date_to, '-')
        }
    }).success(function(request_id) {               
            afterSuccess(date_from, date_to, request_id); 
        }).fail(function() {            
            afterFail();
        });
}

function afterSuccess(date_from, date_to, request_id) {
    $('#modal-success').addClass('active');
    $('#reason-textarea, #from, #to').val('');   
    disableForm();
    var count = $('#being_considered_requests').attr('count_consider');
    count = parseInt(count);
    count = count + 1;
    $('#being_considered_requests').attr('count_consider', count);
    $('#being_considered_requests_button').val('Show being considered Requests (' + count + ')');
    $('#showbtn').show(window.FADING_DURATION);
    var html = newRequestHtml(date_from, date_to, request_id);
    $('#being_considered_requests').append(html);
    
}

function newRequestHtml(date_from, date_to, request_id) {
    var profile = $('#being_considered_requests').attr('current_profile');
    var profile_link = createUrl('profile', profile);
    var name = $('#being_considered_requests').attr('current_user');
    var html = '<div class="row"><a href="' + profile_link + '">' + name + '</a> has  sent a request to borrow this device';
    if (date_from !== null) {
        html += ' from ' + getDateFormat(date_from);
    }
    if (date_to !== null) {
        html += ' to ' + getDateFormat(date_to);
    }
    html += '. Request created at ' + getDateFormat(new Date());
    var request_link = createUrl('request', request_id);
    html += '. <a href="'+ request_link + '">View more</a></div>';
    return html;
}

function createUrl(controller, id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r='; 
    url += controller + '/view&id=' + id;
    return url;
}

function getDateFormat(date, format) {
    if (date === null) {
        return null;    
    }
    if (format === undefined) {
        format = '/';
    }
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!
    var yyyy = date.getFullYear();
    if(dd < 10){
        dd = '0' + dd;
    } 
    if(mm < 10){
        mm = '0' + mm;
    } 
    return '' + dd + format + mm + format + yyyy;
}

function afterFail() {    
    $('#modal-fail').addClass('active');    
}

function disableForm() {
    $('#reason-textarea').attr('placeholder', 'You have already has a being considered reuqest. Delete it or wait for reply from admin before creating a new one.');
    $('#reason-textarea, #from, #to, #request-button').prop('disabled', true);
}

function sendLikeOrUnlikeRequest(device_id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=device/like';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {             
            device_id: device_id            
        }
    }).success(function() {               
            changeLikeButton();
        }).fail(function() {            
            alert('Fail !');
        });
}

function changeLikeButton() {
    if ($('#like-button').val() === 'Like') {
        $('#like-button').parent().removeClass('primary').addClass('danger');
        $('#like-button').val('Unlike');
    } else {
        $('#like-button').parent().removeClass('danger').addClass('primary');
        $('#like-button').val('Like');
    }
}