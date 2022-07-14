<?php
/* @var $this AuditFormController */
/* @var $model AuditForm */
/* @var $form CActiveForm */
if(isset($_GET['plan'])){$plan = $_GET['plan'];}else{$plan = NULL;}
$plan_info = @AuditPlan::model()->findByPk($plan);
?>
<?php
	if(isset($_GET['questionnaire'])){
		$questionnaire = $_GET['questionnaire'];
	}else{
		$questionnaire = NULL;
	}
	if(isset($_GET['gap_analysis_sub_element'])){
		$gap_analysis_sub_element = $_GET['gap_analysis_sub_element'];
	}else{
		$gap_analysis_sub_element = NULL;
	}
?>
<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>

<div class="form">
<style>
textarea{
width:100%;
}
</style>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'audit-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<table class="table">

		<?php if($questionnaire == NULL){ ?>

		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'audit_plan_id'); ?><br /> 
				<?php if($plan == NULL){ ?>
				<?php echo $form->dropDownList($model,'audit_plan_id', @AuditPlan::model()->getOptions(),array('class'=>'form-control')); ?><br /> 
				<?php }else{ ?>
				<?php echo $form->hiddenField($model,'audit_plan_id', array('value'=>$plan)); echo CHtml::link($plan_info->title, array('/auditPlan/view', 'id'=>$plan)).' << Click to view details.'; ?><br /> 
				<?php } ?>
				
				<?php echo $form->error($model,'audit_plan_id'); ?>
				
				
				<?php echo $form->hiddenField($model,'questionnaire', array('value'=>$questionnaire)); ?>
				<?php echo $form->hiddenField($model,'questionnaire_sub_element', array('value'=>$gap_analysis_sub_element)); ?>
			</td>
			
		</tr>
		<?php } ?>
		<?php if(isset($_GET['questionnaire'])){ ?>
		<tr style="background-color: #ccc;" >
			<td colspan="2">
				<?php echo $form->hiddenField($model,'questionnaire', array('value'=>$questionnaire)); ?>
				<?php echo CHtml::link(@Questionnaire::model()->findByPk($questionnaire)->title, array('/questionnaire/view', 'id'=>$questionnaire)); ?> << Click here to go back.
			</td>
			
		</tr>
		<?php }else{ ?>
		<tr style="background-color: #ccc;" >
			<td colspan="2">
				<?php echo $form->labelEx($model,'questionnaire'); ?>
				<?php echo $form->dropDownList($model,'questionnaire', @Questionnaire::model()->getOptions(),array('class'=>'form-control')); ?><br /> 
				<?php echo $form->error($model,'questionnaire'); ?>
			</td>
			
		</tr>
		<?php } ?>
		<?php if(isset($_GET['gap_analysis_sub_element'])){ ?>
		<tr style="background-color: #ccc;" >
			<td colspan="2">
				<?php echo $form->hiddenField($model,'questionnaire_sub_element', array('value'=>$gap_analysis_sub_element)); ?>
			</td>
			
		</tr>
		<?php }else{ ?>
		<tr style="background-color: #ccc;" >
			<td colspan="2">
				<?php echo $form->labelEx($model,'questionnaire_sub_element'); ?>
				<?php echo $form->dropDownList($model,'questionnaire_sub_element', @QuestionnaireQuestions::model()->getOptions(),array('class'=>'form-control')); ?><br /> 
				<?php echo $form->error($model,'questionnaire_sub_element'); ?>
			</td>
			
		</tr>
		<?php } ?>
		<!-- <tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'issue_date'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[issue_date]',
							/* 'value'=>date('Y-m-d'),  */    
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
						?><br /> 
			<?php echo $form->error($model,'issue_date'); ?>
			</td>
			
		</tr> -->
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'auditor_technical_assessor'); ?>
				<?php echo $form->textField($model,'auditor_technical_assessor',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'auditor_technical_assessor'); ?>
			</td>
			
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'area_audited'); ?>
				<?php echo $form->textField($model,'area_audited',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'area_audited'); ?>
			</td>
			<td>
				<?php echo $form->labelEx($model,'area_audited_date'); ?>

