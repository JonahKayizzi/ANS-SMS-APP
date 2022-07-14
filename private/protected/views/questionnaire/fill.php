<html>
<head>
	<style>

table {
    border-collapse: collapse;
   width:1200px;
margin:auto;
}

table, th, td {
    border: 1px solid black;
}
		table th {
    background: #BCDAE6;
    padding:5px;
    text-align: left;
   
}
textarea{
    width: 98%;
}

.number{
width:40px;
}
table tr{
border: 1px solid grey;
}
table td{
padding:5px;
border: 1px solid grey;
}
table .question{
			width:400px;
		}
		table .question{
			width:300px;
		}
	</style>
</head>
<body>
<table style="border-bottom:none;">
<tr><th><center>SAFETY MANAGEMENT SYSTEM GAP ANALYSIS</center></th></tr>

<tr style="background:#C8E6BC;"><td><center><b>Component 1 — SAFETY POLICY AND OBJECTIVES </b></center></td></tr>
</table>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questionnaire_form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<table cellspacing="0">
   <tr><th class='number'>No</th>
   	<th class='question'>Aspect to be analysed or question to be answered</th>
   		<th class='level'>Answer</th>
 		<th>Status of implementation</th>
   		<th>Action Required</th></tr>


	<?php 
	$position = 0;
	foreach($questions as $qn){ 
	include "sections.php";
	?>

 <tr>
   <td><?php echo $qn->question_no; ?></td>
   <td><?php echo $qn->question; ?></td>
   <td>
		<select name="<?php echo $qn->question_id;?>[answer]"<?php ?> >
			<option value='Yes' <?php if(@$question_answers[$position]->answer == 'Yes'){echo 'selected';} ?> >Yes</option>
			<option value='No' <?php if(@$question_answers[$position]->answer == 'No'){echo 'selected';} ?> >No</option>
			<option value='Partial' <?php if(@$question_answers[$position]->answer == 'Partial'){echo 'selected';} ?> >Partial</option>
		</select>
   </td>
   <td>
		<textarea name="<?php echo $qn->question_id;?>[status_of_implementation]" ><?php echo @$question_answers[$position]->status_of_implementation; ?></textarea>
   </td>
   <td>
		<?php
			$audit_form_info = @AuditForm::model()->findByAttributes(array('questionnaire'=>$questionnaire_id, 'questionnaire_sub_element'=>$qn->question_id));
			if(!empty($audit_form_info)){
				echo @$audit_form_info->suggested_corrective_action.'<br />';
		?>
			<?php echo CHtml::link('~Update Action Required', array('/auditForm/view', 'id'=>$audit_form_info->issue_no, 'questionnaire'=>$questionnaire_id, 'gap_analysis_sub_element'=>$qn->question_id)); ?>
		<?php
			}else{
		?>
			<?php echo CHtml::link('+Add Action Required', array('/auditForm/create', 'questionnaire'=>$questionnaire_id, 'gap_analysis_sub_element'=>$qn->question_id)); ?>
		<?php
			}
		?>
		
   </td>

 </tr>
<?php 
	$position++; 
	} 
?>
<input type="hidden" value="<?php echo $questionnaire_id; ?>" name="Questionnaire[title]">
<?php
	if(isset($_GET['form_status'])){
?>
	<input type="hidden" value="UPDATE" name="Questionnaire[form_status]">
<?php
	}
?>
</table>
<center>
<div class="row buttons"><br><br>
		<?php echo CHtml::button('Go Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> &nbsp; <?php echo CHtml::submitButton('Save Questionnaire'); ?><br><br>
	</div>
</center>
<?php $this->endWidget();?>
</body>
</html>
