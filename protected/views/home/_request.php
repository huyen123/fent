<div class="row" id="request_<?php echo $request->id; ?>">
    <div class="two columns">
        <?php echo CHtml::link(CHtml::encode($request->user->username), array('profile/view', 'id' => $request->user->profile->id)); ?>
    </div>
    <div class="two columns crop">
        <?php echo CHtml::link(CHtml::encode($request->device->name), array('device/view', 'id' => $request->device->id)); ?>
    </div>
    <div class="two columns">
        <?php
            if ($request->status == 0){
                echo DateAndTime::returnTime($request->request_start_time, 'd/m/Y');
            } else {
                echo DateAndTime::returnTime($request->start_time, 'd/m/Y');
            }
        ?>
    </div>
    <div class="two columns">
        <?php echo DateAndTime::returnTime($request->request_end_time, 'd/m/Y'); ?>
    </div>
    <?php
        if ($request->status == 1){
            echo '<div class="two columns">';
            $date1 = new DateTime(DateAndTime::returnTime($request->request_end_time, 'Y/m/d'));
            $date2 = new DateTime(DateAndTime::returnTime($timestamp, 'Y/m/d'));
            $interval = date_diff($date1, $date2);
            echo $interval->days.' days';
            echo '</div>';
            echo '<div class="two columns">';
            echo '<span class="small pretty primary btn">';
            echo CHtml::button('View more', array('submit' => '#'));
            echo '</span>';
            echo '</div>';
        } else {
            echo '<div class="two columns">';
            echo '<span class="small pretty primary btn">';
            echo CHtml::button('View more', array('submit' => Yii::app()->createUrl('request/view', array('id' => $request->id))));
            echo '</span>';
            echo '</div>';
            echo '<div class="one columns">';
            echo '<span class="small pretty success btn">';
            echo CHtml::button('Accept', array('class' => 'reject_request', 'request_id' => $data->id));
            echo '</span>';
            echo '</div>';
            echo '<div class="one columns">';
            echo '<span class="small pretty danger btn">';
            echo CHtml::button('Reject', array('class' => 'reject_request', 'request_id' => $request->id));
            echo '</span>';
            echo '</div>';
        }
    ?>
</div>