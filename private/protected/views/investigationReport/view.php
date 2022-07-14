

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Investigation Report # <?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Investigation Report # <?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">
					Investigation Report # 
					<?php
						if($model->aircraft_incident_investigation_id == NULL){
							echo $model->title;
						}else{
							echo CHtml::link($model->title, array('/aircraftIncidentInvestigations/view', 'id'=>$model->aircraft_incident_investigation_id)).' <i><< Click to view details.</i>';
						}
					?>
				</h3>
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
				<a href="index.php?r=investigationReport/print&id=<?php echo $model->id?>" class="btn btn-primary pull-right" target="_blank">Print</a>
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<div class="row">
					<div class="col-md-8">
					<?php if($msg != ''){ ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4>	<i class="icon fa fa-exclamation-triangle"></i> Alert!</h4>
						<?php echo $msg; ?>
					  </div>
					<?php } ?>
					
					<div style="background-color: #ccc; padding: 5px; margin-bottom: 2px;"><b>Please Note</b><br />This report automatically picks up the safety recommendations that are added from <?php
						if($model->incident_id == NULL){
							echo 'here';
						}else{
							echo CHtml::link('here', array('/incidents/view', 'id'=>$model->incident_id));
						}
					?> (Click). This means that you should not add safety recommendations from here directly into the report but rather follow the proper procedure of submitting them from <?php
						if($model->incident_id == NULL){
							echo 'here';
						}else{
							echo CHtml::link('here', array('/incidents/view', 'id'=>$model->incident_id));
						}
					?> (Click).</div>
				<table class="table table-bordered" id="report_table">

				 <tr>
					<th>Field</th>
					<th colspan="3">Content</th>
					
				 </tr>
				 <?php
				foreach ($model->reportFields as $field) {
					?>
				<tr id="tr_<?php echo $field->id ?>">
					<td><?php echo $field->name ?></td>
					<td><?php echo $field->description ?></td>
					<td style="width:50px">	
						<a href="index.php?r=investigationReportFields/update&id=<?php echo $field->id ?>">
						<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
				</a>
					</td>
					<td style="width:50px">	

						<?php
				echo CHtml::ajaxLink('<button type="button" data-bind="click: $parent.remove" class="remove-news btn  btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</button>',Yii::app()->createUrl('investigationReportFields/delete',array('id' => $field->id )),
				 array(
					'type'=>'POST',
						  
					'success'=>'js:function(string){ jQuery("#tr_'.$field->id.'").hide(); }'           
				),array(
					'class'=>'',
					'confirm'=>'Are you sure?' //Confirmation
					));
				?>
				<a href="index.php?r=investigationReportFields/delete&id=<?php echo $field->id ?>">
						
				</a>
					</td>
				 </tr>		<?php
				}?>
				
				<tr>
					<td>Recommendations</td>
					<td>
					<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->incident_id}' and content_type = 6 and status = 1");
								echo "<ol>";
								if(!empty($safety_recommendations)){
									$k=1;
									foreach($safety_recommendations as $safety_recommendation){
										echo "<li>".$safety_recommendation->brief."</li>";
										$k++;
									}	
								}else{
									echo "<li>0 records found.</li>";
								}
								echo "</ol>";
								
								?>
					</td>
					<td></td>
					<td></td>
				</tr>

				 

				</table>
				</div>
				<div class="col-md-4">
						<?php

				$this->renderPartial('reportFieldsForm', array('model' => new InvestigationReportFields,'report'=>$model));
				 ?>
				</div>
				
				
				</div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
