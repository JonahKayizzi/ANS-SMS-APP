<?php
/* @var $this SmsForm124DataAnalysisChecklistController */
/* @var $model SmsForm124DataAnalysisChecklist */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
$incident_info = @Incidents::model()->findByPk($incident);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form124-data-analysis-checklist-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php
		if(isset($_GET['incident'])){
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'incident_id'); ?>
		<?php echo $form->hiddenField($model,'incident_id', array('value' => $incident)); echo '# '.$incident; echo @$incident_info->number; ?><br /><?php echo CHtml::link(@$incident_info->occurrence, array('/incidents/view', 'id'=>$incident)); ?> (<i>Click to go back</i>)
		<?php echo $form->error($model,'incident_id'); ?>
	</div>
	<?php
		}else{
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'incident_id'); ?>
		<?php echo $form->dropDownList($model,'incident_id',@Incidents::model()->getOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'incident_id'); ?>
	</div>
	<?php } ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'photographos'); ?>
		<?php echo $form->dropDownList($model,'photographos',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'photographos'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'diagrams'); ?>
		<?php echo $form->dropDownList($model,'diagrams',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'diagrams'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'supervisor_statements'); ?>
		<?php echo $form->dropDownList($model,'supervisor_statements',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'supervisor_statements'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'witness_statements'); ?>
		<?php echo $form->dropDownList($model,'witness_statements',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'witness_statements'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'employment_history'); ?>
		<?php echo $form->dropDownList($model,'employment_history',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'employment_history'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'employee_statement'); ?>
		<?php echo $form->dropDownList($model,'employee_statement',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'employee_statement'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'walk_around_checklist'); ?>
		<?php echo $form->dropDownList($model,'walk_around_checklist',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'walk_around_checklist'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'training_records'); ?>
		<?php echo $form->dropDownList($model,'training_records',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'training_records'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'police_reports'); ?>
		<?php echo $form->dropDownList($model,'police_reports',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'police_reports'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'other'); ?>
		<?php echo $form->dropDownList($model,'other',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'other'); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?><br />
		<?php /* echo $form->error($model,'reported_by', array('style'=>'color: red;')); */ ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->