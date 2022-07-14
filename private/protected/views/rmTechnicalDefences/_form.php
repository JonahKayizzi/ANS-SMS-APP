<?php
/* @var $this RmTechnicalDefencesController */
/* @var $model RmTechnicalDefences */
/* @var $form CActiveForm */
if(isset($_GET['rm_id'])){$rm_id = $_GET['rm_id'];}else{$rm_id = NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rm-technical-defences-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php /* echo $form->labelEx($model,'risk_management_id'); */ ?>
		<?php echo $form->hiddenField($model,'risk_management_id',array('value'=>$rm_id)); ?>
		<?php echo $form->error($model,'risk_management_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textField($model,'details',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->