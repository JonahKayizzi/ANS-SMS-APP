<?php
/* @var $this EvaluationDateController */
/* @var $model EvaluationDate */
/* @var $form CActiveForm */
?>

<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">
	<br/>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluation-date-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'action' => Yii::app()->createUrl('evaluationDate/create'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><b>Add Audit Schedule Item</b></p>


	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
	<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'date',
    'options'=>array(
    		'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			'showButtonPanel'=>true,
			'dateFormat'=>'yy-mm-dd',
						),
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
		'class'=>'form-control',
		'placeholder'=>'YYYY-MM-DD',
    ),
));
?>

<?php echo $form->labelEx($model,'type'); ?>
<?php /* echo $form->dropDownList($model,'type',array('Morning'=>'Morning','Afternoon'=>'Afternoon'), array('class'=>'form-control', 'style'=>'margin: 2px 0px 2px 0px;')); */ ?>
<?php echo $form->textField($model,'type', array('class'=>'form-control', 'style'=>'margin: 2px 0px 2px 0px;', 'placeholder'=>'HH:MM')); ?>

<?php echo $form->labelEx($model,'activities'); ?>

        <?php
$this->widget('KRichTextEditor', array(
    'model' => $model,
  
    'attribute' => 'activities',
    'htmlOptions' => array( 'class'=>"form-control",'rows'=>6, 'cols'=>50,'style'=>'width:100%;'),
    'options' => array(
        'theme_advanced_resizing' => 'true',
        'theme_advanced_statusbar_location' => 'bottom',
        'theme_advanced_buttons1' => "bold,italic,underline,| ,fontsizeselect ,|, bullist,numlist",
         'theme_advanced_buttons2' => false,
    ),
));
?>


				<?php echo $form->labelEx($model,'venue'); ?>
				<?php echo $form->textField($model,'venue', array('class'=>'form-control', 'style'=>'margin: 2px 0px 2px 0px;', 'placeholder'=>'Venue')); ?>
				
							<?php /* echo $form->dropDownList($model,'type',array('Internal Evaluation','Audit'), array('class'=>'form-control', 'style'=>'margin: 2px 0px 2px 0px;')); */ ?>
							

							<?php echo $form->hiddenField($model,'station_id',array('value'=>$station->id)); ?>
		
			<input type="submit" value="Create" class="form-control" />
			</div>







<?php $this->endWidget(); ?>

</div><!-- form -->