<?php
/* @var $this FinacialRiskAnalysisController */
/* @var $model FinacialRiskAnalysis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finacial-risk-analysis-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hazzard_no'); ?>
		<?php echo $form->dropDownList($model,'hazzard_no',@Incidents::model()->getOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'hazzard_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textArea($model,'action',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'warranty'); ?>
		<?php echo $form->textField($model,'warranty',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'warranty'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'approved_by'); ?>
		<?php echo $form->textArea($model,'approved_by',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'approved_by'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->