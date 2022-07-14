<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;margin:auto">
	<div class="pull-right">
<h4>SMS FORM 122</h4>
	</div>
<div>
<h4>HAZARD AND RISK MANAGEMENT REGISTER FOR ANS</h4>
	</div>
<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<td rowspan="3">SN</td>
		<td rowspan="3">Description of hazard</td>
				<td rowspan="3">Description of consquences</td>
				<td colspan="5">Risk Assessment</td>
				<td>Evaluation</td>
		</tr>
		<tr >
			<td rowspan="2">Current Defences</td>
			<td rowspan="2">Current Risk Index</td>
			<td colspan="2">Further Actions to reduce the tisks</td>

			<td rowspan="2">Risk Owner</td>
			<td rowspan="2">Actual Risk Index</td>
		</tr>
		<tr>
			<td>Technical and Administrative Defences</td>
			<td>Technical Risk Index</td>
		</tr>
		</thead>
		<tbody>
		<?php
			$register_infos = @HazardRiskManagementRegister::model()->findAll("task_id = '{$_GET['id']}'");
			foreach($register_infos as $register_info){
		?>
		<tr>
			<td><?php echo $register_info->id; ?></td>
			<td><?php echo $register_info->taskStepHazard->details; ?></td>
			<td><?php echo $register_info->consequences; ?></td>
			<td><?php echo $register_info->current_defences; ?></td>
			<td><?php echo $register_info->current_risk_index; ?></td>
			<td><?php echo $register_info->tech_admin_defences; ?></td>
			<td><?php echo $register_info->theoretical_risk_index; ?></td>
			<td><?php echo $register_info->risk_owner; ?></td>
			<td><?php echo $register_info->actual_risk_index; ?></td>
		</tr>
		<?php
			}
		?>
		

		</tbody>
</table>


</div>