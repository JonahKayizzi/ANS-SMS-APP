<?php
/* @var $this FurtherActionsController */
/* @var $model FurtherActions */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'further-actions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php /* echo $form->errorSummary($model); */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50, 'style'=>'width: 100%; height: 70px;')); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'accepted'); ?><br />
		<?php echo $form->dropDownList($model,'accepted',array(NULL=>'N/A', 'Yes'=>'Yes', 'No'=>'No')); ?><br />
		<?php echo $form->error($model,'accepted'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?><br />
		<?php echo $form->textField($model,'comment',array('style'=>'width: 100%; ')); ?><br />
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'incident_id'); */ ?>
		<?php echo $form->hiddenField($model,'incident_id', array('value' => $incident)); ?>
		<?php echo $form->error($model,'incident_id'); ?>
	</div>
	
	<div class="row">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?> <input type="submit" value="Close" name="close" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->