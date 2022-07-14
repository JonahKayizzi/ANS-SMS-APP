<?php
/* @var $this WorkshopFacilitatorsController */
/* @var $data WorkshopFacilitators */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workshop_id')); ?>:</b>
	<?php echo CHtml::encode($data->workshop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_name')); ?>:</b>
	<?php echo CHtml::encode($data->print_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>