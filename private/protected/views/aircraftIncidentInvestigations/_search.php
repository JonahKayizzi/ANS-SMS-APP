<?php
/* @var $this AircraftIncidentInvestigationsController */
/* @var $model AircraftIncidentInvestigations */
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
		<?php echo $form->label($model,'date_of_occurence'); ?>
		<?php echo $form->textField($model,'date_of_occurence'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aircraft_involved'); ?>
		<?php echo $form->textField($model,'aircraft_involved',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'form_of_notification'); ?>
		<?php echo $form->textField($model,'form_of_notification',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_of_investigation'); ?>
		<?php echo $form->textField($model,'level_of_investigation',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigators'); ?>
		<?php echo $form->textArea($model,'investigators',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tor'); ?>
		<?php echo $form->textField($model,'tor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_assignment'); ?>
		<?php echo $form->textField($model,'date_of_assignment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadline'); ?>
		<?php echo $form->textField($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transcript'); ?>
		<?php echo $form->textField($model,'transcript'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preliminary_report'); ?>
		<?php echo $form->textField($model,'preliminary_report',array('size'=>20,'maxlength'=>20)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'forwarded_to_DANS_and_Mgrs'); ?>
		<?php echo $form->textField($model,'forwarded_to_DANS_and_Mgrs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'final_report'); ?>
		<?php echo $form->textField($model,'final_report',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->