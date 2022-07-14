<?php
/* @var $this LessonsLearntController */
/* @var $model LessonsLearnt */
/* @var $form CActiveForm */
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
	'id'=>'lessons-learnt-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<!--
	<div class="form-group">
	<style>td{border-bottom: 1px #eee solid;}</style>
	<table class="table" style="width: 100%;" >
		<tr>
			<td style="width: 50%;">
				<b>Content Type: </b>
				<?php if($content_type == 1){echo "Incident";} ?>
				<?php if($content_type == 2){echo "Workshop";} ?>
				<?php if($content_type == 3){echo "Task";} ?>
				<?php if($content_type == 4){echo "Risk Management";} ?>
				<?php if($content_type == 5){echo "Safety Audit";} ?>
				<?php if($content_type == 6){echo "Aircraft Incident Investigation";} ?>
				
				<?php if($content_type == NULL){echo "N/A";} ?>
				<?php echo $form->hiddenField($model,'content_type',array('value'=>$content_type)); ?>
			</td>
			<td>
				<b>Content ID: </b>
				<?php if($content_id == NULL){echo "N/A";}else{echo $content_id;} ?><br />
				<?php echo $form->hiddenField($model,'content_id',array('value'=>$content_id)); ?>
			</td>
		</tr>
	</table>
	</div>
	-->
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'source_type'); ?>
		<?php echo $form->dropDownList($model,'source_type', SourceTypes::model()->getOptions3(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'source_type'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'source_detail'); ?>
		<?php echo $form->textField($model,'source_detail',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'source_detail'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'safety_concern'); ?>
		<?php echo $form->textField($model,'safety_concern',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'safety_concern'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php
		$this->widget('KRichTextEditor', array(
			'model' => $model,
		  
			'attribute' => 'Description',
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
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Divission'); ?>
		<?php echo $form->dropDownList($model,'Divission',Directorates::model()->getOptions2(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Divission'); ?>
	</div>
	<?php if($content_type == 1){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model,'category',array('Issue'=>'Issue', 'Incident'=>'Incident', 'Hazard'=>'Hazard', 'SITREP'=>'SITREP'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>
	<?php }else{ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>
	<?php } ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'sub_category'); ?>
		<?php echo $form->textField($model,'sub_category',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'sub_category'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sent_to'); ?> <?php if((Users::model()->checkIfUserIsAdmin())){ ?>[Manage Groups]<?php } ?>
		<?php echo $form->dropDownList($model,'sent_to', @UserDepartments::model()->getOptions(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'sent_to'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'send_to_individual'); ?>
		<?php echo $form->textField($model,'send_to_individual', array('class'=>'form-control', 'placeholder'=>'E.g. sms@gmail.com, system@gmail.com')); ?>
		<?php echo $form->error($model,'send_to_individual'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->