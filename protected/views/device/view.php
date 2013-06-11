<?php
/* @var $this DeviceController */
/* @var $model Device */
?>
<h1>View Device #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'serial',
		'status',
		'updated_at',
		'created_at',
		'category_id',
	),
)); ?>
