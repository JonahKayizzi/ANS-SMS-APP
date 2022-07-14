<?php
/* @var $this ReviewDatesController */
/* @var $model ReviewDates */
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
		<?php echo $form->label($model,'review_date'); ?>
		<?php echo $form->textField($model,'review_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ocurrence'); ?>
		<?php echo $form->textField($model,'ocurrence'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->