<?php
/* @var $this AircraftIncidentInvestigationInvestigatorsController */
/* @var $model AircraftIncidentInvestigationInvestigators */
/* @var $form CActiveForm */
if(isset($_GET['investigation'])){$investigation = $_GET['investigation'];}else{$investigation = NULL;}
$investigation_info = @AircraftIncidentInvestigations::model()->findByPk($investigation);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aircraft-incident-investigation-investigators-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'aircraft_incident_investigation_id'); ?>
		<?php echo $form->hiddenField($model,'aircraft_incident_investigation_id', array('value'=>$investigation)); echo '<br />'.CHtml::link($investigation_info->aircraft_involved, array('/aircraftIncidentInvestigations/view', 'id'=>$investigation)).' <i>Click here to go back.</i>'; ?>
		<?php echo $form->error($model,'aircraft_incident_investigation_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'investigator_id'); ?>
		<?php echo $form->dropDownList($model,'investigator_id', @Users::model()->getUsersOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'investigator_id'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->