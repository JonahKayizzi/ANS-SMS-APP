
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Audit Plan #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Audit Plan #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
			 <div class="row">
            <div class="col-xs-12">

              
			  
			  <div class="box">
                <div class="box-header with-border">
                  
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
				 &nbsp; <a href="index.php?r=auditPlan/print&id=<?php echo $model->id?>" class="btn btn-primary pull-right" target="_blank" style="margin-left: 5px;">Print Audit Plan</a> &nbsp; 
				 <?php 
					$audit_schedule = @Station::model()->findByAttributes(array('audit_plan_id'=>$model->id));
					if(empty($audit_schedule)){
						echo CHtml::link('Audit Schedule', array('/station/create', 'plan'=>$model->id), array('class'=>'btn btn-info pull-right'));
					}else{
						echo CHtml::link('Audit Schedule', array('/station/view', 'id'=>$audit_schedule->id), array('class'=>'btn btn-info pull-right'));
					}
				 ?> &nbsp; <a href="index.php?r=auditForm/create&plan=<?php echo $model->id?>" class="btn btn-info pull-right" style="margin-left: 5px; margin-right: 5px;">New Audit Form</a> &nbsp;  
				 
				  <?php 
					$audit_report = @AuditReport::model()->findByAttributes(array('audit_plan_id'=>$model->id));
					if(empty($audit_report)){
						echo CHtml::link('Audit Report', array('/auditReport/create', 'plan'=>$model->id), array('class'=>'btn btn-info pull-right'));
					}else{
						echo CHtml::link('Audit Report', array('/auditReport/view', 'id'=>$audit_report->id), array('class'=>'btn btn-info pull-right'));
					}
				 ?>
				  
                </div><!-- /.box-header -->
				
				<div class="box-header with-border">
                  <h3 class="box-title">Audit Plan #<?php echo $model->title; ?></h3>
				  
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<div class="row">
					<div class="col-md-8">
				<table class="table table-bordered" id="report_table">

				 <tr>
					<th>Field</th>
					<th colspan="3">Content</th>
					
				 </tr>
				 <?php
				foreach ($model->auditPlanFields as $field) {
					?>
				<tr id="tr_<?php echo $field->id ?>">
					<td><?php echo $field->name ?></td>
					<td><?php echo $field->description ?></td>
					<td style="width:50px">	
						<a href="index.php?r=auditPlanFields/update&id=<?php echo $field->id ?>">
						<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
				</a>
					</td>
					<td style="width:50px">	

						<?php
				echo CHtml::ajaxLink('<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</button>',Yii::app()->createUrl('auditPlanFields/delete',array('id' => $field->id )),
				 array(
					'type'=>'POST',
						  
					'success'=>'js:function(string){ jQuery("#tr_'.$field->id.'").hide(); }'           
				),array(
					'class'=>'',
					'confirm'=>'Are you sure?' //Confirmation
					));
				?>
				<a href="index.php?r=auditPlanFields/delete&id=<?php echo $field->id ?>">
						
				</a>
					</td>
				 </tr>		<?php
				}?>



				 

				</table>
				</div>
				<div class="col-md-4">
						<?php

				$this->renderPartial('auditPlanFieldsForm', array('model' => new AuditPlanFields,'report'=>$model));
				 ?>
				</div>
				</div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
