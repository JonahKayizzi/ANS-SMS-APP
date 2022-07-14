<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'assignOfficer',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Assign to Officer',
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
	'id'=>'assign-officer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this
	'action' => Yii::app()->createUrl('incidents/assignToOfficer'),
	'enableAjaxValidation'=>false,
)); ?>
	<input type="hidden" name="incident" value="<?php echo $model->id; ?>" />
	<input type="hidden" name="incident_number" value="<?php echo $model->number; ?>" />
	<div class="form-group">
		<b>Officer's Name: </b><br />
		<?php
			echo CHtml::dropDownList('officer', '',Users::model()->getOfficers(),array('class'=>'form-control', ));
		?>
	</div>

	<div class="form-group">
		<b>Message: </b><br />
		<textarea name="message" class="form-control"></textarea>
	</div>

	<div class="form-group buttons">
		<input type="submit" value="Submit" class="form-control" style="background-color: #ccc;" />
	</div>

<?php $this->endWidget(); ?>
	</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>