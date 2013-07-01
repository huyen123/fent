<?php
/* @var $this DeviceController */
/* @var $dataProvider CActiveDataProvider */
?>
<script src='<?php echo Yii::app()->baseUrl; ?>/js/device.js'></script>  
<div class="row centered">
<h1>Devices</h1>

<?php
    if (Yii::app()->user->isAdmin)
    {
        echo "<div class='medium primary btn'>";
        echo CHtml::button('Create', array('submit' => array('device/create')));
        echo '</div>';
        echo '<p>';
    }
    if ($display) {
        echo "<div class='medium primary btn'>";
        echo CHtml::link('Show all devices', Yii::app()->createUrl('device/index'));
        echo '</div>';
    } else {
        echo "<div class='medium secondary btn'>";
        echo CHtml::link('Show only free devices', Yii::app()->createUrl('device/index', array('display' => 'device_free')));
        echo '</div>';
    }
?>


<?php 
    for ($i = 0; $i < sizeof($devices); $i = $i + $columns)
    {   
        echo '<div class="row device">';
        for ($t = 0; $t < $columns; $t++)
        {
            if ($columns == 3)
            {
                echo '<fieldset class="four columns">';
            } else {
                echo '<fieldset class="six columns">';
            }
            if (isset($devices[$i + $t]))
            {
                $this->renderPartial('_view',array('data' => $devices[$i + $t]));
            }
            echo '</fieldset>';
        }
        echo '</div>';
    }
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

</div>