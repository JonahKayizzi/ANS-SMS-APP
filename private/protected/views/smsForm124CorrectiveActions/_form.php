<?php
/* @var $this SmsForm124CorrectiveActionsController */
/* @var $model SmsForm124CorrectiveActions */
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
	'id'=>'sms-form124-corrective-actions-form',
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
		<?php echo $form->labelEx($model,'action'); ?>
		<?php /* echo $form->textField($model,'action',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'action',
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
		<?php echo $form->error($model,'action'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php /* echo $form->textField($model,'remark',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'remark',
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
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'completion_date'); ?>
		<?php /* echo $form->textField($model,'completion_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SmsForm124CorrectiveActions[completion_date]',
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
		<?php echo $form->error($model,'completion_date'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->dropDownList($model,'priority',array(0=>'0 - LOW', 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>'10 - HIGH'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'priority'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'completion_status'); ?>
		<?php echo $form->dropDownList($model,'completion_status',array('Pending'=>'Pending', 'Done'=>'Done'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'completion_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'completed_on'); ?>
		<?php /* echo $form->textField($model,'completion_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SmsForm124CorrectiveActions[completed_on]',
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
		<?php echo $form->error($model,'completed_on'); ?>
	</div>
	
	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
		<!-- <input type="submit" value="Create" class="form-control" /> -->
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->