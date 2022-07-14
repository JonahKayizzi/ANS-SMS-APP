<?php
/* @var $this RiskManagementController */
/* @var $model RiskManagement */
/* @var $form CActiveForm */
?>

<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'risk-management-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'serial_no'); ?>
		<?php echo $form->textField($model,'serial_no',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'serial_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php /* echo $form->textField($model,'description',array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'description',
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
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_risk_index'); ?>
		<?php echo $form->textField($model,'current_risk_index',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'current_risk_index'); ?>
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

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'evaluated_by'); ?>
		<?php echo $form->textField($model,'evaluated_by',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'evaluated_by'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'evaluation_date'); ?>
		<?php /* echo $form->textField($model,'evaluation_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'RiskManagement[evaluation_date]',
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
		<?php echo $form->error($model,'evaluation_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'approved_by'); ?>
		<?php echo $form->textField($model,'approved_by',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'approved_by'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'approval_date'); ?>
		<?php /* echo $form->textField($model,'approval_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'RiskManagement[approval_date]',
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
		<?php echo $form->error($model,'approval_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'next_evaluation_date'); ?>
		<?php /* echo $form->textField($model,'next_evaluation_date'); */ ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'RiskManagement[next_evaluation_date]',
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
		<?php echo $form->error($model,'next_evaluation_date'); ?>
	</div>
	
	

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->