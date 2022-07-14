<?php
/* @var $this WorkshopFacilitatorsController */
/* @var $model WorkshopFacilitators */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'workshop-facilitators-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'workshop_id'); ?>
		<?php echo $form->dropDownList($model,'workshop_id',@Workshops::model()->getOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'workshop_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'print_name'); ?>
		<?php echo $form->textField($model,'print_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'print_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'organization'); ?>
		<?php echo $form->textField($model,'organization',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->