<?php
/* @var $this VerificationsController */
/* @var $model Verifications */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php /* echo $form->errorSummary($model); */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'verified_by'); ?><br />
		<?php echo $form->textField($model,'verified_by',array('style'=>'width: 100%;')); ?><br />
		<?php echo $form->error($model,'verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?><br />
		<?php echo $form->textArea($model,'note',array('style'=>'width: 100%; ')); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'incident_id'); */ ?>
		<?php echo $form->hiddenField($model,'incident_id', array('value' => $incident)); ?>
		<?php echo $form->error($model,'incident_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->