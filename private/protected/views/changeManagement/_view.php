<?php
/* @var $this ChangeManagementController */
/* @var $data ChangeManagement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('originator_name')); ?>:</b>
	<?php echo CHtml::encode($data->originator_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('originator_title')); ?>:</b>
	<?php echo CHtml::encode($data->originator_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('system_equipment_concerned')); ?>:</b>
	<?php echo CHtml::encode($data->system_equipment_concerned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_raised')); ?>:</b>
	<?php echo CHtml::encode($data->date_raised); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_no')); ?>:</b>
	<?php echo CHtml::encode($data->reference_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_description')); ?>:</b>
	<?php echo CHtml::encode($data->change_description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('change_justification')); ?>:</b>
	<?php echo CHtml::encode($data->change_justification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('back_out_plan')); ?>:</b>
	<?php echo CHtml::encode($data->back_out_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('affected_areas')); ?>:</b>
	<?php echo CHtml::encode($data->affected_areas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costs')); ?>:</b>
	<?php echo CHtml::encode($data->costs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposed_implementer')); ?>:</b>
	<?php echo CHtml::encode($data->proposed_implementer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recommended_by')); ?>:</b>
	<?php echo CHtml::encode($data->recommended_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_by')); ?>:</b>
	<?php echo CHtml::encode($data->approved_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recommendation_date')); ?>:</b>
	<?php echo CHtml::encode($data->recommendation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_date')); ?>:</b>
	<?php echo CHtml::encode($data->approval_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>