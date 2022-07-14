<?php
/* @var $this EmployeeRecognitionController */
/* @var $model EmployeeRecognition */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-recognition-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominator_name'); ?>
		<?php echo $form->textField($model,'nominator_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nominator_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominator_department'); ?>
		<?php echo $form->textField($model,'nominator_department',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nominator_department'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php /* echo $form->textField($model,'date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[date]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominee_name'); ?>
		<?php echo $form->textField($model,'nominee_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nominee_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominee_department'); ?>
		<?php echo $form->textField($model,'nominee_department',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nominee_department'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominee_supervisor_name'); ?>
		<?php echo $form->textField($model,'nominee_supervisor_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nominee_supervisor_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description_of_actions'); ?>
		<?php echo $form->textField($model,'description_of_actions',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'description_of_actions'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_observed'); ?>
		<?php /* echo $form->textField($model,'date_observed'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[date_observed]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'date_observed'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'place_observed'); ?>
		<?php echo $form->textField($model,'place_observed',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'place_observed'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_received'); ?>
		<?php /* echo $form->textField($model,'date_received'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[date_received]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'date_received'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_reviewed'); ?>
		<?php /* echo $form->textField($model,'date_reviewed'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[date_reviewed]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'date_reviewed'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'additional_information'); ?>
		<?php echo $form->textField($model,'additional_information',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'additional_information'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nomination_accepted'); ?>
		<?php echo $form->textField($model,'nomination_accepted',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'nomination_accepted'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'accepted_date'); ?>
		<?php /* echo $form->textField($model,'accepted_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[accepted_date]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'accepted_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'accepted_comments'); ?>
		<?php echo $form->textField($model,'accepted_comments',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'accepted_comments'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'award_granted'); ?>
		<?php echo $form->textField($model,'award_granted',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'award_granted'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'award_level'); ?>
		<?php echo $form->textField($model,'award_level',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'award_level'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'award_granted_date'); ?>
		<?php /* echo $form->textField($model,'award_granted_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[award_granted_date]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'award_granted_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'award_granted_comments'); ?>
		<?php echo $form->textField($model,'award_granted_comments',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'award_granted_comments'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'chaiperson_approval'); ?>
		<?php echo $form->dropDownList($model,'chaiperson_approval', array(1=>'Yes', 0=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'chaiperson_approval'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'chaiperson_approval_date'); ?>
		<?php /* echo $form->textField($model,'chaiperson_approval_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'EmployeeRecognition[chaiperson_approval_date]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'class'=>'form-control'
			),
		));
		?>
		<?php echo $form->error($model,'chaiperson_approval_date'); ?>
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