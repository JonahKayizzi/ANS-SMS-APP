<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $model QuestionnaireQuestionAnswers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questionnaire-question-answers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'questionnaire_id'); ?>
		<?php echo $form->textField($model,'questionnaire_id'); ?>
		<?php echo $form->error($model,'questionnaire_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_of_implementation'); ?>
		<?php echo $form->textArea($model,'status_of_implementation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'status_of_implementation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_required'); ?>
		<?php echo $form->textArea($model,'action_required',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'action_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textField($model,'answer',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->