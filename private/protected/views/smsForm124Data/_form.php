<?php
/* @var $this SmsForm124DataController */
/* @var $model SmsForm124Data */
/* @var $form CActiveForm */
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
$incident_info = @Incidents::model()->findByPk($incident);
?>

<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form124-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
		<?php echo $form->labelEx($model,'case_no'); ?>
		<?php 
		if(@$incident_info->number){
			echo $form->hiddenField($model,'case_no', array('value' => @$incident_info->number)); echo @$incident_info->number;
		}
		else{
			echo $form->textField($model,'case_no',array('class'=>'form-control')); 

		}
		 ?>
		<?php echo $form->error($model,'case_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type_of_incident'); ?>
		<?php echo $form->dropDownList($model,'type_of_incident',array('Injury'=>'Injury','Weather'=>'Weather','Equip'=>'Equip','Field'=>'Field','Terminal'=>'Terminal'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type_of_incident'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'employee_name'); ?>
		<?php echo $form->textField($model,'employee_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'employee_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'employee_number'); ?>
		<?php echo $form->textField($model,'employee_number',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'employee_number'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'supervisor'); ?>
		<?php echo $form->textField($model,'supervisor',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'supervisor'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'location_of_incident'); ?>
		<?php echo $form->textField($model,'location_of_incident',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'location_of_incident'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'movement_area'); ?>
		<?php echo $form->textField($model,'movement_area',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'movement_area'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hospital'); ?>
		<?php echo $form->textField($model,'hospital',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'hospital'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_of_incident'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SmsForm124Data[date_of_incident]',
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
		<?php echo $form->error($model,'date_of_incident'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_of_incident'); ?>
		<?php echo $form->textField($model,'time_of_incident',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'time_of_incident'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_reported'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SmsForm124Data[date_reported]',
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
		<?php echo $form->error($model,'date_reported'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type_of_injury'); ?>
		<?php echo $form->textField($model,'type_of_injury',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type_of_injury'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'body_part_injured'); ?>
		<?php echo $form->textField($model,'body_part_injured',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'body_part_injured'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cause_of_incident'); ?>
		<?php echo $form->textField($model,'cause_of_incident',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cause_of_incident'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'incident_site'); ?>
		<?php echo $form->textField($model,'incident_site',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'incident_site'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type_of_equipment_involved'); ?>
		<?php echo $form->textField($model,'type_of_equipment_involved',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type_of_equipment_involved'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'related_act'); ?>
		<?php echo $form->textField($model,'related_act',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'related_act'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'weather_conditions'); ?>
		<?php echo $form->textField($model,'weather_conditions',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'weather_conditions'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'incident_description'); ?>
		<?php /* echo $form->textField($model,'incident_description',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'incident_description',
			'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 200px;"),
			'options' => array(
				'theme_advanced_resizing' => 'true',
				'theme_advanced_statusbar_location' => 'bottom',
				'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
				'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
				'theme_advanced_buttons3' => '',
			),
		));
		?>
		<?php echo $form->error($model,'incident_description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'investigation'); ?>
		<?php echo $form->textField($model,'investigation',array('class'=>'form-control', 'placeholder'=>'PLEASE IGNORE THIS FIELD.')); ?>
		<?php echo $form->error($model,'investigation'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'area_supervisor'); ?>
		<?php echo $form->textField($model,'area_supervisor',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'area_supervisor'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'analysis_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SmsForm124Data[analysis_date]',
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
		<?php echo $form->error($model,'analysis_date'); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'completed_by',array('value'=>$reported_by)); ?><br />
		<?php echo $form->error($model,'completed_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->