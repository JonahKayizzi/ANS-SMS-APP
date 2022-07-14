<?php
/* @var $this AuditFormController */
/* @var $data AuditForm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issue_no), array('view', 'id'=>$data->issue_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_date')); ?>:</b>
	<?php echo CHtml::encode($data->issue_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditor_technical_assessor')); ?>:</b>
	<?php echo CHtml::encode($data->auditor_technical_assessor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_audited')); ?>:</b>
	<?php echo CHtml::encode($data->area_audited); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_audited_date')); ?>:</b>
	<?php echo CHtml::encode($data->area_audited_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditees_representative')); ?>:</b>
	<?php echo CHtml::encode($data->auditees_representative); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailed_observation')); ?>:</b>
	<?php echo CHtml::encode($data->detailed_observation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('classification_of_non_conformance')); ?>:</b>
	<?php echo CHtml::encode($data->classification_of_non_conformance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_number_of_iso_9001_or_procedure')); ?>:</b>
	<?php echo CHtml::encode($data->reference_number_of_iso_9001_or_procedure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('root_cause_analysis_of_non_conformance')); ?>:</b>
	<?php echo CHtml::encode($data->root_cause_analysis_of_non_conformance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suggested_corrective_action')); ?>:</b>
	<?php echo CHtml::encode($data->suggested_corrective_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposed_date_of_realisation')); ?>:</b>
	<?php echo CHtml::encode($data->proposed_date_of_realisation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_of_proof')); ?>:</b>
	<?php echo CHtml::encode($data->verification_of_proof); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_of_proof_date')); ?>:</b>
	<?php echo CHtml::encode($data->verification_of_proof_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_auditors_comments')); ?>:</b>
	<?php echo CHtml::encode($data->lead_auditors_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_auditors_comments_date')); ?>:</b>
	<?php echo CHtml::encode($data->lead_auditors_comments_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>