$(function(){ 
    initDatePiker();
    $('#reason-button').click(function(){
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
    $.ajax({
        type: 'POST',
        url: 'http://'+document.location.host+'?r=device/createRequest',
        data: {             
            device_id: device_id,
            reason: reason,
            date_from: date_from,
            date_to: date_to            
        }
    }).done(function(msg) {
        alert( "Request sent " + msg );
    });
}