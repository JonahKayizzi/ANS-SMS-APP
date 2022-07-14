<?php
/* @var $this SafetyRecommendationsController */
/* @var $data SafetyRecommendations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />


</div>