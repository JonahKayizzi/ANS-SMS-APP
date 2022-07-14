<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addTarget-2',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Average # of Days to Close Occurrences Target',
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
	'id'=>'addTarget-2-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this
	'action' => Yii::app()->createUrl('incidents/kpi'),
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-group">
		<input type="text" name="kpi2" class="form-control" /> 
	</div>

	

	<div class="form-group buttons">
		<input type="submit" value="Save" class="form-control" style="background-color: #ccc;" />
	</div>

<?php $this->endWidget(); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>