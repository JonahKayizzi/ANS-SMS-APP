<?php
/* @var $this ReviewDatesController */
/* @var $model ReviewDates */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-dates-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'review_date'); ?><br />
		<?php echo $form->textField($model,'review_date'); ?><br />
		<?php echo $form->error($model,'review_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?><br />
		<?php echo $form->textArea($model,'remark', array('style'=>'width: 100%;')); ?><br />
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'ocurrence'); */ ?>
		<?php echo $form->hiddenField($model,'ocurrence'); ?><br />
		<?php echo $form->error($model,'ocurrence'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->