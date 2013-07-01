$(function(){
    $('#show_search').click(function(){
        if ($('#form_search').is(':hidden')) {
            $('#form_search').show(window.FADING_DURATION);
        } else {
            $('#form_search').hide(window.FADING_DURATION);
        }
    });
    initDatePiker();
    if ($('#type_search').val() === 'not_set') {
        $("#from, #to").prop('disabled', true);
        $("#no_time_given").prop('disabled', true);
    }
    $('#type_search').change(function(){
        var type_search = $(this).val();
        if (type_search !== 'not_set') {
            $("#from, #to").prop('disabled', false);
            $("#no_time_given").prop('disabled', false);
        } else {
            $("#from, #to").prop('disabled', true);
            $("#no_time_given").prop('disabled', true);
        }
    });
    $('#reset_button').click(function(){
        $('#status').val('All');
        $('#type_search').val('not_set');
        $('#from').val('');
        $('#to').val('');    
        $("#no_time_given").prop('checked', true);
    });
});

function initDatePiker() {
    var dates = $("#from, #to").datepicker({
        defaultDate: new Date(),
        dateFormat: 'dd/mm/yy',
        changeMonth: true,        
        onSelect: function(selectedDate) {
            var option = this.id === "from" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });
    $("#from").datepicker("setDate", $("#from").attr('date'));
    $("#to").datepicker("setDate", $("#to").attr('date'));
}