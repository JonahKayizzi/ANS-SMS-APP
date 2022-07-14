<?php
/* @var $this NotificationsController */
/* @var $model Notifications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<div class="form-group">
		<?php echo $form->labelEx($model,'urgent'); ?>
		
		<?php echo $form->dropDownList($model,'urgent',array('1' =>'Yes','0' =>'No' ),array('class'=>'form-control')); ?>
	
		<?php echo $form->error($model,'urgent'); ?>
	</div>


<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		
		<?php echo $form->dropDownList($model,'type',array('PRIVATE' =>'PRIVATE','GROUP' =>'GROUP' ),
array(
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('notifications/getUserOptions'), //url to call.

'update'=>'#Notifications_user', //selector to update

), 'class'=>'form-control')

		); ?>
	
		<?php echo $form->error($model,'type'); ?>
	</div>
<div class="form-group">
		<?php echo $form->labelEx($model,'user'); ?>

		<?php echo $form->dropDownList($model,'user', Users::getUsersOptions(),array('class'=>'form-control')); ?>
	
		<?php echo $form->error($model,'user'); ?>
	</div> 

	<div class="form-group">

		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	<div class="form-group">

		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>






	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->