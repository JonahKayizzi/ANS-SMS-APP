<?php
/* @var $this SafetyRecommendationsController */
/* @var $model SafetyRecommendations */
/* @var $form CActiveForm */
/* if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;} */
$details_info = "";
?>

<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<?php if(isset($_GET['content_type'])){$content_type = $_GET['content_type'];}else{$content_type = NULL;} ?>
<?php if(isset($_GET['incident'])){$content_id = $_GET['incident']; ?>
<?php }elseif(isset($_GET['workshop'])){$content_id = $_GET['workshop']; ?>
<?php }elseif(isset($_GET['task'])){$content_id = $_GET['task']; ?>
<?php }elseif(isset($_GET['risk_m'])){$content_id = $_GET['risk_m']; ?>
<?php }elseif(isset($_GET['a-investigation'])){$content_id = $_GET['a-investigation']; ?>
<?php }elseif(isset($_GET['audit'])){$content_id = $_GET['audit'];}else{$content_id = NULL;} ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'safety-recommendations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<!-- <div class="form-group">
	<style>td{border-bottom: 1px #eee solid;}</style>
	<table class="table" style="width: 100%;" >
		<tr>
			<td style="width: 50%;">
				<b>Content Type: </b>
				<?php if($content_type == 1){echo "Incident"; $source = "Incident #{$content_id}"; $details = @Incidents::model()->findByPk($content_id); $details_info = @$details->occurrence;} ?>
				<?php if($content_type == 2){echo "Workshop"; $source = "Workshop #{$content_id}"; $details = @Workshops::model()->findByPk($content_id); $details_info = @$details->subject;} ?>
				<?php if($content_type == 3){echo "Task"; $source = "Task #{$content_id}"; $details = @Tasks::model()->findByPk($content_id); $details_info = @$details->title;} ?>
				<?php if($content_type == 4){echo "Risk Management"; $source = "Risk Management #{$content_id}"; $details = @RiskManagement::model()->findByPk($content_id); $details_info = @$details->description;} ?>
				<?php if($content_type == 5){echo "Safety Audit"; $source = "Safety Audit #{$content_id}"; /* $details_info = @Incidents::model()->findByPk($content_id); */} ?>
				<?php if($content_type == 6){echo "Aircraft Incident Investigation"; $source = "Aircraft Incident Investigation #{$content_id}"; $details = @AircraftIncidentInvestigations::model()->findByPk($content_id); $details_info = @$details->description;} ?>
				
				<?php if($content_type == NULL){echo "N/A"; $source = "N/A"; $details_info = "";} ?>
				<?php echo $form->hiddenField($model,'content_type',array('value'=>$content_type)); ?>
			</td>
			<td>
				<b>Content ID: </b>
				<?php if($content_id == NULL){echo "N/A";}else{echo $content_id;} ?><br />
				<?php echo $form->hiddenField($model,'content_id',array('value'=>$content_id)); ?>
			</td>
		</tr>
	</table>
	
	</div> -->
	
	<div class="form-group">
		<?php /* echo $form->labelEx($model,'source'); */ ?>
		<?php echo $form->hiddenField($model,'source', array('value'=>$source)); ?>
		<?php echo $form->error($model,'source', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->dropDownList($model,'source', SourceTypes::model()->getOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'source', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'source_detail'); ?>
		<?php echo $form->textField($model,'source_detail', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'source_detail', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'type_of_control'); ?> [<?php 
echo CHtml::link('Manage Main Categories', '#', array(
   'onclick'=>'$("#mainControls").dialog("open"); return false;',
));
?>] [<?php 
echo CHtml::link('Manage Sub Categories', '#', array(
   'onclick'=>'$("#subControls").dialog("open"); return false;',
));
?>]

		<?php echo $form->dropDownList($model,'type_of_control', @TypesOfControlsSub::model()->getOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type_of_control', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textField($model,'details', array('class'=>'form-control', 'value'=>$details_info)); ?>
		<?php echo $form->error($model,'details', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'causes'); ?>
		<?php /* echo $form->textArea($model,'causes', array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'causes',
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
		<?php echo $form->error($model,'causes', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'brief'); ?>
		<?php /* echo $form->textArea($model,'brief', array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'brief',
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
		<?php echo $form->error($model,'brief', array('style'=>'color: red;')); ?>
	</div>

	
	
	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'mitigation'); ?>
		<?php echo $form->textField($model,'mitigation', array('class'=>'form-control')); ?>
		<?php
		/* $this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'mitigation',
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
		<?php echo $form->error($model,'mitigation', array('style'=>'color: red;')); ?>
	</div> -->
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->dropDownList($model, 'priority', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'priority', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model' => $model,
		  
			'attribute' => 'deadline',
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>' border: 1px #ccc solid;',
								'class'=>'form-control',
								'placeholder'=>'YYYY-MM-DD',
							),
						));
						?>
		<?php echo $form->error($model,'deadline', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php /* echo $form->textArea($model,'remarks', array('class'=>'form-control')); */ ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'remarks',
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
		<?php echo $form->error($model,'remarks', array('style'=>'color: red;')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'action_by'); ?>
		<?php
			echo $form->dropDownList($model, 'action_by', @Users::model()->getImplementors(),array('class'=>'form-control'));
		?>
		<?php echo $form->error($model,'action_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group">
		<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
		<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
		<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php
$this->renderPartial('mainControls');
$this->renderPartial('subControls');
?>
</div><!-- form -->

