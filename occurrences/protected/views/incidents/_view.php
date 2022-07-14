<?php
/* @var $this IncidentsController */
/* @var $data Incidents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occurrence')); ?>:</b>
	<?php echo CHtml::encode($data->occurrence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_registration')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_registration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator')); ?>:</b>
	<?php echo CHtml::encode($data->operator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departure_point')); ?>:</b>
	<?php echo CHtml::encode($data->departure_point); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('persons_on_board')); ?>:</b>
	<?php echo CHtml::encode($data->persons_on_board); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_of_aircraft')); ?>:</b>
	<?php echo CHtml::encode($data->type_of_aircraft); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination')); ?>:</b>
	<?php echo CHtml::encode($data->destination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('injuries')); ?>:</b>
	<?php echo CHtml::encode($data->injuries); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reported_by')); ?>:</b>
	<?php echo CHtml::encode($data->reported_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>