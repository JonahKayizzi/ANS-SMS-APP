
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>SAFETY OCCURRENCE DATA</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">SAFETY OCCURRENCE DATA</li>
          </ol>
        </section> -->

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Safety Occurrence Data</h3>
				  <h4><?php echo $model->incident->main_category; ?> #<?php echo $model->incident->id; ?> <?php echo $model->incident->number; ?> <?php echo $model->incident->occurrence; ?> @ <?php echo $model->incident->place; ?></h4>
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<style>td{border-bottom: 1px #ccc solid; border-right: 1px #ccc solid;}</style>
				<table cellpadding="2px" cellspacing="0px"  style="width: 100%;" class="table table-hover table-stripped" >
						<tr valign="top"  style="" >
							<td align="left" width="20px" ></td>
							<td align="left" width="40%" ><b>Item</b></td>
							<td align="left"><b>Tower</b></td>
							<td align="left"><b>Approach</b></td>
							<td align="left"><b>Area Control</b></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">1</td>
							<td align="left">Date of occurrence</td>
							<td align="left"><?php echo $model->date_of_occurrence; ?></td>
							<td align="left"><?php echo $model->date_of_occurrence_2; ?></td>
							<td align="left"><?php echo $model->date_of_occurrence_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">2</td>
							<td align="left">Time of occurrence</td>
							<td align="left"><?php echo $model->time_of_occurrence; ?></td>
							<td align="left"><?php echo $model->time_of_occurrence_2; ?></td>
							<td align="left"><?php echo $model->time_of_occurrence_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">3</td>
							<td align="left">Shift</td>
							<td align="left"><?php echo $model->shift; ?></td>
							<td align="left"><?php echo $model->shift_2; ?></td>
							<td align="left"><?php echo $model->shift_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">4</td>
							<td align="left">Duration of shift</td>
							<td align="left"><?php echo $model->duration_of_shift; ?></td>
							<td align="left"><?php echo $model->duration_of_shift_2; ?></td>
							<td align="left"><?php echo $model->duration_of_shift_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">5</td>
							<td align="left">Time DC logged on duty</td>
							<td align="left"><?php echo $model->time_dc_logged_on_duty; ?></td>
							<td align="left"><?php echo $model->time_dc_logged_on_duty_2; ?></td>
							<td align="left"><?php echo $model->time_dc_logged_on_duty_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">6</td>
							<td align="left">Time DC logged off duty</td>
							<td align="left"><?php echo $model->time_dc_logged_off_duty; ?></td>
							<td align="left"><?php echo $model->time_dc_logged_off_duty_2; ?></td>
							<td align="left"><?php echo $model->time_dc_logged_off_duty_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">7</td>
							<td align="left">Time/date DC reported on duty (previous shift worked)</td>
							<td align="left"><?php echo $model->time_dc_reported_on_duty; ?></td>
							<td align="left"><?php echo $model->time_dc_reported_on_duty_2; ?></td>
							<td align="left"><?php echo $model->time_dc_reported_on_duty_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">8</td>
							<td align="left">Time/date DC reported off duty (previous shift worked)</td>
							<td align="left"><?php echo $model->time_dc_reported_off_duty; ?></td>
							<td align="left"><?php echo $model->time_dc_reported_off_duty_2; ?></td>
							<td align="left"><?php echo $model->time_dc_reported_off_duty_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">9</td>
							<td align="left">No. of personnel on shift as per roster</td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_roster; ?></td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_roster_2; ?></td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_roster_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">10</td>
							<td align="left">No. of personnel on shift as per logbook entry</td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_logbook; ?></td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_logbook_2; ?></td>
							<td align="left"><?php echo $model->no_of_personnel_on_shift_logbook_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">11</td>
							<td align="left">Density of traffic</td>
							<td align="left"><?php echo $model->density_of_traffic; ?></td>
							<td align="left"><?php echo $model->density_of_traffic_2; ?></td>
							<td align="left"><?php echo $model->density_of_traffic_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">12</td>
							<td align="left">Number of trainees on shift</td>
							<td align="left"><?php echo $model->no_of_trainees_on_shift; ?></td>
							<td align="left"><?php echo $model->no_of_trainees_on_shift_2; ?></td>
							<td align="left"><?php echo $model->no_of_trainees_on_shift_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">13</td>
							<td align="left">Was the traffic handled by trainee at time of occurrence?</td>
							<td align="left"><?php echo $model->traffic_handled_by_trainee; ?></td>
							<td align="left"><?php echo $model->traffic_handled_by_trainee_2; ?></td>
							<td align="left"><?php echo $model->traffic_handled_by_trainee_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">14</td>
							<td align="left">Was the controller under any medication?</td>
							<td align="left"><?php echo $model->controller_under_medication; ?></td>
							<td align="left"><?php echo $model->controller_under_medication_2; ?></td>
							<td align="left"><?php echo $model->controller_under_medication_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">15</td>
							<td align="left">Date reported back from the last annual leave taken</td>
							<td align="left"><?php echo $model->date_from_last_annual_leave; ?></td>
							<td align="left"><?php echo $model->date_from_last_annual_leave_2; ?></td>
							<td align="left"><?php echo $model->date_from_last_annual_leave_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">16</td>
							<td align="left">Last training/course attended</td>
							<td align="left"><?php echo $model->last_training_attended; ?></td>
							<td align="left"><?php echo $model->last_training_attended_2; ?></td>
							<td align="left"><?php echo $model->last_training_attended_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">17</td>
							<td align="left">Date/time of last training/course</td>
							<td align="left"><?php echo $model->last_training_date; ?></td>
							<td align="left"><?php echo $model->last_training_date_2; ?></td>
							<td align="left"><?php echo $model->last_training_date_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">18</td>
							<td align="left">Date last proficiency undertaken</td>
							<td align="left"><?php echo $model->last_proficiency_date; ?></td>
							<td align="left"><?php echo $model->last_proficiency_date_2; ?></td>
							<td align="left"><?php echo $model->last_proficiency_date_3; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">19</td>
							<td align="left">Weather information (METAR, SPECI, etc)</td>
							<td align="left" colspan=3><?php echo $model->weather_information; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">20</td>
							<td align="left">Essential aerodrome information where applicable</td>
							<td align="left" colspan=3><?php echo $model->aerodrome_information; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">21</td>
							<td align="left">Names of all controllers on duty as per ATC logbook</td>
							<td align="left" colspan=3>
								<?php /* echo $model->controllers_on_duty; */ ?>
								<?php
								$duty_controllers = @DutyControllers::model()->findAll("sod_id = '{$_GET['sod_id']}' and incident_id = '{$_GET['incident']}' and status = 1");
								//echo "...";
								if(!empty($duty_controllers)){
									$k = 1;
									echo "<table width='100%' class='table' >";
									echo "<tr style='background-color: #ccc;'>";
									echo "<th>#</th>";
									echo "<th>Name</th>";
									echo "<th>Place</th>";
									echo "<th>Controlling</th>";
									echo "<th>Coordinating</th>";
									echo "<th>Monitoring</th>";
									echo "</tr>";
									foreach($duty_controllers as $duty_controller){
										echo "<tr>";
										echo "<td>{$k}</td>";
										echo "<td width='40%' >{$duty_controller->name}</td>";
										echo "<td width='10%'>{$duty_controller->place}</td>";
										echo "<td width='10%'>{$duty_controller->CONTROLLING}</td>";
										echo "<td width='10%'>{$duty_controller->CO0RDINATING}</td>";
										echo "<td width='10%'>{$duty_controller->MONITORING}</td>";
										
										echo "</tr>";
										$k++;
									}
									echo "</table>";
								}
								?>
							</td>
						</tr>
					</table>
					
					<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border-bottom: 0px #000 solid;" class="table table-hover table-stripped"  >
						<tr valign="top"  style="" >
							<td align="left" colspan=2><b>DC:</b> Duty controller</td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left" colspan=2>Completed by:</td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left" width="20%">Date</td>
							<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $model->modified; ?></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">Signature</td>
							<td align="left" style="border-bottom: 1px #000 dotted;"></td>
						</tr>
						<tr valign="top"  style="" >
							<td align="left">Name</td>
							<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $model->completed_by; ?></td>
						</tr>
					</table>
					
					<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border-bottom: 0px #000 solid; padding: 10px;" >
						<tr valign="top"  style="" >
							<td align="left" >Form reviewed on 28th January 2015</td>
						</tr>
					</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
