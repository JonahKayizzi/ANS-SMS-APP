
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management 
            <small>Corrective Actions #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management </li>
			<li class="active">Corrective Actions #<?php echo $model->id; ?></li>
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
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['incident_id']; ?></b>
						</td>
						<td><?php echo CHtml::link(@$model->incident->occurrence, array('/incidents/view', 'id'=>$model->incident_id)); ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['action']; ?></b>
						</td>
						<td><?php echo $model->action; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['remark']; ?></b>
						</td>
						<td><?php echo $model->remark; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['owner']; ?></b>
						</td>
						<td><?php echo $model->owner; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['completion_date']; ?></b>
						</td>
						<td><?php echo $model->completion_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['modified']; ?></b>
						</td>
						<td><?php echo $model->modified; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['reported_by']; ?></b>
						</td>
						<td><?php echo $model->reported_by; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['priority']; ?></b>
						</td>
						<td><?php echo $model->priority; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['completed_on']; ?></b>
						</td>
						<td><?php echo $model->completed_on; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['completion_status']; ?></b>
						</td>
						<td><?php echo $model->completion_status; ?></td>
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
