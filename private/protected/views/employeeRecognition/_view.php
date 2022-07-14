<?php
/* @var $this EmployeeRecognitionController */
/* @var $data EmployeeRecognition */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nominator_name')); ?>:</b>
	<?php echo CHtml::encode($data->nominator_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nominator_department')); ?>:</b>
	<?php echo CHtml::encode($data->nominator_department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nominee_name')); ?>:</b>
	<?php echo CHtml::encode($data->nominee_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nominee_department')); ?>:</b>
	<?php echo CHtml::encode($data->nominee_department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nominee_supervisor_name')); ?>:</b>
	<?php echo CHtml::encode($data->nominee_supervisor_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description_of_actions')); ?>:</b>
	<?php echo CHtml::encode($data->description_of_actions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_observed')); ?>:</b>
	<?php echo CHtml::encode($data->date_observed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place_observed')); ?>:</b>
	<?php echo CHtml::encode($data->place_observed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_received')); ?>:</b>
	<?php echo CHtml::encode($data->date_received); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_reviewed')); ?>:</b>
	<?php echo CHtml::encode($data->date_reviewed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_information')); ?>:</b>
	<?php echo CHtml::encode($data->additional_information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomination_accepted')); ?>:</b>
	<?php echo CHtml::encode($data->nomination_accepted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_date')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_comments')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('award_granted')); ?>:</b>
	<?php echo CHtml::encode($data->award_granted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('award_level')); ?>:</b>
	<?php echo CHtml::encode($data->award_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('award_granted_date')); ?>:</b>
	<?php echo CHtml::encode($data->award_granted_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('award_granted_comments')); ?>:</b>
	<?php echo CHtml::encode($data->award_granted_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chaiperson_approval')); ?>:</b>
	<?php echo CHtml::encode($data->chaiperson_approval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chaiperson_approval_date')); ?>:</b>
	<?php echo CHtml::encode($data->chaiperson_approval_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	*/ ?>

</div>