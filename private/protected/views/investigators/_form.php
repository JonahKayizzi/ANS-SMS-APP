<?php
/* @var $this InvestigatorsController */
/* @var $model Investigators */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'investigators-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php /* echo $form->errorSummary($model); */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?><br />
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%;')); ?><br />
		<?php echo $form->error($model,'name'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->