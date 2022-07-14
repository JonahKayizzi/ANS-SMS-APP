<?php $incident = @Incidents::model()->findByPk($_GET['incident']); ?>
<?php $sod = @SafetyOccurrenceData::model()->findByPk($_GET['sod_id']); ?>

<style>td{border-bottom: 1px #ccc solid;}</style>
<table class="table table-hover table-striped" >
		<tr valign="top"  style="" >
			<td align="left" width="20px" ></td>
			<td align="left" width="20%" ><b>Item</b></td>
			<td align="left"><b>Tower</b></td>
			<td align="left"><b>Approach</b></td>
			<td align="left"><b>Area Control</b></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">1</td>
			<td align="left">Date of occurrence</td>
			<td align="left"><?php echo $sod->date_of_occurrence; ?></td>
			<td align="left"><?php echo $sod->date_of_occurrence_2; ?></td>
			<td align="left"><?php echo $sod->date_of_occurrence_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">2</td>
			<td align="left">Time of occurrence</td>
			<td align="left"><?php echo $sod->time_of_occurrence; ?></td>
			<td align="left"><?php echo $sod->time_of_occurrence_2; ?></td>
			<td align="left"><?php echo $sod->time_of_occurrence_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">3</td>
			<td align="left">Shift</td>
			<td align="left"><?php echo $sod->shift; ?></td>
			<td align="left"><?php echo $sod->shift_2; ?></td>
			<td align="left"><?php echo $sod->shift_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">4</td>
			<td align="left">Duration of shift</td>
			<td align="left"><?php echo $sod->duration_of_shift; ?></td>
			<td align="left"><?php echo $sod->duration_of_shift_2; ?></td>
			<td align="left"><?php echo $sod->duration_of_shift_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">5</td>
			<td align="left">Time DC logged on duty</td>
			<td align="left"><?php echo $sod->time_dc_logged_on_duty; ?></td>
			<td align="left"><?php echo $sod->time_dc_logged_on_duty_2; ?></td>
			<td align="left"><?php echo $sod->time_dc_logged_on_duty_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">6</td>
			<td align="left">Time DC logged off duty</td>
			<td align="left"><?php echo $sod->time_dc_logged_off_duty; ?></td>
			<td align="left"><?php echo $sod->time_dc_logged_off_duty_2; ?></td>
			<td align="left"><?php echo $sod->time_dc_logged_off_duty_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">7</td>
			<td align="left">Time/date DC reported on duty (previous shift worked)</td>
			<td align="left"><?php echo $sod->time_dc_reported_on_duty; ?></td>
			<td align="left"><?php echo $sod->time_dc_reported_on_duty_2; ?></td>
			<td align="left"><?php echo $sod->time_dc_reported_on_duty_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">8</td>
			<td align="left">Time/date DC reported off duty (previous shift worked)</td>
			<td align="left"><?php echo $sod->time_dc_reported_off_duty; ?></td>
			<td align="left"><?php echo $sod->time_dc_reported_off_duty_2; ?></td>
			<td align="left"><?php echo $sod->time_dc_reported_off_duty_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">9</td>
			<td align="left">No. of personnel on shift as per roster</td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_roster; ?></td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_roster_2; ?></td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_roster_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">10</td>
			<td align="left">No. of personnel on shift as per logbook entry</td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_logbook; ?></td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_logbook_2; ?></td>
			<td align="left"><?php echo $sod->no_of_personnel_on_shift_logbook_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">11</td>
			<td align="left">Density of traffic</td>
			<td align="left"><?php echo $sod->density_of_traffic; ?></td>
			<td align="left"><?php echo $sod->density_of_traffic_2; ?></td>
			<td align="left"><?php echo $sod->density_of_traffic_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">12</td>
			<td align="left">Number of trainees on shift</td>
			<td align="left"><?php echo $sod->no_of_trainees_on_shift; ?></td>
			<td align="left"><?php echo $sod->no_of_trainees_on_shift_2; ?></td>
			<td align="left"><?php echo $sod->no_of_trainees_on_shift_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">13</td>
			<td align="left">Was the traffic handled by trainee at time of occurrence?</td>
			<td align="left"><?php echo $sod->traffic_handled_by_trainee; ?></td>
			<td align="left"><?php echo $sod->traffic_handled_by_trainee_2; ?></td>
			<td align="left"><?php echo $sod->traffic_handled_by_trainee_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">14</td>
			<td align="left">Was the controller under any medication?</td>
			<td align="left"><?php echo $sod->controller_under_medication; ?></td>
			<td align="left"><?php echo $sod->controller_under_medication_2; ?></td>
			<td align="left"><?php echo $sod->controller_under_medication_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">15</td>
			<td align="left">Date reported back from the last annual leave taken</td>
			<td align="left"><?php echo $sod->date_from_last_annual_leave; ?></td>
			<td align="left"><?php echo $sod->date_from_last_annual_leave_2; ?></td>
			<td align="left"><?php echo $sod->date_from_last_annual_leave_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">16</td>
			<td align="left">Last training/course attended</td>
			<td align="left"><?php echo $sod->last_training_attended; ?></td>
			<td align="left"><?php echo $sod->last_training_attended_2; ?></td>
			<td align="left"><?php echo $sod->last_training_attended_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">17</td>
			<td align="left">Date/time of last training/course</td>
			<td align="left"><?php echo $sod->last_training_date; ?></td>
			<td align="left"><?php echo $sod->last_training_date_2; ?></td>
			<td align="left"><?php echo $sod->last_training_date_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">18</td>
			<td align="left">Date last proficiency undertaken</td>
			<td align="left"><?php echo $sod->last_proficiency_date; ?></td>
			<td align="left"><?php echo $sod->last_proficiency_date_2; ?></td>
			<td align="left"><?php echo $sod->last_proficiency_date_3; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">19</td>
			<td align="left">Weather information (METAR, SPECI, etc)</td>
			<td align="left" colspan=3><?php echo $sod->weather_information; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">20</td>
			<td align="left">Essential aerodrome information where applicable</td>
			<td align="left" colspan=3><?php echo $sod->aerodrome_information; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">21</td>
			<td align="left">Names of all controllers on duty as per ATC logbook</td>
			<td align="left" colspan=3>
			
			<?php
			if(isset($_GET['action'])&&($_GET['action']=='del')){
				if(@DutyControllers::model()->updateByPk($_GET['id'], array('status'=>0))){
					echo "<div style='padding: 2px; background-color: red; color: #fff;' >Duty controller #{$_GET['id']} has been deleted successfully.</div>";
				}
			}
			?>
			
			<?php
			$duty_controllers = @DutyControllers::model()->findAll("sod_id = '{$_GET['sod_id']}' and incident_id = '{$_GET['incident']}' and status = 1");
			
			if(!empty($duty_controllers)){
				$k = 1;
				echo "<table width='100%' class='table table-striped' >";
				echo "<tr style='background-color: #ccc;'>";
				echo "<th>#</th>";
				echo "<th>Name</th>";
				echo "<th>Place</th>";
				echo "<th>Controlling</th>";
				echo "<th>Coordinating</th>";
				echo "<th>Monitoring</th>";
				echo "<th></th>";
				echo "</tr>";
				foreach($duty_controllers as $duty_controller){
					echo "<tr>";
					echo "<td>{$k}</td>";
					echo "<td width='40%' >{$duty_controller->name}</td>";
					echo "<td width='10%'>{$duty_controller->place}</td>";
					echo "<td width='10%'>{$duty_controller->CONTROLLING}</td>";
					echo "<td width='10%'>{$duty_controller->CO0RDINATING}</td>";
					echo "<td width='10%'>{$duty_controller->MONITORING}</td>";
					echo "<td >".CHtml::link('<img src="images/delete.png" />', array('create', 'incident'=>$_GET['incident'], 'sod_id'=>$_GET['sod_id'], 'action'=>'del', 'id'=>$duty_controller->id), array('confirm'=>'Are you sure?', 'style'=>''))."</td>";
					echo "</tr>";
					$k++;
				}
				echo "</table>";
			}
			?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'duty-controllers-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			<?php echo $form->errorSummary($model); ?>
				<table style="background-color: #63b8db;" class="table" >
					<tr>
						<td width="40%" >
						<?php echo $form->labelEx($model,'name'); ?>
						<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
						<?php /* echo $form->error($model,'name'); */ ?>
						</td>
						<td width="10%" >
						<?php echo $form->labelEx($model,'place'); ?>
						<?php echo $form->dropDownList($model,'place', array('Tower'=>'Tower', 'Approach'=>'Approach', 'Air Control'=>'Air Control')); ?>
						<?php /* echo $form->error($model,'place'); */ ?>
						</td>
						<td width="10%">
						<?php echo $form->labelEx($model,'CONTROLLING'); ?>
						<?php echo $form->dropDownList($model,'CONTROLLING', array('0'=>'No', '1'=>'Yes')); ?>
						<?php /* echo $form->error($model,'CONTROLLING'); */ ?>
						</td>
						<td width="10%">
						<?php echo $form->labelEx($model,'CO0RDINATING'); ?>
						<?php echo $form->dropDownList($model,'CO0RDINATING', array('0'=>'No', '1'=>'Yes')); ?>
						<?php /* echo $form->error($model,'CO0RDINATING'); */ ?>
						</td>
						<td width="10%">
						<?php echo $form->labelEx($model,'MONITORING'); ?>
						<?php echo $form->dropDownList($model,'MONITORING', array('0'=>'No', '1'=>'Yes')); ?>
						<?php /* echo $form->error($model,'MONITORING'); */ ?>
						</td>
						<td>
						<?php echo $form->hiddenField($model,'sod_id', array('value'=>$_GET['sod_id'])); ?>
						<?php echo $form->hiddenField($model,'incident_id', array('value'=>$_GET['incident'])); ?>
						</td>
						<td>
						<br /><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
						</td>
					</tr>
				</table>
			<?php $this->endWidget(); ?>
			</td>
		</tr>
	</table>