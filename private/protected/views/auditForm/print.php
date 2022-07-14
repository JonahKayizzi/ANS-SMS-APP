<?php
header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=".rand().".doc");
		header("Pragma: no-cache");
		header("Expires: 0");
?>
<style>
table{
border-collapse:collapse;
width:900px;
margin:auto;
}
td{
border:1px solid black;
padding:10px;

}

.border-left-none{
border-left:none;
}

.border-right-none{
border-right:none;
}
.border-top-none{
border-top:none;
}

.border-bottom-none{
border-bottom:none;
}
</style>
<div class='container'>
<br /><br />
<table>
<?php if(@$model->audit_plan_id != null){ ?>
    <tr>
        <td><b>Audit Plan:</b></td>
        <td><?php echo @$model->auditPlan->title; ?></td>
        
    </tr>
<?php } ?>
<?php if(@$model->questionnaire != null){ ?>
	 <tr>
        <td><b>Gap Analysis:</b></td>
        <td><?php $questionaire_info = @Questionnaire::model()->findByPk($model->questionnaire); ?><?php echo @$questionaire_info->title; ?></td>
        
    </tr>
    <tr>
        <td><b>Gap Analysis sub element:</b></td>
        <td><?php echo @$model->questionnaireQuestion->question; ?></td>
    </tr>
<?php } ?>
	  <tr>
       <td><b>Issue Date:</b></td>
        <td><?php echo $model->issue_date;  ?></td>
    </tr>
	  <tr>
        <td><b>Issue No:</b></td>
        <td><?php echo $model->issue_no; ?></td>
    </tr>
	<tr>
        <td><b>Auditor, Technical Assesor:</b></td>
        <td><?php echo $model->auditor_technical_assessor; ?></td>
    </tr>
	<tr>
        <td><b>Area Audited:</b></td>
        <td><?php echo $model->area_audited; ?></td>
    </tr>
	<tr>
        <td><b>Date of Area Audit:</b></td>
        <td><?php echo $model->area_audited_date; ?></td>
    </tr>
	<tr>
        <td><b>Auditee's Representative :</b></td>
        <td><?php echo @$model->auditRepresentative->name; ?></td>
    </tr>
	<tr>
		<td style="width: 25%">
			<b>Type of Control:</b>
		</td>
		<td><?php echo @$model->control->name; ?></td>
	</tr>
	<tr>
        <td><b>Detailed Observation:</b></td>
        <td><?php echo $model->detailed_observation; ?></td>
    </tr>
	<tr>
        <td><b>Classification of Non-conformance:</b></td>
        <td><?php echo $model->classification_of_non_conformance; ?></td>
    </tr>
	<tr>
        <td><b>Reference:</b></td>
        <td><?php echo $model->reference_number_of_iso_9001_or_procedure; ?></td>
    </tr>
</table>

</div>