<?php
/* @var $this AuditFormController */
/* @var $model AuditForm */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issue_no'); ?>
		<?php echo $form->textField($model,'issue_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue_date'); ?>
		<?php echo $form->textField($model,'issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auditor_technical_assessor'); ?>
		<?php echo $form->textField($model,'auditor_technical_assessor',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_audited'); ?>
		<?php echo $form->textField($model,'area_audited',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_audited_date'); ?>
		<?php echo $form->textField($model,'area_audited_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auditees_representative'); ?>
		<?php echo $form->textField($model,'auditees_representative',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detailed_observation'); ?>
		<?php echo $form->textArea($model,'detailed_observation',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classification_of_non_conformance'); ?>
		<?php echo $form->textField($model,'classification_of_non_conformance',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference_number_of_iso_9001_or_procedure'); ?>
		<?php echo $form->textField($model,'reference_number_of_iso_9001_or_procedure',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'root_cause_analysis_of_non_conformance'); ?>
		<?php echo $form->textArea($model,'root_cause_analysis_of_non_conformance',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suggested_corrective_action'); ?>
		<?php echo $form->textArea($model,'suggested_corrective_action',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_date_of_realisation'); ?>
		<?php echo $form->textField($model,'proposed_date_of_realisation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verification_of_proof'); ?>
		<?php echo $form->textArea($model,'verification_of_proof',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verification_of_proof_date'); ?>
		<?php echo $form->textField($model,'verification_of_proof_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lead_auditors_comments'); ?>
		<?php echo $form->textArea($model,'lead_auditors_comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lead_auditors_comments_date'); ?>
		<?php echo $form->textField($model,'lead_auditors_comments_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->