<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[area_audited_date]',
							/* 'value'=>date('Y-m-d'),   */   
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
						?><br />
				<?php echo $form->error($model,'area_audited_date'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'auditees_representative'); ?>
				<?php /* echo $form->textField($model,'auditees_representative',array('class'=>'form-control')); */ ?>
				<?php
					echo $form->dropDownList($model, 'auditees_representative', @Users::model()->getAuditeeRepresentatives(),array('class'=>'form-control'));
				?>
				<?php echo $form->error($model,'auditees_representative'); ?>
			</td>

		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'type_of_control'); ?>
				<?php
					echo $form->dropDownList($model, 'type_of_control', @TypesOfControlsSub::model()->getOptions(),array('class'=>'form-control'));
				?>
				<?php echo $form->error($model,'type_of_control'); ?>
			</td>

		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'detailed_observation'); ?>
				<?php /* echo $form->textArea($model,'detailed_observation',array('class'=>'form-control')); */ ?>
				<?php
				$this->widget('KRichTextEditor', array(
					'model' => $model,
				  
					'attribute' => 'detailed_observation',
					'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px;"),
					'options' => array(
						'theme_advanced_resizing' => 'true',
						'theme_advanced_statusbar_location' => 'bottom',
						'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
						'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
						'theme_advanced_buttons3' => '',
					),
				));
				?>
				<?php echo $form->error($model,'detailed_observation'); ?>
			</td>
		</tr>

		<tr>
			<td>
				<?php echo $form->labelEx($model,'classification_of_non_conformance'); ?>
				<?php echo $form->dropDownList($model,'classification_of_non_conformance',array('minor'=>'minor','major'=>'major','observation'=>'observation'),array('class'=>'form-control')); ?>


				<?php echo $form->error($model,'classification_of_non_conformance'); ?>
			</td>
			<td>
				<?php echo $form->labelEx($model,'reference_number_of_iso_9001_or_procedure'); ?>
				<?php echo $form->textField($model,'reference_number_of_iso_9001_or_procedure',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'reference_number_of_iso_9001_or_procedure'); ?>
			</td>
		</tr>
		<!--
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'root_cause_analysis_of_non_conformance'); ?>
				<?php /* echo $form->textArea($model,'root_cause_analysis_of_non_conformance',array('class'=>'form-control')); */ ?>
				<?php
				$this->widget('KRichTextEditor', array(
					'model' => $model,
				  
					'attribute' => 'root_cause_analysis_of_non_conformance',
					'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px;"),
					'options' => array(
						'theme_advanced_resizing' => 'true',
						'theme_advanced_statusbar_location' => 'bottom',
						'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
						'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
						'theme_advanced_buttons3' => '',
					),
				));
				?>
				<?php echo $form->error($model,'root_cause_analysis_of_non_conformance'); ?>
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'suggested_corrective_action'); ?>
			<?php /* echo $form->textArea($model,'suggested_corrective_action',array('class'=>'form-control')); */ ?>
			<?php
				$this->widget('KRichTextEditor', array(
					'model' => $model,
				  
					'attribute' => 'suggested_corrective_action',
					'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px;"),
					'options' => array(
						'theme_advanced_resizing' => 'true',
						'theme_advanced_statusbar_location' => 'bottom',
						'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
						'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
						'theme_advanced_buttons3' => '',
					),
				));
				?>
			<?php echo $form->error($model,'suggested_corrective_action'); ?>	
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'proposed_date_of_realisation'); ?>
			
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[proposed_date_of_realisation]',
							/* 'value'=>date('Y-m-d'),  */    
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
						?><br />
			<?php echo $form->error($model,'proposed_date_of_realisation'); ?>
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'priority'); ?>
			<select class="form-control" name="AuditForm[priority]">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
			<br />
			<?php echo $form->error($model,'priority'); ?>
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'verification_of_proof'); ?>
				<?php /* echo $form->textArea($model,'verification_of_proof',array('class'=>'form-control')); */ ?>
				<?php
				$this->widget('KRichTextEditor', array(
					'model' => $model,
				  
					'attribute' => 'verification_of_proof',
					'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px;"),
					'options' => array(
						'theme_advanced_resizing' => 'true',
						'theme_advanced_statusbar_location' => 'bottom',
						'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
						'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
						'theme_advanced_buttons3' => '',
					),
				));
				?>
				<?php echo $form->error($model,'verification_of_proof'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'verification_of_proof_date'); ?>
				
<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[verification_of_proof_date]',
							/* 'value'=>date('Y-m-d'),  */    
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
						?><br />
				<?php echo $form->error($model,'verification_of_proof_date'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'lead_auditors_comments'); ?>
				<?php /* echo $form->textArea($model,'lead_auditors_comments',array('class'=>'form-control')); */ ?>
				<?php
				$this->widget('KRichTextEditor', array(
					'model' => $model,
				  
					'attribute' => 'lead_auditors_comments',
					'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px;"),
					'options' => array(
						'theme_advanced_resizing' => 'true',
						'theme_advanced_statusbar_location' => 'bottom',
						'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
						'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
						'theme_advanced_buttons3' => '',
					),
				));
				?>
				<?php echo $form->error($model,'lead_auditors_comments'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'lead_auditors_comments_date'); ?>
<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[lead_auditors_comments_date]',
							/* 'value'=>date('Y-m-d'),  */    
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
						?><br />
<?php echo $form->error($model,'lead_auditors_comments_date'); ?>	
			</td>
		</tr>
		-->
	</table>



	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->