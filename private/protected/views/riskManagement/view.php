
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Policy and Objectives
            <small>Risk Management #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Policy &amp; Objectives</li>
			<li class="active">Risk Management #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-9">
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Consequences', array('/rmConsequences/create/', 'rm_id'=>$model->id), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#consequences"  ><i class="fa fa-external-link"></i> Consequences</a>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Current Defences', array('/rmCurrentDefences/create', 'rm_id'=>$model->id), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#defences"  ><i class="fa fa-external-link"></i> Current Defences</a>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Technical Defences', array('/rmTechnicalDefences/create/', 'rm_id'=>$model->id), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#technical-defences"  ><i class="fa fa-external-link"></i> Technical Defences</a>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Lessons Learnt', array('/lessonsLearnt/create', 'risk_m'=>$model->id, 'content_type'=>4), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#lessons-learnt"  ><i class="fa fa-external-link"></i> Lessons Learnt</a>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Safety Recommendations', array('/safetyRecommendations/create', 'risk_m'=>$model->id, 'content_type'=>4), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#safety-recommendations"  ><i class="fa fa-external-link"></i> Safety Recommendations</a>
				
				<?php echo CHtml::link('<i class="fa fa-print"></i> Form 122', array('form122', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app')); ?>
				
			</div>
		</div>
		
          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                <div class="box-header with-border">
				   
				   <div class="" style=" width: 100%; padding: 0px; align: center; background-color: #dd4b39; color: #fff;">
					
					<div class="" >
						<div class="modal" id="consequences">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Description of consequences</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$consequences = @RmConsequences::model()->findAll("risk_management_id = '{$model->id}' and status = 1");
								if(!empty($consequences)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($consequences as $consequence){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$consequence->details." </td><td  style=''>".$consequence->modified." </td><td  style=''>".$consequence->reported_by." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('rmConsequences/create/', 'rm_id'=>$model->id))." to add description of consequences.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				<div class="" style=" width: 100%; padding: 0px; align: center; color: #fff; background-color: #ff851b;">
					
					<div class="" >
						<div class="modal" id="defences">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Current Defences</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$current_defences = @RmCurrentDefences::model()->findAll("risk_management_id = '{$model->id}' and status = 1");
								if(!empty($current_defences)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($current_defences as $current_defence){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$current_defence->details." </td><td  style=''>".$current_defence->modified." </td><td  style=''>".$current_defence->reported_by." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('rmCurrentDefences/create', 'rm_id'=>$model->id))." to add current defences.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
			
				<div class="bg-navy" style=" width: 100%; padding: 0px; align: center;">
					
					
					<div class="" >
						<div class="modal" id="technical-defences">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Technical and Administrative Defences</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$technical_defences = @RmTechnicalDefences::model()->findAll("risk_management_id = '{$model->id}' and status = 1");
								if(!empty($technical_defences)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($technical_defences as $technical_defence){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$technical_defence->details." </td><td  style=''>".$technical_defence->modified." </td><td  style=''>".$technical_defence->reported_by." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('rmTechnicalDefences/create/', 'rm_id'=>$model->id))." to add technical and administrative defences.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				<div class="bg-olive" style=" padding: 0px; align: center;">
					
					
					<div class="" >
						<div class="modal" id="lessons-learnt">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Lessons Learnt</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$lessons_learnt = @LessonsLearnt::model()->findAll("content_id = '{$model->id}' and content_type = 4 and status = 1");
								if(!empty($lessons_learnt)){
									$k=1;
									echo "<table class='table table-stripped'>";
									echo "<tr>";
									echo "<td><b>#</b></td>";
									echo "<td><b>Division</b></td>";
									echo "<td><b>Reported</b></td>";
									echo "<td><b>Category</b></td>";
									echo "<td><b>Title</b></td>";
									echo "<td><b>Description</b></td>";
									echo "</tr>";
									foreach($lessons_learnt as $lesson_learnt){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$lesson_learnt->Divission." </td><td  style=''>".$lesson_learnt->date_reported." </td><td  style=''>".$lesson_learnt->category." </td><td  style=''>".$lesson_learnt->issue_title." </td><td  style=''>".$lesson_learnt->Description." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('lessonsLearnt/create', 'risk_m'=>$model->id, 'content_type'=>4))." to add lessons learnt.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				<div class="bg-olive" style=" padding: 0px; align: center;">
					
					
					<div class="" >
						<div class="modal" id="safety-recommendations">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Safety Recommendations</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$id}' and content_type = 4 and status = 1");
								if(!empty($safety_recommendations)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($safety_recommendations as $safety_recommendation){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$safety_recommendation->details." </td><td  style=''>".$safety_recommendation->brief." </td><td  style=''>".$safety_recommendation->remarks." </td><td  style=''>".$safety_recommendation->reported_by." </td><td  style=''>".$safety_recommendation->modified." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('safetyRecommendations/create', 'risk_m'=>$model->id, 'content_type'=>4))." to add safety recommendations.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				   
                </div><!-- /.box-header -->
				
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
							<b><?php echo $model->attributeLabels()['serial_no']; ?></b>
						</td>
						<td><?php echo $model->serial_no; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['description']; ?></b>
						</td>
						<td><?php echo $model->description; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['current_risk_index']; ?></b>
						</td>
						<td><?php echo $model->current_risk_index; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['theoretical_risk_index']; ?></b>
						</td>
						<td><?php echo $model->theoretical_risk_index; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['risk_owner']; ?></b>
						</td>
						<td><?php echo $model->risk_owner; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['actual_risk_index']; ?></b>
						</td>
						<td><?php echo $model->actual_risk_index; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['reported_by']; ?></b>
						</td>
						<td><?php echo $model->reported_by; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['evaluated_by']; ?></b>
						</td>
						<td><?php echo $model->evaluated_by; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['evaluation_date']; ?></b>
						</td>
						<td><?php echo $model->evaluation_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['approved_by']; ?></b>
						</td>
						<td><?php echo $model->approved_by; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['approval_date']; ?></b>
						</td>
						<td><?php echo $model->approval_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['next_evaluation_date']; ?></b>
						</td>
						<td><?php echo $model->next_evaluation_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
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