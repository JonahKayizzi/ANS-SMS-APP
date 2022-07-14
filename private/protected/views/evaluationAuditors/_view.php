<?php
/* @var $this EvaluationAuditorsController */
/* @var $data EvaluationAuditors */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_id')); ?>:</b>
	<?php echo CHtml::encode($data->date_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_id')); ?>:</b>
	<?php echo CHtml::encode($data->station_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />


</div>