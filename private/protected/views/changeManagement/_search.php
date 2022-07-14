<?php
/* @var $this ChangeManagementController */
/* @var $model ChangeManagement */
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
		<?php echo $form->label($model,'originator_name'); ?>
		<?php echo $form->textField($model,'originator_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'originator_title'); ?>
		<?php echo $form->textField($model,'originator_title',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'system_equipment_concerned'); ?>
		<?php echo $form->textField($model,'system_equipment_concerned',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_raised'); ?>
		<?php echo $form->textField($model,'date_raised'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference_no'); ?>
		<?php echo $form->textField($model,'reference_no',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'change_description'); ?>
		<?php echo $form->textArea($model,'change_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'change_justification'); ?>
		<?php echo $form->textArea($model,'change_justification',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'back_out_plan'); ?>
		<?php echo $form->textArea($model,'back_out_plan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'affected_areas'); ?>
		<?php echo $form->textField($model,'affected_areas',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costs'); ?>
		<?php echo $form->textField($model,'costs',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_implementer'); ?>
		<?php echo $form->textField($model,'proposed_implementer',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recommended_by'); ?>
		<?php echo $form->textField($model,'recommended_by',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_by'); ?>
		<?php echo $form->textField($model,'approved_by',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reported_by'); ?>
		<?php echo $form->textField($model,'reported_by',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recommendation_date'); ?>
		<?php echo $form->textField($model,'recommendation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_date'); ?>
		<?php echo $form->textField($model,'approval_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
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