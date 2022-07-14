
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Assigned to Officers</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Assigned to Officers</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         
				<div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
				
				<?php
					$incidents = @Incidents::model()->findAll("assigned_to_officer = 1 and administrator_assigned = ".Yii::app()->user->id);
					if(!empty($incidents)){
						$k=1;
				?>
					<table class="table table-striped" id="dataTable">
						<tr>
							<th></th>
							<th>ID</th>
							<th>#</th>
							<th>Occurrence</th>
							
							<th>Occurred</th>
							<th>Reported</th>
							
							<th>Reported by</th>
							<th>Main Category</th>
							<th>Category</th>
							<th>Officer Responsible</th>
							<th></th>
						</tr>
				<?php
						foreach($incidents as $incident){
				?>
						<tr>
							<td><?php echo $k; ?></td>
							<td><?php echo CHtml::link($incident->id, array('/incidents/view', 'id'=>$incident->id)); ?></td>
							<td><?php echo CHtml::link($incident->number, array('/incidents/view', 'id'=>$incident->id)); ?></td>
							<td><?php echo $incident->occurrence; ?></td>
							
							<td><?php echo $incident->date; ?></td>
							<td><?php echo $incident->date_reported; ?></td>
							
							<td><?php echo $incident->reported_by; ?></td>
							<td><?php echo $incident->main_category; ?></td>
							<td><?php echo $incident->category; ?></td>
							<td><?php echo Users::model()->findByPk($incident->officer_assigned)->name; ?></td>
							<td>
							<?php 
								if($incident->officer_done == 1){
							?>
								<span class="label label-success">Done</span>
							<?php
								}else{
							?>
								<span class="label label-warning">Pending</span>
							<?php
								}
							?>
							</td>
						</tr>
				<?php
						$k++;
						}
				?>
					</table>
				<?php
					}else{
						echo "<div style='width: 100%; text-align: center;'>You have no occurrences assigned to any officer(s).</div>";
					}
				?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
