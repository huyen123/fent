<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'profile-form',
	'enableAjaxValidation' => false,
)); ?>
        <div class="row">
            <p class="note">Fields with <span class="required">*</span> are required.</p>
        </div>

        <div class="row danger alert">
	<?php echo $form->errorSummary($model); ?>
        </div>
            

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size' => 60,'maxlength' => 45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size' => 45,'maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_code'); ?>
		<?php echo $form->textField($model,'employee_code',array('size' => 20,'maxlength' => 20)); ?>
		<?php echo $form->error($model,'employee_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size' => 45,'maxlength' => 45)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
            <span class="medium primary btn">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
            </span>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->