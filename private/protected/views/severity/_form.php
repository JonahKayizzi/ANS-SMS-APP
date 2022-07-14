<?php
/* @var $this SeverityController */
/* @var $model Severity */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'severity-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'severity'); ?><br /><i>An assessment of consequences of the most credible effect that could be caused by the specific hazard</i>
		<?php /* echo $form->textField($model,'severity',array('size'=>32,'maxlength'=>32)); */ ?>
		<?php echo $form->dropDownList($model, 'severity', array(
			'A'=>'Catastrophic - A',
			'B'=>'Hazardous - B',
			'C'=>'Major - C',
			'D'=>'Minor - D',
			'E'=>'Negligible - E',
		)); ?><br />
		<?php echo $form->error($model,'severity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'severity_rationale'); ?><br /><i>The explanation of how the severity was determined</i>
		<?php /* echo $form->textField($model,'severity_rationale',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%; ')); */ ?>
		<?php
			echo $form->dropDownList($model, 'severity_rationale', array(
				'Equipment destroyed'=>'Equipment destroyed',
				'Multiple deaths'=>'Multiple deaths',
				'A large reduction in safety margins, physical distress or a workload such that the operators cannot be relied upon to perform their tasks accurately or completely'=>'A large reduction in safety margins',
				'Serious injury'=>'Serious injury',
				'Major equipment damage'=>'Major equipment damage',
				'A significant reduction in safety margins, a reduction in
the ability of the operators to cope with adverse operating conditions as a result of increase in workload, or as a result of conditions impairing their efficiency
'=>'A significant reduction in safety margins',
				'Serious incident'=>'Serious incident',
				'Injury to persons'=>'Injury to persons',
				'Nuisance'=>'Nuisance',
				'Operating limitations'=>'Operating limitations',
				'Use of emergency procedures'=>'Use of emergency procedures',
				'Minor incident'=>'Minor incident',
				'Little consequences'=>'Little consequences',
			));
		?><br />
		<?php echo $form->error($model,'severity_rationale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'likelihood'); ?><br /><i>An expression of how often an event is expected to occur. Severity must be considered</i>
		<?php /* echo $form->textField($model,'likelihood',array('size'=>32,'maxlength'=>32)); */ ?>
		<?php  
			echo $form->dropDownList($model, 'likelihood', array(
				'5'=>'Frequent - 5',
				'4'=>'Occasional - 4',
				'3'=>'Remote - 3',
				'2'=>'Improbable - 2',
				'1'=>'Extremely improbable - 1',
			));
		?><br />
		<?php echo $form->error($model,'likelihood'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'likelihood_rationale'); ?><br /><i>The explanation of how the likelihood was determined</i>
		<?php /* echo $form->textField($model,'likelihood_rationale',array('size'=>60,'maxlength'=>256, 'style'=>'width: 100%; ')); */ ?>
		<?php 
			echo $form->dropDownList($model, 'likelihood_rationale', array(
				'Likely to occur many times (has occurred frequently)'=>'Likely to occur many times (has occurred frequently)',
				'Likely to occur sometimes (has occurred infrequently)'=>'Likely to occur sometimes (has occurred infrequently)',
				'Unlikely to occur but possible (has occurred rarely)'=>'Unlikely to occur but possible (has occurred rarely)',
				'Very unlikely to occur (not known to have occurred)'=>'Very unlikely to occur (not known to have occurred)',
				'Almost inconceivable that the event will occur'=>'Almost inconceivable that the event will occur',
			));
		?><br />
		<?php echo $form->error($model,'likelihood_rationale'); ?>
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