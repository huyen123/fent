<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs = array(
	'Profiles' => array('index'),
	'Create',
);
?>

<div class="row"><h1>Create Profile</h1></div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>