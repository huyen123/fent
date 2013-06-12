<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs = array(
	'Profiles' => array('index'),
	$model->name => array('view','id' => $model->id),
	'Update',
);
?>

<div class="row"><h1>Update Profile <?php echo $model->id; ?></h1></div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>