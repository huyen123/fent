<?php
/* @var $this DeviceController */
/* @var $data Device */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</b>
	<?php echo CHtml::encode($data->serial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	*/ ?>
        <?php
            if (Yii::app()->user->isAdmin)
            {
                echo "<div class='small primary btn'>";
                echo CHtml::button('Edit', array('submit' => array('device/update', 'id' => $data->id)));
                echo '</div>';
            }
        ?>
        <?php
            if (Yii::app()->user->isAdmin)
            {
                echo "<div class='small danger btn'>";
                echo CHtml::button('Destroy', array('submit' => array('device/delete', 'id' => $data->id),
                    'confirm'=>'Are you sure you want to delete this item?'));
                echo '</div>';
            }
        ?>
</div>