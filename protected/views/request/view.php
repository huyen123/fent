<div class="row">
    <div class="row">
        <?php 
            echo CHtml::label('Username: ', null); 
            echo $request->user->username ;
        ?>
    </div>
    <div class="row">
        <?php 
            echo CHtml::label('Device: ', null); 
            echo $request->device->name ;
        ?>
    </div>
    <HR/>
    <div class="row">
        <div class="two columns">
            <?php
            echo CHtml::label('Detail Request: ', null);
            echo "</br>" ;
            ?>
        </div>
        <div class="six columns" style="word-wrap: break-word;">
            <?php echo CHtml::label('Status:', null); ?><br />
            <?php 
                if ($request->status == Constant::$REQUEST_BEING_CONSIDERED){
                    $status = 'Waiting';
                } elseif ($request->status == Constant::$REQUEST_FINISH) {
                    $status = 'Finished';
                } elseif ($request->status == Constant::$REQUEST_REJECTED) {
                    $status = 'Rejected';
                } else {
                    $timestamp = time();
                    if ($request->request_end_time < $timestamp){
                        $status = 'Expired';
                    } else {
                        $status = 'Un-expired';
                    }
                }
                echo $status;
            ?>
            <br />
            <br />
            <?php echo CHtml::label('Reason:', null); ?>
            <span class="textarea"><?php echo $request->reason; ?></span>
            <br />
            <br />
            <?php echo CHtml::label('Time user request:', null); ?><br />
            <div class="five columns">
                <?php echo CHtml::label('Start:', null); ?>
                <?php echo DateAndTime::returnTime($request->request_start_time); ?>
            </div>
            <div class="five columns">
                <?php echo CHtml::label('End:', null); ?>
                <?php echo DateAndTime::returnTime($request->request_end_time); ?>
            </div>
            <br />
            <br />
            <?php echo CHtml::label('Time request:', null); ?><br />
            <div class="five columns">
                <?php echo CHtml::label('Start:', null); ?>
                <?php echo DateAndTime::returnTime($request->start_time); ?>
            </div>
            <div class="five columns">
                <?php echo CHtml::label('End:', null); ?>
                <?php echo DateAndTime::returnTime($request->end_time); ?>
            </div>
        </div>
    </div>
</div>
