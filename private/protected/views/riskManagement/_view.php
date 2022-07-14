<?php
/* @var $this RiskManagementController */
/* @var $data RiskManagement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_no')); ?>:</b>
	<?php echo CHtml::encode($data->serial_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->current_risk_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theoretical_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->theoretical_risk_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('risk_owner')); ?>:</b>
	<?php echo CHtml::encode($data->risk_owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_risk_index')); ?>:</b>
	<?php echo CHtml::encode($data->actual_risk_index); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluated_by')); ?>:</b>
	<?php echo CHtml::encode($data->evaluated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluation_date')); ?>:</b>
	<?php echo CHtml::encode($data->evaluation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_by')); ?>:</b>
	<?php echo CHtml::encode($data->approved_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_date')); ?>:</b>
	<?php echo CHtml::encode($data->approval_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next_evaluation_date')); ?>:</b>
	<?php echo CHtml::encode($data->next_evaluation_date); ?>
	<br />

	*/ ?>

</div>