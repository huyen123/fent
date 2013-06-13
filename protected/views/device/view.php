<?php
/* @var $this DeviceController */
/* @var $model Device */


?>
<script src='<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui.js'></script>  
<script src='<?php echo Yii::app()->baseUrl; ?>/js/device.js'></script>  

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

<div class="row">
    <fieldset class="ten centered columns">
        <legend>Borrow Request</legend>    
        <div class="field seven columns">        
            <?php echo CHtml::textArea('reason', null, array('id' => 'reason-textarea',
                'placeholder' => 'Enter your reason here', 'rows' => 4, 'device_id' => $device->id)); ?>
        </div>   
        <div class="field four columns"> 
            <?php echo CHtml::textField('from', null, array('id' => 'from', 
                'placeholder' => 'From', 'readonly' => 'readonly')); ?>        
        </div>
        <div class="field four columns"> 
            <?php echo CHtml::textField('to', null, array('id' => 'to', 
                'placeholder' => 'To', 'readonly' => 'readonly')); ?>        
        </div>
        <div class="small primary btn two columns">
            <?php echo CHtml::button('Send request', array('id' => 'reason-button'));?>
        </div>
    </fieldset>
</div>