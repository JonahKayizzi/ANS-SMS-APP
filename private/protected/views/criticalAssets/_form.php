<?php
/* @var $this CriticalAssetsController */
/* @var $model CriticalAssets */
/* @var $form CActiveForm */
?>

<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'critical-assets-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripiton'); ?>
		<?php /* echo $form->textArea($model,'descripiton',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'descripiton',
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
		<?php echo $form->error($model,'descripiton'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->