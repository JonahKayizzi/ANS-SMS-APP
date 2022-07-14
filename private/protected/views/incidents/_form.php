<?php
/* @var $this IncidentsController */
/* @var $model Incidents */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<p class="note">Fields with <span class="required"  >*</span> are required.</p>
<span style="color: red;" ><?php echo $form->errorSummary($model); ?></span>

<div class="form-group">
	<?php echo $form->labelEx($model,'occurrence'); ?><br />
	<?php echo $form->textField($model,'occurrence',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'occurrence', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'place'); ?><br />
	<?php /* echo $form->dropDownList($model,'place', @Places::getPlaceOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
	<?php echo $form->textField($model,'place',array('value'=>@$incident->place,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'place', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'time'); ?><br />
	<?php echo $form->textField($model,'time',array('value'=>@$incident->time,'class'=>'form-control')); ?> e.g 12:54 HOURS
	<?php echo $form->error($model,'time', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'reoccuring'); ?><br />
	<?php echo $form->dropDownList($model,'reoccuring',array('0'=>'NO','1'=>'YES'), array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'reoccuring', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'main_category'); ?><br />
	<?php
	if(isset($_GET['type'])){
		echo "<b>".$_GET['type']."<b>";
		echo $form->hiddenField($model,'main_category',array('value'=>@$_GET['type'],'class'=>'form-control')); 
	}
	else{
	 echo $form->dropDownList($model,'main_category',array(NULL=>'Select occurrence type', 'Issue'=>'Issue', 'Incident'=>'Incident', 'Hazard'=>'Hazard', 'SITREP'=>'SITREP'), array('class'=>'form-control')); 
}
	 ?>
	<?php echo $form->error($model,'main_category', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'category'); ?><br />
	<select style="width: 100%;" class="form-control" name="Incidents[category]" id="Incidents_category"></select>
	<?php echo $form->error($model,'category', array('style'=>'color: red;')); ?>
</div>


<div class="form-group">
	<?php echo $form->labelEx($model,'incident_category'); ?><br />
	<?php echo $form->dropDownList($model,'incident_category',array('N/A'=>'N/A', 'Workplace'=>'Workplace', 'Aviation'=>'Aviation'), array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'incident_category', array('style'=>'color: red;')); ?>
</div>


<!-- <div class="form-group">
	<?php /* echo $form->labelEx($model,'cause_id'); */ ?><br />
	<?php /* echo $form->textField($model,'cause_id', array('class'=>'form-control')); */ ?>
	<?php /* echo $form->error($model,'cause_id', array('style'=>'color: red;')); */ ?>
</div> -->

<div class="form-group">
	<?php echo $form->labelEx($model,'other_cause_details'); ?><br />
	<?php echo $form->textField($model,'other_cause_details',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'other_cause_details', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'date'); ?><br />
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'Incidents[date]',
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
	<?php echo $form->error($model,'date', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
	<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
	<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident = NULL;} ?>
	<?php echo $form->hiddenField($model,'parent_occurrence',array('value'=>$incident)); ?>
	<?php echo $form->error($model,'parent_occurrence', array('style'=>'color: red;')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'brief_notes'); ?><br />
	<?php echo $form->textArea($model, 'brief_notes', array('maxlength' => 7000, 'class'=>'form-control')); ?>
	<?php echo $form->error($model,'brief_notes', array('style'=>'color: red;')); ?>
</div>

<div class="form-group buttons">
	<?php /* echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); */ ?>
	<input type="submit" value="Submit" class="form-control" />
</div>

<?php $this->endWidget(); ?>