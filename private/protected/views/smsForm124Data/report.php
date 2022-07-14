<?php 
$form124_data = $model; 
?>
<style> .cls1 td{border: 1px #000 solid; padding: 2px;}</style>
		<table style="width: 80%;">
			<tr>
				<td align="left"><b>SMS FORM 124 </b></td>
			</tr>
			<tr>
				<td align="left"><b>ACCIDENT AND INCIDENT INVESTIGATION</b></td>
			</tr>
		</table>
		<b>Accident/Incident Investigation Data Collection - Part 1</b>
		
		<table  style="width: 100%;" class="cls1">
			<tr>
				<td colspan="3">
					<b>Type of Incident:</b><br />
					<?php echo @$form124_data->type_of_incident; ?>
				</td>
				
				<td style="background-color: #ccc;"><b>Case #:</b></td>
				<td colspan="2"><?php echo @$form124_data->case_no; ?></td>
				
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Employee Name:</b></td>
				<td colspan="2"><?php echo @$form124_data->employee_name; ?></td>
				
				<td style="background-color: #ccc;"><b>Employee #:</b></td>
				<td colspan="2"><?php echo @$form124_data->employee_number; ?></td>
				
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Supervisor:</b></td>
				<td colspan="2"><?php echo @$form124_data->supervisor; ?></td>
				
				<td style="background-color: #ccc;"><b>Dept:</b></td>
				<td colspan="2"><?php echo @$form124_data->department; ?></td>
				
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Field Location of Incident:</b></td>
				<td colspan="2"><?php echo @$form124_data->location_of_incident; ?></td>
				
				<td style="background-color: #ccc;"><b>Movement area Y/N:</b></td>
				<td colspan="2"><?php echo @$form124_data->movement_area; ?></td>
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Hospital (if applicable):</b></td>
				<td colspan="5"><?php echo @$form124_data->hospital; ?></td>
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Date of Incident:</b></td>
				<td><?php echo @$form124_data->date_of_incident; ?></td>
				<td style="background-color: #ccc;"><b>Time of Incident:</b></td>
				<td><?php echo @$form124_data->time_of_incident; ?></td>
				<td style="background-color: #ccc;"><b>Date Reported:</b></td>
				<td><?php echo @$form124_data->date_reported; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Type of Occupational Injury/Illness or Damage:</b></td>
				<td colspan="4"><?php echo @$form124_data->type_of_injury; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Part of Body Injured or Equipment Damaged:</b></td>
				<td colspan="4"><?php echo @$form124_data->body_part_injured; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Probable Cause of Incident:</b></td>
				<td colspan="4"><?php echo @$form124_data->cause_of_incident; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Incident Site/Location of Occurrence:</b></td>
				<td colspan="4"><?php echo @$form124_data->incident_site; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Type of Equipment involved (if applicable):</b></td>
				<td colspan="4"><?php echo @$form124_data->type_of_equipment_involved; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Related Act/Condition:</b></td>
				<td colspan="4"><?php echo @$form124_data->related_act; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Weather Conditions at Time of Incident:</b></td>
				<td colspan="4"><?php echo @$form124_data->weather_conditions; ?></td>
			</tr>
			<tr>
				<td colspan="6"><b>Description of incident <i>(Describe the incident in detail):</i></b><br /><?php echo @$form124_data->incident_description; ?></td>
			</tr>
			<tr>
				<td colspan="6"><b>Investigation <i>(Provide following information when applicable: Who was interviewed, what was photographed or diagrammed what procedures were reviewed, what training records were reviewed, re-enactments, etc.):</i></b><br /><?php echo @$form124_data->investigation; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: #ccc;"><b>Area Supervisor (name of person responsible for the area the incident occurred in):</b></td>
				<td colspan="4"><?php echo @$form124_data->area_supervisor; ?></td>
			</tr>
			<tr>
				<td style="background-color: #ccc;"><b>Date of Analysis</b></td>
				<td colspan="2"><?php echo @$form124_data->analysis_date; ?></td>
				<td colspan="2" style="background-color: #ccc;"><b>This Form Completed By:</b></td>
				
				<td><?php echo @$form124_data->completed_by; ?></td>
			</tr>
		</table>
		<br />
		<b>List of Contributing Factors - Part 2</b><br />
		<?php
		@$form124_contributing_factors = @SmsForm124ContributingFactors::model()->findAll("incident_id={$model->id} and status = 1");
		if(!@empty($form124_contributing_factors)){
			$k = 1;
			echo "<table width='100%' class='cls1' >";
			foreach($form124_contributing_factors as $form124_contributing_factor){
		?>
			<tr>
				<td width="20px" style="background-color: #ccc;"><?php echo $k; ?></td>
				<td><?php echo $form124_contributing_factor->details; ?></td>
			</tr>
		<?php
			}
			echo "</table>";
		}else{
			echo "No contributing factors available.";
		}
		?>
		<br />
		<b>Corrective Actions:</b><br /><B>List Corrective Actions for Each Contributing Factor:</B><BR />
		<?php
		@$form124_corrective_actions = @SmsForm124CorrectiveActions::model()->findAll("incident_id={$model->id} and status = 1");
		if(!@empty($form124_corrective_actions)){
			$k = 1;
			echo "<table width='100%' class='cls1' >";
			foreach($form124_corrective_actions as $form124_corrective_action){
		?>
			<tr>
				<td  style="background-color: #ccc;"><b><?php echo $form124_corrective_action->action; ?></b></td>
				<td><b>Owner:</b></td>
				<td><?php echo $form124_corrective_action->owner; ?></td>
				<td><b>Est. Completion Date:</b></td>
				<td><?php echo $form124_corrective_action->completion_date; ?></td>
			</tr>
		<?php
			}
			echo "</table>";
		}else{
			echo "No corrective actions available.";
		}
		?>
		<br />
		<b>Analysis Checklist:</b><br />
		<?php @$form124_data_analysis_checklist = @SmsForm124DataAnalysisChecklist::model()->find("incident_id={$model->id} and status = 1"); ?>
		<table width="100%" class="cls1">
			<tr>
				<td>
					<ul>
						<li>Photographs - <?php echo @$form124_data_analysis_checklist->photographos; ?></li>
						<li>Witness Statement(s) - <?php echo @$form124_data_analysis_checklist->witness_statements; ?></li>
						<li>Employee Statement(s) - <?php echo @$form124_data_analysis_checklist->employee_statement; ?></li>
						<li>Diagrams - <?php echo @$form124_data_analysis_checklist->diagrams; ?></li>
					</ul>
				</td>
				<td>
					<ul>
						<li>Equipment History - <?php echo @$form124_data_analysis_checklist->employment_history; ?></li>
						<li>Walk-around Checklists - <?php echo @$form124_data_analysis_checklist->walk_around_checklist; ?></li>
						<li>Supervisor Statement(s) - <?php echo @$form124_data_analysis_checklist->supervisor_statements; ?></li>
						<li>Training Records - <?php echo @$form124_data_analysis_checklist->training_records; ?></li>
						<li>Police Reports - <?php echo @$form124_data_analysis_checklist->police_reports; ?></li>
					</ul>
				</td>
			</tr>
		</table>
		<br />
		<b>Additional Comments:</b><br />
		<table width="100%" class="cls1">
			<tr>
				<td>
					NONE
				</td>
			</tr>
		</table>