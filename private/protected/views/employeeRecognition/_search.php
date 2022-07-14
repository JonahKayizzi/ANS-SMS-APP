<?php
/* @var $this EmployeeRecognitionController */
/* @var $model EmployeeRecognition */
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
		<?php echo $form->label($model,'nominator_name'); ?>
		<?php echo $form->textField($model,'nominator_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nominator_department'); ?>
		<?php echo $form->textField($model,'nominator_department',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nominee_name'); ?>
		<?php echo $form->textField($model,'nominee_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nominee_department'); ?>
		<?php echo $form->textField($model,'nominee_department',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nominee_supervisor_name'); ?>
		<?php echo $form->textField($model,'nominee_supervisor_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_of_actions'); ?>
		<?php echo $form->textField($model,'description_of_actions',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_observed'); ?>
		<?php echo $form->textField($model,'date_observed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'place_observed'); ?>
		<?php echo $form->textField($model,'place_observed',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_received'); ?>
		<?php echo $form->textField($model,'date_received'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_reviewed'); ?>
		<?php echo $form->textField($model,'date_reviewed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_information'); ?>
		<?php echo $form->textField($model,'additional_information',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomination_accepted'); ?>
		<?php echo $form->textField($model,'nomination_accepted',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accepted_date'); ?>
		<?php echo $form->textField($model,'accepted_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accepted_comments'); ?>
		<?php echo $form->textField($model,'accepted_comments',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'award_granted'); ?>
		<?php echo $form->textField($model,'award_granted',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'award_level'); ?>
		<?php echo $form->textField($model,'award_level',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'award_granted_date'); ?>
		<?php echo $form->textField($model,'award_granted_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'award_granted_comments'); ?>
		<?php echo $form->textField($model,'award_granted_comments',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chaiperson_approval'); ?>
		<?php echo $form->textField($model,'chaiperson_approval'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chaiperson_approval_date'); ?>
		<?php echo $form->textField($model,'chaiperson_approval_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reported_by'); ?>
		<?php echo $form->textField($model,'reported_by',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->