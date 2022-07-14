<?php
/* @var $this EffectRiskManagementController */
/* @var $data EffectRiskManagement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('severity')); ?>:</b>
	<?php echo CHtml::encode($data->severity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('severity_rationale')); ?>:</b>
	<?php echo CHtml::encode($data->severity_rationale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('likelihood')); ?>:</b>
	<?php echo CHtml::encode($data->likelihood); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('likelihood_rationale')); ?>:</b>
	<?php echo CHtml::encode($data->likelihood_rationale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('effects_id')); ?>:</b>
	<?php echo CHtml::encode($data->effects_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	*/ ?>

</div>