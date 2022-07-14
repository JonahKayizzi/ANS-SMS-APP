<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $data QuestionnaireQuestionAnswers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questionnaire_id')); ?>:</b>
	<?php echo CHtml::encode($data->questionnaire_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_of_implementation')); ?>:</b>
	<?php echo CHtml::encode($data->status_of_implementation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_required')); ?>:</b>
	<?php echo CHtml::encode($data->action_required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />


</div>