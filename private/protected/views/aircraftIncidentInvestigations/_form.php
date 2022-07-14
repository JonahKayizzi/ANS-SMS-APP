<?php
/* @var $this AircraftIncidentInvestigationsController */
/* @var $model AircraftIncidentInvestigations */
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
	'id'=>'aircraft-incident-investigations-form',
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
		<?php echo $form->error($model,'incident_id', array('style'=>'color: red;')); ?>
	</div>
	
	<?php
		}else{
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'incident_id'); ?>
		<?php echo $form->dropDownList($model,'incident_id',@Incidents::model()->getOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'incident_id', array('style'=>'color: red;')); ?>
	</div>
	
	<?php } ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'aircraft_involved'); ?>
		<?php echo $form->textField($model,'aircraft_involved',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'aircraft_involved', array('style'=>'color: red;')); ?>
	</div>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'form_of_notification'); ?>
		<?php echo $form->dropDownList($model,'form_of_notification',array('Voluntary'=>'Voluntary','Mandatory'=>'Mandatory', 'Other'=>'Other'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'form_of_notification', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'category', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'level_of_investigation'); ?>
		<?php echo $form->dropDownList($model,'level_of_investigation',array('Full'=>'Full', 'Brief'=>'Brief'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'level_of_investigation', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php /* echo $form->labelEx($model,'investigators'); */ ?>
		<?php /* echo $form->textArea($model,'investigators',array('class'=>'form-control')); */ ?>
		<?php
		/* $this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'investigators',
			'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 200px;"),
			'options' => array(
				'theme_advanced_resizing' => 'true',
				'theme_advanced_statusbar_location' => 'bottom',
				'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
				'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
				'theme_advanced_buttons3' => '',
			),
		)); */
		?>
		<?php /* echo $form->error($model,'investigators'); */ ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tor'); ?>
		<?php /* echo $form->textField($model,'tor',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'tor',
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
		<?php echo $form->error($model,'tor', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_of_assignment'); ?>
		
		<?php 

$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'attribute'=>'date_of_assignment',
    // additional javascript options for the date picker plugin
   'model'=>$model,
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

		<?php echo $form->error($model,'date_of_assignment', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deadline'); ?>
				<?php 

$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'attribute'=>'deadline',
    // additional javascript options for the date picker plugin
   'model'=>$model,
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
		<?php echo $form->error($model,'deadline', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->