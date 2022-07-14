<?php
/* @var $this SafetyLogsController */
/* @var $model SafetyLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'safety-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
	<?php echo $form->labelEx($model,'date_occured'); ?><br />
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'SafetyLogs[date_occured]',
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
	<?php echo $form->error($model,'date_occured', array('style'=>'color: red;')); ?>
</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cause'); ?>

<?php echo $form->dropDownList($model,'cause',SafetyLogsCauses::getOptions(),array('class'=>'form-control'))?>

		<?php echo $form->error($model,'cause'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
<?php echo $form->dropDownList($model,'category',SafetyLogsCategories::getOptions(),array('class'=>'form-control'))?>

		<?php echo $form->error($model,'category'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('class'=>'form-control', 'placeholder'=>'HH:MM')); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'aircraft'); ?>
		<?php echo $form->textField($model,'aircraft',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'aircraft'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'event'); ?>
		<?php echo $form->textArea($model,'event',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'event'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'registrar'); ?>
		<?php echo $form->textField($model,'registrar',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'registrar'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'operator'); ?>
		<?php echo $form->textField($model,'operator',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'operator'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'route'); ?>
		<?php echo $form->textArea($model,'route',array('class'=>'form-control', 'value'=>'n/a')); ?>
		<?php echo $form->error($model,'route'); ?>
	</div>



	<div class="form-group">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('class'=>'form-control', 'value'=>'n/a')); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'action_taken'); ?>
		<?php echo $form->textArea($model,'action_taken',array('class'=>'form-control', 'value'=>'n/a')); ?>
		<?php echo $form->error($model,'action_taken'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'entered_into_summary'); ?>
		<?php echo $form->textArea($model,'entered_into_summary',array('class'=>'form-control', 'value'=>'n/a')); ?>
		<?php echo $form->error($model,'entered_into_summary'); ?>
	</div>





	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->