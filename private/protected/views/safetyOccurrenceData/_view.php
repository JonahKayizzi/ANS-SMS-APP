<?php
/* @var $this SafetyOccurrenceDataController */
/* @var $data SafetyOccurrenceData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incident_id')); ?>:</b>
	<?php echo CHtml::encode($data->incident_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_occurrence')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_occurrence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_of_occurrence')); ?>:</b>
	<?php echo CHtml::encode($data->time_of_occurrence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift')); ?>:</b>
	<?php echo CHtml::encode($data->shift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration_of_shift')); ?>:</b>
	<?php echo CHtml::encode($data->duration_of_shift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_dc_logged_on_duty')); ?>:</b>
	<?php echo CHtml::encode($data->time_dc_logged_on_duty); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('time_dc_logged_off_duty')); ?>:</b>
	<?php echo CHtml::encode($data->time_dc_logged_off_duty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_dc_reported_on_duty')); ?>:</b>
	<?php echo CHtml::encode($data->time_dc_reported_on_duty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_dc_reported_off_duty')); ?>:</b>
	<?php echo CHtml::encode($data->time_dc_reported_off_duty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_personnel_on_shift_roster')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_personnel_on_shift_roster); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_personnel_on_shift_logbook')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_personnel_on_shift_logbook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('density_of_traffic')); ?>:</b>
	<?php echo CHtml::encode($data->density_of_traffic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_trainees_on_shift')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_trainees_on_shift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('traffic_handled_by_trainee')); ?>:</b>
	<?php echo CHtml::encode($data->traffic_handled_by_trainee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller_under_medication')); ?>:</b>
	<?php echo CHtml::encode($data->controller_under_medication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_from_last_annual_leave')); ?>:</b>
	<?php echo CHtml::encode($data->date_from_last_annual_leave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_training_attended')); ?>:</b>
	<?php echo CHtml::encode($data->last_training_attended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_training_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_training_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_proficiency_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_proficiency_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weather_information')); ?>:</b>
	<?php echo CHtml::encode($data->weather_information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aerodrome_information')); ?>:</b>
	<?php echo CHtml::encode($data->aerodrome_information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controllers_on_duty')); ?>:</b>
	<?php echo CHtml::encode($data->controllers_on_duty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed_by')); ?>:</b>
	<?php echo CHtml::encode($data->completed_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>