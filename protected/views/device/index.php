<?php
/* @var $this DeviceController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Devices</h1>

<?php
    if (Yii::app()->user->isAdmin)
    {
        echo "<div class='medium primary btn'>";
        echo CHtml::button('Create', array('submit' => array('device/create')));
        echo '</div>';
    }
?>
<?php
    foreach ($devices as $device) {
    $this->renderPartial('_view',array('data' => $device));
    echo '</br>';
};
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>