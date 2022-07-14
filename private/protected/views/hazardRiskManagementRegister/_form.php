<?php
/* @var $this HazardRiskManagementRegisterController */
/* @var $model HazardRiskManagementRegister */
/* @var $form CActiveForm */
if(isset($_GET['hazard'])){$hazard = $_GET['hazard'];}else{$hazard = NULL;}
$hazard_info = @TaskStepHazards::model()->findByPk($hazard);
if(isset($_GET['task'])){$task = $_GET['task'];}else{$task = NULL;}
$task_info = @Tasks::model()->findByPk($task);
?>
<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hazard-risk-management-register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php if($task == NULL){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'task_id'); ?>
		<?php echo $form->dropDownList($model,'task_id',@Tasks::model()->getOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>
	<?php }else{ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'task_id'); ?><br />
		<?php echo "#{$task} ".CHtml::link($task_info->title, array('/tasks/view', 'id'=>$task)).' << <i>Click here for details.</i>'; ?><br />
		<?php echo $form->hiddenField($model,'task_id',array('value'=>$task)); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>
	<?php } ?>
	
	<?php if($hazard == NULL){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'task_step_hazard_id'); ?>
		<?php echo $form->dropDownList($model,'task_step_hazard_id',@TaskStepHazards::model()->getOptions(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'task_step_hazard_id'); ?>
	</div>
	<?php }else{ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'task_step_hazard_id'); ?><br />
		<?php echo "#{$hazard} ".$hazard_info->details; ?><br />
		<?php echo $form->hiddenField($model,'task_step_hazard_id',array('value'=>$hazard)); ?>
		<?php echo $form->error($model,'task_step_hazard_id'); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'consequences'); ?>
		<?php /* echo $form->textArea($model,'consequences',array('class'=>'form-control')); */ ?>
		<?php
		/* $this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'consequences',
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
		<?php echo $form->textField($model,'consequences',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'consequences'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_defences'); ?>
		<?php /* echo $form->textArea($model,'current_defences',array('class'=>'form-control')); */ ?>
		<?php
		/* $this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'current_defences',
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
		<?php echo $form->textField($model,'current_defences',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'current_defences'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_risk_index'); ?>
		<?php echo $form->textField($model,'current_risk_index',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'current_risk_index'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tech_admin_defences'); ?>
		<?php /* echo $form->textArea($model,'tech_admin_defences',array('class'=>'form-control')); */ ?>
		<?php
		/* $this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'tech_admin_defences',
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
		<?php echo $form->textField($model,'tech_admin_defences',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'tech_admin_defences'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'theoretical_risk_index'); ?>
		<?php echo $form->textField($model,'theoretical_risk_index',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'theoretical_risk_index'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'risk_owner'); ?>
		<?php echo $form->textField($model,'risk_owner',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'risk_owner'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'actual_risk_index'); ?>
		<?php echo $form->textField($model,'actual_risk_index',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'actual_risk_index'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->