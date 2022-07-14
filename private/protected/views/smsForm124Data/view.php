
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Risk Management 
            <small>Accident/Incident Investigation Data Collection  #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Risk Management </li>
			<li class="active">Accident/Incident Investigation Data Collection  #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<table class="table table-stripped">
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['id']; ?></b>
						</td>
						<td><?php echo $model->id; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['incident_id']; ?></b>
						</td>
						<td><?php echo CHtml::link(@$model->incident->occurrence, array('/incidents/view', 'id'=>$model->incident_id)); ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['type_of_incident']; ?></b>
						</td>
						<td><?php echo @$model->type_of_incident; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['case_no']; ?></b>
						</td>
						<td><?php echo $model->case_no; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['employee_name']; ?></b>
						</td>
						<td><?php echo $model->employee_name; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['employee_number']; ?></b>
						</td>
						<td><?php echo $model->employee_number; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['supervisor']; ?></b>
						</td>
						<td><?php echo $model->supervisor; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['department']; ?></b>
						</td>
						<td><?php echo $model->department; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['location_of_incident']; ?></b>
						</td>
						<td><?php echo $model->location_of_incident; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['movement_area']; ?></b>
						</td>
						<td><?php echo $model->movement_area; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['hospital']; ?></b>
						</td>
						<td><?php echo $model->hospital; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['date_of_incident']; ?></b>
						</td>
						<td><?php echo $model->date_of_incident; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['time_of_incident']; ?></b>
						</td>
						<td><?php echo $model->time_of_incident; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['date_reported']; ?></b>
						</td>
						<td><?php echo $model->date_reported; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['type_of_injury']; ?></b>
						</td>
						<td><?php echo $model->type_of_injury; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['body_part_injured']; ?></b>
						</td>
						<td><?php echo $model->body_part_injured; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['cause_of_incident']; ?></b>
						</td>
						<td><?php echo $model->cause_of_incident; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['incident_site']; ?></b>
						</td>
						<td><?php echo $model->incident_site; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['type_of_equipment_involved']; ?></b>
						</td>
						<td><?php echo $model->type_of_equipment_involved; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['related_act']; ?></b>
						</td>
						<td><?php echo $model->related_act; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['weather_conditions']; ?></b>
						</td>
						<td><?php echo $model->weather_conditions; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['incident_description']; ?></b>
						</td>
						<td><?php echo $model->incident_description; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['investigation']; ?></b>
						</td>
						<td><?php echo $model->investigation; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['area_supervisor']; ?></b>
						</td>
						<td><?php echo $model->area_supervisor; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['analysis_date']; ?></b>
						</td>
						<td><?php echo $model->analysis_date; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['completed_by']; ?></b>
						</td>
						<td><?php echo $model->completed_by; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['modified']; ?></b>
						</td>
						<td><?php echo $model->modified; ?></td>
					</tr>
				</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-xs-3">
				<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/admin')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->