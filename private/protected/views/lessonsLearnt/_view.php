<?php
/* @var $this LessonsLearntController */
/* @var $data LessonsLearnt */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Divission')); ?>:</b>
	<?php echo CHtml::encode($data->Divission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_reported')); ?>:</b>
	<?php echo CHtml::encode($data->date_reported); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_title')); ?>:</b>
	<?php echo CHtml::encode($data->issue_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>