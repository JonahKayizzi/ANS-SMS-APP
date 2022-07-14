<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'subControls',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add Sub Category',
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
	'id'=>'sub-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this
	'action' => Yii::app()->createUrl('safetyRecommendations/create'),
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-group">
	<?php
		echo CHtml::dropDownList('main_control_id', '',TypesOfControlsMain::model()->getOptions(),array('class'=>'form-control', ));
	?>
	</div>
	<div class="form-group">
	<input type="text" name="sub_control" placeholder="Add Sub Category" class="form-control" />
	</div>
	<div class="form-group">
	<input type="submit" value="Save" class="form-control" />
	</div>
<?php $this->endWidget(); 
?>
	</div>
<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');

?>