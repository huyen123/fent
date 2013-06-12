<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_code')); ?>:</b>
	<?php echo CHtml::encode($data->employee_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secret_key')); ?>:</b>
	<?php echo CHtml::encode($data->secret_key); ?>
	<br />
        <?php
            if (Yii::app()->user->isAdmin){
                echo '<span class="small primary btn">';
                echo CHtml::button('Send sign up email', array('submit' => array('profile/sendSignUpEmail', 'id' => $data->id)));
                echo '</span>&nbsp';
                echo '<span class="small secondary btn">';
                echo CHtml::button('Update this profile', array('submit' => array('profile/update', 'id' => $data->id)));
                echo '</span>&nbsp';
                echo '<span class="small danger btn">';
                echo CHtml::button('Delete this profile', array('submit' => array('profile/delete', 'id' => $data->id), 'confirm'=>'Do you want to delete this profile permanently?'));
                echo '</span>';
            }
        ?>
        <?php
        /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>
        
</div>