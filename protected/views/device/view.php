<?php
/* @var $this DeviceController */
/* @var $model Device */
?>
<div class="row centered">
    <h1><?php echo $device->name; ?></h1>
    <div class="row">
        <div class="four column image photo">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/no-image.jpg'); ?>
        </div>
        <div class="six column push_one">
            <p><?php echo 'Status: '.$device->status; ?></p>
            <p><?php echo 'Serial: '.$device->serial; ?></p>
            <p><?php echo 'Description: '.$device->description; ?></p>    
            <p><?php echo 'Add: '.$device->created_at; ?></p>
            <p><?php echo 'Update: '.$device->updated_at; ?></p>
            <p><?php echo 'Category: '.$device->category->name; ?></p>
        </div>
    </div>
</div>