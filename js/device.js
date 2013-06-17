$(function(){ 
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
            if (reason === '') {
                alert('Please fill in all fields !!!'); 
            } else {                              
                sendBorrowRequest(device_id, reason, date_from, date_to);
            }
        }); 
    }
});

function initDatePiker() {    
    var dateToday = new Date();
    var dates = $("#from, #to").datepicker({
        defaultDate: "+1w",
        dateFormat: 'dd/mm/yy',
        changeMonth: true,        
        minDate: dateToday,
        onSelect: function(selectedDate) {
            var option = this.id == "from" ? "minDate" : "maxDate",
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
            date_from: date_from,
            date_to: date_to            
        }
    }).success(function() {               
            afterSuccess();                    
        }).fail(function() {            
            afterFail();
        });
}

function afterSuccess() {
    $('#modal-success').addClass('active');
    $('#reason-textarea, #from, #to').val('');   
    disableForm();
}

function afterFail() {    
    $('#modal-fail').addClass('active');    
}

function disableForm() {
    $('#reason-textarea').attr('placeholder', 'You have already has a being considered reuqest. Delete it or wait for reply from admin before creating a new one.');
    $('#reason-textarea, #from, #to, #request-button').prop('disabled', true);
}