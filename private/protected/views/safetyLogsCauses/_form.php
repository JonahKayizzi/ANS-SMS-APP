<?php
/* @var $this SafetyLogsCausesController */
/* @var $model SafetyLogsCauses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'safety-logs-causes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'target'); ?>
		<?php echo $form->textField($model,'target',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'target'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'display_kpi'); ?>
		<?php echo $form->dropDownList($model,'display_kpi',array(1=>'Yes', 2=>'No'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'display_kpi'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->