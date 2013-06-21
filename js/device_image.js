$(function(){
    $('.remove_btn').click(function(){
        var answer = confirm('Are you sure you want to delete this image?');
        if (answer) {
            var file_name = $(this).attr('file_name');
            var device_id = $(this).attr('device_id');
            var div_id = $(this).attr('div_id');
            removeFile(file_name, device_id, div_id);
        }
    });
});

function removeFile(file_name, device_id, div_id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=device/removeImageViaPost';                
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id: device_id,
            file: file_name,
        }
    }).success(function() {
            $('#' + div_id).hide(window.FADING_DURATION);
        }).fail(function() {            
            alert('Fail !');
        });
}