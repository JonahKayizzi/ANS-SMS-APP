

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Audit Report # <?php echo $model->title; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Audit Report # <?php echo $model->title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
				<a href="index.php?r=auditReport/print&id=<?php echo $model->id?>" class="btn btn-primary pull-right" target="_blank">Print Audit Report</a>
				  
                </div><!-- /.box-header -->
				
				<div class="row">
                  <div class="col-xs-12">
					<table class="table">
						<tr>
							<td>Audit Report #<?php echo $model->id; ?></td>
							<td><?php echo $model->title; ?></td>
						</tr>
						<tr>
							<td>Audit Plan #<?php echo $model->audit_plan_id; ?></td>
							<td><?php echo CHtml::link($model->auditPlan->title, array('/auditPlan/view', 'id'=>$model->audit_plan_id)).' << <i>Click to view more details.</i>'; ?></td>
						</tr>
						<tr>
							<td>
							<?php $audit_schedule = @Station::model()->findByAttributes(array('audit_plan_id'=>$model->audit_plan_id)); ?> 
							Audit Schedule #<?php echo @$audit_schedule->id; ?></td>
							<td><?php echo CHtml::link(@$audit_schedule->name, array('/station/view', 'id'=>@$audit_schedule->id)).' << <i>Click to view more details.</i>'; ?></td>
						</tr>
					</table>
				  </div>
                </div><!-- /.box-header -->
				
                <div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="box box-default collapsed-box box-solid"   >
								<div class="box-header with-border" style="background-color: #ccc;">
								  <h3 class="box-title">Findings <i>Automatically picked from related audit form. </i></h3>
								  <div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
								  </div>
								</div><!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<?php
												$findings = @AuditForm::model()->findAll("status = 1 and audit_plan_id = '{$model->audit_plan_id}'");
												if(!empty($findings)){
											?>
											<table class="table">
												<tr>
													<th>#</th>
													<th>Findings</th>
													<th>Category</th>
													<th>Reference</th>
												</tr>
												<?php
													$k = 1;
													foreach($findings as $finding){
												?>
												<tr>
													<td><?php echo $k; ?></td>
													<td><?php echo @$finding->detailed_observation; ?></td>
													<td><?php echo @$finding->classification_of_non_conformance; ?></td>
													<td><?php echo @$finding->reference_number_of_iso_9001_or_procedure; ?></td>
												</tr>
												<?php
													$k++;
													}
												?>
												
											</table>
											<?php
												}else{
													echo "There are no findings recorded. Click ".CHtml::link('here', array('/auditForm/create'))." to submit findings.";
												}
											?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="col-md-8">
				<table class="table table-bordered" id="report_table">

				 <tr>
					<th>Field</th>
					<th colspan="3">Content</th>
					
				 </tr>
				 <?php
				foreach ($model->auditReportFields as $field) {
					?>
				<tr id="tr_<?php echo $field->id ?>">
					<td><?php echo $field->name ?></td>
					<td><?php echo $field->description ?></td>
					<td style="width:50px">	
						<a href="index.php?r=auditReportFields/update&id=<?php echo $field->id ?>">
						<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
				</a>
					</td>
					<td style="width:50px">	

						<?php
				echo CHtml::ajaxLink('<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</button>',Yii::app()->createUrl('auditReportFields/delete',array('id' => $field->id )),
				 array(
					'type'=>'POST',
						  
					'success'=>'js:function(string){ jQuery("#tr_'.$field->id.'").hide(); }'           
				),array(
					'class'=>'',
					'confirm'=>'Are you sure?' //Confirmation
					));
				?>
				<a href="index.php?r=auditReportFields/delete&id=<?php echo $field->id ?>">
						
				</a>
					</td>
				 </tr>		<?php
				}?>



				 

				</table>
				</div>
				<div class="col-md-4">
						<?php

				$this->renderPartial('reportFieldsForm', array('model' => new auditReportFields,'report'=>$model));
				 ?>
				</div>
				</div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
