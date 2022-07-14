<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addAuditee'.$date->id,
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add Auditee to '.$station->name.' '.$date->date,
        'autoOpen'=>false,
        'overlay'=>array(
			'backgroundColor'=>'#000',
			'opacity'=>'0.5'
		),
    ),
));
?>
    <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluation-auditees-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this
	'action' => Yii::app()->createUrl('evaluationAuditors/createAuditee'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

<?php echo $form->hiddenField($model,'date_id',array('value'=>$date->id)); ?>
		<?php echo $form->hiddenField($model,'station_id',array('value'=>$station->id)); ?>
	



	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id', Users::getUsersOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	

	<div class="form-group buttons">
		<input type="submit" value="Create" class="form-control" style="background-color: #ccc;" />
	</div>

<?php $this->endWidget(); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>