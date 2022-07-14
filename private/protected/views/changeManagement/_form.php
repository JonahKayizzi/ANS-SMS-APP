<?php
/* @var $this ChangeManagementController */
/* @var $model ChangeManagement */
/* @var $form CActiveForm */
?>
<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-management-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title_of_change'); ?>
		<?php echo $form->textField($model,'title_of_change',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'title_of_change'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'originator_name'); ?>
		<?php echo $form->textField($model,'originator_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'originator_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'originator_title'); ?>
		<?php echo $form->textField($model,'originator_title',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'originator_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'system_equipment_concerned'); ?>
		<?php echo $form->textField($model,'system_equipment_concerned',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'system_equipment_concerned'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'division'); ?>
		<?php echo $form->textField($model,'division',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'division'); ?>
	</div>
	
	<div class="form-group">
		<?php /* echo $form->labelEx($model,'affected_areas'); */ ?>
		<?php /* echo $form->textField($model,'affected_areas',array('class'=>'form-control')); */ ?>
		<?php /* echo $form->error($model,'affected_areas'); */ ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_raised'); ?>
		<?php echo $form->textField($model,'date_raised',array('class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')); ?>
		
		<?php echo $form->error($model,'date_raised'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reference_no'); ?>
		<?php echo $form->textField($model,'reference_no',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'reference_no'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'costs'); ?>
		<?php echo $form->textField($model,'costs',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'costs'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'change_description'); ?>
		<?php /* echo $form->textArea($model,'change_description',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'change_description',
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
		<?php echo $form->error($model,'change_description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'change_justification'); ?>
		<?php /* echo $form->textArea($model,'change_justification',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'change_justification',
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
		<?php echo $form->error($model,'change_justification'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'back_out_plan'); ?>
		<?php /* echo $form->textArea($model,'back_out_plan',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'back_out_plan',
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
		<?php echo $form->error($model,'back_out_plan'); ?>
	</div>

	<!--  <div class="form-group">
		<?php echo $form->labelEx($model,'affected_areas'); ?>
		<?php echo $form->textField($model,'affected_areas',array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'affected_areas'); ?>
	</div> -->
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'areas_affected'); ?>
		<?php echo $form->textField($model,'areas_affected',array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'areas_affected'); ?>
	</div>

	<div class="form-group">
		<?php /* echo $form->labelEx($model,'costs'); */ ?>
		<?php /* echo $form->textField($model,'costs',array('class'=>'form-control')); */ ?>
		<?php /* echo $form->error($model,'costs'); */ ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'proposed_implementer'); ?>
		<?php echo $form->textField($model,'proposed_implementer',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'proposed_implementer'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'recommended_by'); ?>
		<?php echo $form->textField($model,'recommended_by',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'recommended_by'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'recommendation_date'); ?>
		<?php echo $form->textField($model,'recommendation_date',array('class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')); ?>
		
		<?php echo $form->error($model,'recommendation_date'); ?>
	</div>
	
	<?php
		//switch between active and disabled form fields
		if(Yii::app()->controller->action->id == 'update'){
			$taskform = @Tasks::model()->findByAttributes(array('change_management_id'=>$model->id));	
		}else{
			$taskform = null;
		}
		
		if(!empty($taskform)){
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'approved_by'); ?>
		<?php echo $form->textField($model,'approved_by',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'approved_by'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'approval_date'); ?>
		<?php echo $form->textField($model,'approval_date',array('class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')); ?>
		
		<?php echo $form->error($model,'approval_date'); ?>
	</div>
	<?php
		}else{
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'approved_by'); ?>
		<?php echo $form->textField($model,'approved_by',array('class'=>'form-control', /* 'disabled'=>'true' */)); ?>
		<?php echo $form->error($model,'approved_by'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'approval_date'); ?>
		<?php /* echo $form->textField($model,'approval_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'ChangeManagement[approval_date]',
			'value'=>date('Y-m-d'),     
			'options'=>array(
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				'showButtonPanel'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				/* 'style'=>'width: 100%; border: 1px #ccc solid;' */
				'class'=>'form-control',
				'placeholder'=>'YYYY-MM-DD',
				/* 'disabled'=>'true', */
				'value'=>date('Y-m-d'),
			),
		));
		?>
		<?php echo $form->error($model,'approval_date'); ?>
	</div>
	<?php
		}
	?>

	

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	
	<!-- <div class="form-group" style="background-color: #ccc; padding: 5px;">Click on create first and then you will get the options to add 'Areas affected by change' and 'Costs(if any)'.</div> -->

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
