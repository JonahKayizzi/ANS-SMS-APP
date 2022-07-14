<?php
header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=".rand().".doc");
		header("Pragma: no-cache");
		header("Expires: 0");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class="container">
<h1><?php echo $model->title; ?></h1>
<?php
foreach ($model->auditReportFields as $field) {
?>

<h3><?php echo $field->name ?></h3>
	<p>
		<?php echo $field->description ?>
	</p>
<?php

}
?>
<h3>Findings</h3>
<?php
												$findings = @AuditForm::model()->findAll("status = 1 and audit_plan_id = '{$model->audit_plan_id}'");
												if(!empty($findings)){
											?>
											
											<table class="table">
												<tr>
													<th>#</th>
													<th>Findings</th>
													<th>Category</th>
													<th>Reference</th>
												</tr>
												<?php
													$k = 1;
													foreach($findings as $finding){
												?>
												<tr>
													<td><?php echo $k; ?></td>
													<td><?php echo @$finding->detailed_observation; ?></td>
													<td><?php echo @$finding->classification_of_non_conformance; ?></td>
													<td><?php echo @$finding->reference_number_of_iso_9001_or_procedure; ?></td>
												</tr>
												<?php
													$k++;
													}
												?>
												
											</table>
											<?php
												}else{
													echo "There are no findings recorded.";
												}
											?>
</div>