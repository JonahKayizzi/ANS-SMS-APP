<?php
/* @var $this HazardRiskManagementRegisterController */
/* @var $model HazardRiskManagementRegister */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tasks_id'); ?>
		<?php echo $form->textField($model,'tasks_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_id'); ?>
		<?php echo $form->textField($model,'hazard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'consequences'); ?>
		<?php echo $form->textArea($model,'consequences',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_defences'); ?>
		<?php echo $form->textArea($model,'current_defences',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_risk_index'); ?>
		<?php echo $form->textField($model,'current_risk_index',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tech_admin_defences'); ?>
		<?php echo $form->textArea($model,'tech_admin_defences',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theoretical_risk_index'); ?>
		<?php echo $form->textField($model,'theoretical_risk_index',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'risk_owner'); ?>
		<?php echo $form->textField($model,'risk_owner',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actual_risk_index'); ?>
		<?php echo $form->textField($model,'actual_risk_index',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->