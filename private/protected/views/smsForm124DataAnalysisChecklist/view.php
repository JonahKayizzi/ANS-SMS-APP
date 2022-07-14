
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Risk Management 
            <small>Data Analysis Checklist #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Risk Management </li>
			<li class="active">Data Analysis Checklist #<?php echo $model->id; ?></li>
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
							<b><?php echo $model->attributeLabels()['photographos']; ?></b>
						</td>
						<td><?php echo $model->photographos; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['diagrams']; ?></b>
						</td>
						<td><?php echo $model->diagrams; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['supervisor_statements']; ?></b>
						</td>
						<td><?php echo $model->supervisor_statements; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['witness_statements']; ?></b>
						</td>
						<td><?php echo $model->witness_statements; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['employment_history']; ?></b>
						</td>
						<td><?php echo $model->employment_history; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['employee_statement']; ?></b>
						</td>
						<td><?php echo $model->employee_statement; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['walk_around_checklist']; ?></b>
						</td>
						<td><?php echo $model->walk_around_checklist; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['training_records']; ?></b>
						</td>
						<td><?php echo $model->training_records; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['police_reports']; ?></b>
						</td>
						<td><?php echo $model->police_reports; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['other']; ?></b>
						</td>
						<td><?php echo $model->other; ?></td>
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
