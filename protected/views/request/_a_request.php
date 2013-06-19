<div class="row">
    <div class="two columns">
        <?php echo $request->device->createViewLink(); ?>
        </p>
    </div>
    <div class="two columns" >
        <?php echo DateAndTime::returnTime($request->start_time, 'd/m/Y'); ?>
    </div>
    <div class="three columns" >
        <?php echo DateAndTime::returnTime($request->request_end_time, 'd/m/Y'); ?>
    </div>
    <div class="two columns">
        <?php 
            $date1 = new DateTime(DateAndTime::returnTime($request->request_end_time, 'Y/m/d'));
            $date2 = new DateTime(DateAndTime::returnTime($timestamp, 'Y/m/d'));
            $interval = date_diff($date1, $date2);
            if ($date1 >= $date2){
               echo $interval->days; 
            }else{
        ?>
    </div>
    <div class="two columns">
        <?php 
               echo $interval->days; 
            }
        ?>
    </div>
</div>
