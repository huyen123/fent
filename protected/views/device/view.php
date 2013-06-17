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
            <?php
                if ($liked) {
                    echo '<div class="small danger btn">';
                    echo CHtml::button('Unlike', array('id' => 'like-button'));
                    echo '</div>';
                } else {
                    echo '<div class="small primary btn">';
                    echo CHtml::button('Like', array('id' => 'like-button'));
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>

<div class="row">
    <fieldset class="ten centered columns" id="request_form" request_existed="<?php echo $existed; ?>">
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
            <?php echo CHtml::button('Send request', array('id' => 'request-button'));?>
        </div>
    </fieldset>
</div>

<div class="modal" id="modal-success">
    <div class="content">
      <a class="close switch" gumby-trigger="|#modal-success"><i class="icon-cancel" /></i></a>
      <div class="row">
        <div class="ten columns centered center-text">
          <h2>Successful </h2>
          <p>You have successfully create new request!</p>
          <p>Please wait until it is accepted by admin!</p>
          <p class="btn primary medium"><a href="#" class="switch" gumby-trigger="|#modal-success">Close</a></p>
        </div>
      </div>
    </div>
 </div>

<div class="modal" id="modal-fail">
    <div class="content">
      <a class="close switch" gumby-trigger="|#modal-fail"><i class="icon-cancel" /></i></a>
      <div class="row">
        <div class="ten columns centered center-text">
          <h2>Fail</h2>
          <p>Your request can not be created!</p>          
          <p class="btn primary medium"><a href="#" class="switch" gumby-trigger="|#modal-fail">Close</a></p>
        </div>
      </div>
    </div>
 </div>