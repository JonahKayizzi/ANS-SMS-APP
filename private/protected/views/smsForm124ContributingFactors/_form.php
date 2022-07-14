<?php
/* @var $this SmsForm124ContributingFactorsController */
/* @var $model SmsForm124ContributingFactors */
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
	'id'=>'sms-form124-contributing-factors-form',
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
		<?php echo $form->labelEx($model,'details'); ?>
		<?php /* echo $form->textField($model,'details',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'details',
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
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by'); ?>
	</div>

	

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->