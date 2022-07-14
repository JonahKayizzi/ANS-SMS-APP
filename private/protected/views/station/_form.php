<?php
/* @var $this StationController */
/* @var $model Station */
/* @var $form CActiveForm */
if(isset($_GET['plan'])){$plan = $_GET['plan'];}else{$plan = NULL;}
$plan_info = @AuditPlan::model()->findByPk($plan);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'station-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php
		if($plan == NULL){
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'audit_plan_id'); ?>
		<?php echo $form->dropDownList($model,'audit_plan_id',@AuditPlan::model()->getOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'audit_plan_id'); ?>
	</div>
	<?php
		}else{
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'audit_plan_id'); ?>
		<?php echo '<br />'.CHtml::link($plan_info->title, array('/auditPlan/view', 'id'=>$plan)).' << Click to go back'; ?>
		<?php echo $form->hiddenField($model, 'audit_plan_id', array('value'=>$plan)); ?>
		<?php echo $form->error($model,'audit_plan_id'); ?>
	</div>
	<?php
		}
	?>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create Audit Schedule' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->