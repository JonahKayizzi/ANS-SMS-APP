<?php
/* @var $this SafetyRequirementsController */
/* @var $model SafetyRequirements */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'safety-requirements-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'mitigation'); ?><br />
		<?php echo $form->textField($model,'mitigation',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%; ')); ?><br />
		<?php echo $form->error($model,'mitigation'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?><br />
		<?php echo $form->dropDownList($model, 'priority', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10')); ?><br />
		<?php echo $form->error($model,'priority'); ?>
	</div>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'time_frame'); ?><br />
		<?php echo $form->textField($model,'time_frame',array('size'=>60,'maxlength'=>128, 'style'=>'width: 50%; ')); ?><br />
		<?php echo $form->error($model,'time_frame'); ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'incident_id'); */ ?>
		<?php echo $form->hiddenField($model,'incident_id', array('value' => $incident)); ?>
		<?php echo $form->error($model,'incident_id'); ?>
	</div>
	
	<div class="row">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->