<?php
/* @var $this ReviewDatesController */
/* @var $data ReviewDates */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_date')); ?>:</b>
	<?php echo CHtml::encode($data->review_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocurrence')); ?>:</b>
	<?php echo CHtml::encode($data->ocurrence); ?>
	<br />


</div>