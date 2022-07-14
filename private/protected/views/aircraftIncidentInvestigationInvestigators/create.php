

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Aircraft Incident Investigators</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Assurance</li>
			<li class="active">Aircraft Incident Investigators</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<?php
					
				?>
				
				<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				
				<?php
					$investigators = @AircraftIncidentInvestigationInvestigators::model()->findAll("aircraft_incident_investigation_id = '{$_GET['investigation']}'");
					if(!empty($investigators)){
						$i = 1;
				?>
					<table class="table table-stripped">
						<tr>
							<th>ID</th>
							<th>Investigator</th>
							<th>Action</th>
						</tr>
					<?php foreach($investigators as $investigator){ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo @$investigator->investigator->name; ?></td>
							<td>CANCEL</td>
						</tr>
					<?php $i++; } ?>
					</table>
				<?php
					}
				?>
                  
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