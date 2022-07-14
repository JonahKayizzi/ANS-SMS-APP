
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Monitor Effectivenss</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Monitor Effectivenss</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

				<div class="row">
					<div class="col-xs-12">
						
						<?php echo CHtml::link('<i class="fa fa-pie-chart"></i> Charts', array('incidents/riskAnalyseRecurring'), array('class'=>'btn btn-app', 'style'=>'background-color: #3C8DBC; color: #fff;')); ?>
					</div>
				</div>
				<div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
				<style>
						#dataTable_filter{text-align: right;}
					</style>
				
				<?php
					$criteria = new CDbCriteria();
					$criteria->select= "DISTINCT incident_id";
					$criteria->condition = "reoccurring = 1"; 
					$reoccuring_incidents = @MonitoringPerformance::model()->findAll($criteria);
					if(!empty($reoccuring_incidents)){
				?>
					<table class="table dataTable_filter">
						<tr>
							<td>#</td>
							<td><b>Occurrence</b></td>
							<td><b>Date Reported</b></td>
							<td><b>Cause(s)</b></td>
							<td><b>Consequence(s)</b></td>
						</tr>
						<?php
							foreach($reoccuring_incidents as $row){
						?>
						<tr>
							<td><?php echo CHtml::link(@$row->incident->number, array('/incidents/view', 'id'=>@$row->incident->id)); ?></td>
							<td><?php echo @$row->incident->occurrence; ?></td>
							<td><?php echo @$row->incident->date_reported; ?></td>
							<td><?php
								$causes = @IncidentsCauses::model()->findAll("incident_id = ".@$row->incident->id);
								foreach($causes as $cause){
									echo "<li>".@$cause->cause->name."</li>";
								}
							?></td>
							<td><?php
								$consequences = @IncidentsConsequences::model()->findAll("incident_id = ".@$row->incident->id);
								foreach($consequences as $consequence){
									echo "<li>".@$consequence->consequence->name."</li>";
								}
							?></td>
						</tr>
						<?php } ?>
					</table>
				<?php
					}
				?>
				
				
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
