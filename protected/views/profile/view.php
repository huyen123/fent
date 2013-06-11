<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs = array(
	'Profiles' => array('index'),
	$model->name,
);
?>

<h1>View Profile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'email',
		'name',
		'phone',
		'address',
		'employee_code',
		'secret_key',
		'position',
		'date_of_birth',
		'updated_at',
		'created_at',
	),
)); ?>