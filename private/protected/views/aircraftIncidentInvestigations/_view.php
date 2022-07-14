<?php
/* @var $this AircraftIncidentInvestigationsController */
/* @var $data AircraftIncidentInvestigations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_occurence')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_occurence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_involved')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_involved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_of_notification')); ?>:</b>
	<?php echo CHtml::encode($data->form_of_notification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_of_investigation')); ?>:</b>
	<?php echo CHtml::encode($data->level_of_investigation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('investigators')); ?>:</b>
	<?php echo CHtml::encode($data->investigators); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tor')); ?>:</b>
	<?php echo CHtml::encode($data->tor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_assignment')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_assignment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($data->deadline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transcript')); ?>:</b>
	<?php echo CHtml::encode($data->transcript); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preliminary_report')); ?>:</b>
	<?php echo CHtml::encode($data->preliminary_report); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SAG')); ?>:</b>
	<?php echo CHtml::encode($data->SAG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forwarded_to_DANS_and_Mgrs')); ?>:</b>
	<?php echo CHtml::encode($data->forwarded_to_DANS_and_Mgrs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('final_report')); ?>:</b>
	<?php echo CHtml::encode($data->final_report); ?>
	<br />

	*/ ?>

</div>