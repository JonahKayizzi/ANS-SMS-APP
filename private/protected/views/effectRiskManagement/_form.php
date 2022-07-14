<?php
/* @var $this EffectRiskManagementController */
/* @var $model EffectRiskManagement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'effect-risk-management-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'severity'); ?>
		<?php echo $form->textField($model,'severity',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'severity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'severity_rationale'); ?>
		<?php echo $form->textField($model,'severity_rationale',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'severity_rationale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'likelihood'); ?>
		<?php echo $form->textField($model,'likelihood',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'likelihood'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'likelihood_rationale'); ?>
		<?php echo $form->textField($model,'likelihood_rationale',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'likelihood_rationale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'effects_id'); ?>
		<?php echo $form->textField($model,'effects_id'); ?>
		<?php echo $form->error($model,'effects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reported_by'); ?>
		<?php echo $form->textField($model,'reported_by',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'reported_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->