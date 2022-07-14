<?php
/* @var $this QuestionnaireController */
/* @var $data Questionnaire */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('questionnaire_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->questionnaire_id), array('view', 'id'=>$data->questionnaire_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submitted_by')); ?>:</b>
	<?php echo CHtml::encode($data->submitted_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />


</div>