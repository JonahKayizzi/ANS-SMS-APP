<?php
/* @var $this SmsForm124DataAnalysisChecklistController */
/* @var $data SmsForm124DataAnalysisChecklist */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographos')); ?>:</b>
	<?php echo CHtml::encode($data->photographos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diagrams')); ?>:</b>
	<?php echo CHtml::encode($data->diagrams); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supervisor_statements')); ?>:</b>
	<?php echo CHtml::encode($data->supervisor_statements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('witness_statements')); ?>:</b>
	<?php echo CHtml::encode($data->witness_statements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employment_history')); ?>:</b>
	<?php echo CHtml::encode($data->employment_history); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_statement')); ?>:</b>
	<?php echo CHtml::encode($data->employee_statement); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('walk_around_checklist')); ?>:</b>
	<?php echo CHtml::encode($data->walk_around_checklist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_records')); ?>:</b>
	<?php echo CHtml::encode($data->training_records); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('police_reports')); ?>:</b>
	<?php echo CHtml::encode($data->police_reports); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('incident_id')); ?>:</b>
	<?php echo CHtml::encode($data->incident_id); ?>
	<br />

	*/ ?>

</div>