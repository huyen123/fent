$(function(){
    addDeleteListener();
});

function addDeleteListener(notification_btn){    
    if (notification_btn !== undefined) {
        var delete_notificaiton = notification_btn;
    } else {
        var delete_notificaiton = '.delete_notification';
    }
    $(delete_notificaiton).click(function(){
        var notification_id = $(this).attr('notification_id');
        deleteNotification(notification_id);    
    });
};

function deleteNotification(notification_id) {
   var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=notification/delete';
   $.ajax({
       type: 'POST',
       url: url,
       data: {
           notification_id: notification_id,
       }
   }).success(function(){
           $('#notification_' + notification_id).hide(window.FADING_DURATION);
       }).fail(function() {
           alert('lost');
       });
}