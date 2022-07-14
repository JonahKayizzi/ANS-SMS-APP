<?php
/* @var $this HazardRiskManagementRegisterController */
/* @var $data HazardRiskManagementRegister */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tasks_id')); ?>:</b>
	<?php echo CHtml::encode($data->tasks_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_id')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consequences')); ?>:</b>
	<?php echo CHtml::encode($data->consequences); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_defences')); ?>:</b>
	<?php echo CHtml::encode($data->current_defences); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->current_risk_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tech_admin_defences')); ?>:</b>
	<?php echo CHtml::encode($data->tech_admin_defences); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('theoretical_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->theoretical_risk_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('risk_owner')); ?>:</b>
	<?php echo CHtml::encode($data->risk_owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->actual_risk_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>