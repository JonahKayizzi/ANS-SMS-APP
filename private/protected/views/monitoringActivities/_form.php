<?php
/* @var $this MonitoringActivitiesController */
/* @var $model MonitoringActivities */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'monitoring-activities-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'monitoring_activity'); ?><br />
		<?php echo $form->textField($model,'monitoring_activity',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%;')); ?><br />
		<?php echo $form->error($model,'monitoring_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency'); ?><br />
		<?php echo $form->textField($model,'frequency',array('size'=>60,'maxlength'=>128, 'style'=>'width: 50%;')); ?><br />
		<?php echo $form->error($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?><br />
		<?php echo $form->textField($model,'duration',array('size'=>60,'maxlength'=>128, 'style'=>'width: 50%;')); ?><br />
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'substitute_risk'); ?><br />
		<?php echo $form->textField($model,'substitute_risk',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%;')); ?><br />
		<?php echo $form->error($model,'substitute_risk'); ?>
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