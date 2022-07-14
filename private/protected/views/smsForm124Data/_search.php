<?php
/* @var $this SmsForm124DataController */
/* @var $model SmsForm124Data */
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
		<?php echo $form->label($model,'type_of_incident'); ?>
		<?php echo $form->textField($model,'type_of_incident',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_no'); ?>
		<?php echo $form->textField($model,'case_no',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_name'); ?>
		<?php echo $form->textField($model,'employee_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_number'); ?>
		<?php echo $form->textField($model,'employee_number',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supervisor'); ?>
		<?php echo $form->textField($model,'supervisor',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_of_incident'); ?>
		<?php echo $form->textField($model,'location_of_incident',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'movement_area'); ?>
		<?php echo $form->textField($model,'movement_area',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hospital'); ?>
		<?php echo $form->textField($model,'hospital',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_incident'); ?>
		<?php echo $form->textField($model,'date_of_incident'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_of_incident'); ?>
		<?php echo $form->textField($model,'time_of_incident',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_reported'); ?>
		<?php echo $form->textField($model,'date_reported'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_of_injury'); ?>
		<?php echo $form->textField($model,'type_of_injury',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'body_part_injured'); ?>
		<?php echo $form->textField($model,'body_part_injured',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cause_of_incident'); ?>
		<?php echo $form->textField($model,'cause_of_incident',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_site'); ?>
		<?php echo $form->textField($model,'incident_site',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_of_equipment_involved'); ?>
		<?php echo $form->textField($model,'type_of_equipment_involved',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'related_act'); ?>
		<?php echo $form->textField($model,'related_act',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weather_conditions'); ?>
		<?php echo $form->textField($model,'weather_conditions',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_description'); ?>
		<?php echo $form->textField($model,'incident_description',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigation'); ?>
		<?php echo $form->textArea($model,'investigation',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_supervisor'); ?>
		<?php echo $form->textField($model,'area_supervisor',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'analysis_date'); ?>
		<?php echo $form->textField($model,'analysis_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'completed_by'); ?>
		<?php echo $form->textField($model,'completed_by',array('size'=>32,'maxlength'=>32)); ?>
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