<?php
/* @var $this EffectsController */
/* @var $model Effects */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'effects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php /* echo $form->labelEx($model,'hazard_id'); */ ?>
		<?php echo $form->hiddenField($model,'hazard_id', array('value' => $incident)); ?>
		<?php echo $form->error($model,'hazard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'severity_id'); ?><br />
		<?php echo $form->dropDownList($model,'severity_id',@Severities::model()->getOptions()); ?><br />
		<?php echo $form->error($model,'severity_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'severity_rational_id'); ?><br />
		<?php echo $form->dropDownList($model,'severity_rational_id',@SeverityRationales::model()->getOptions(),array('multiple'=>'multiple')); ?><br />
		<?php echo $form->error($model,'severity_rational_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'likelihood_id'); ?><br />
		<?php echo $form->dropDownList($model,'likelihood_id',@Likelihoods::model()->getOptions()); ?><br />
		<?php echo $form->error($model,'likelihood_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'predicted_residual_risk_index'); ?><br />
		<?php echo $form->textField($model,'predicted_residual_risk_index'); ?><br />
		<?php echo $form->error($model,'predicted_residual_risk_index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'substitute_risk'); ?><br />
		<?php echo $form->textField($model,'substitute_risk'); ?><br />
		<?php echo $form->error($model,'substitute_risk'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->