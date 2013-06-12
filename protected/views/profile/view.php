<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs = array(
	'Profiles' => array('index'),
	$model->name,
);
?>

<h1>View Profile #<?php echo $model->id; ?></h1>
<span class="medium secondary btn">
    <?php 
    if (Yii::app()->user->isAdmin === 'true'){
        echo CHtml::button('Update this profile', array('submit' => array('profile/update', 'id' => $model->id)));
    }
    ?>
</span>
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