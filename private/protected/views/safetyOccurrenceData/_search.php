<?php
/* @var $this SafetyOccurrenceDataController */
/* @var $model SafetyOccurrenceData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_id'); ?>
		<?php echo $form->textField($model,'incident_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_occurrence'); ?>
		<?php echo $form->textField($model,'date_of_occurrence'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_of_occurrence'); ?>
		<?php echo $form->textField($model,'time_of_occurrence',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift'); ?>
		<?php echo $form->textField($model,'shift',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration_of_shift'); ?>
		<?php echo $form->textField($model,'duration_of_shift',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_dc_logged_on_duty'); ?>
		<?php echo $form->textField($model,'time_dc_logged_on_duty',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_dc_logged_off_duty'); ?>
		<?php echo $form->textField($model,'time_dc_logged_off_duty',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_dc_reported_on_duty'); ?>
		<?php echo $form->textField($model,'time_dc_reported_on_duty',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_dc_reported_off_duty'); ?>
		<?php echo $form->textField($model,'time_dc_reported_off_duty',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_personnel_on_shift_roster'); ?>
		<?php echo $form->textField($model,'no_of_personnel_on_shift_roster'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_personnel_on_shift_logbook'); ?>
		<?php echo $form->textField($model,'no_of_personnel_on_shift_logbook'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'density_of_traffic'); ?>
		<?php echo $form->textField($model,'density_of_traffic',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_trainees_on_shift'); ?>
		<?php echo $form->textField($model,'no_of_trainees_on_shift'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'traffic_handled_by_trainee'); ?>
		<?php echo $form->textField($model,'traffic_handled_by_trainee',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'controller_under_medication'); ?>
		<?php echo $form->textField($model,'controller_under_medication',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_from_last_annual_leave'); ?>
		<?php echo $form->textField($model,'date_from_last_annual_leave'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_training_attended'); ?>
		<?php echo $form->textField($model,'last_training_attended',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_training_date'); ?>
		<?php echo $form->textField($model,'last_training_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_proficiency_date'); ?>
		<?php echo $form->textField($model,'last_proficiency_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weather_information'); ?>
		<?php echo $form->textArea($model,'weather_information',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aerodrome_information'); ?>
		<?php echo $form->textArea($model,'aerodrome_information',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'controllers_on_duty'); ?>
		<?php echo $form->textArea($model,'controllers_on_duty',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'completed_by'); ?>
		<?php echo $form->textField($model,'completed_by',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->