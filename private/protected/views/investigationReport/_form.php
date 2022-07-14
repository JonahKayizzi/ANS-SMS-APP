<?php
/* @var $this InvestigationReportController */
/* @var $model InvestigationReport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'investigation-report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php if(isset($_GET['incident'])){ ?>
		<?php echo $form->hiddenField($model,'incident_id',array('value'=>$_GET['incident'])); ?>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'form-control', 'placeholder'=>'Title of Investigation Report',)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>



	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->