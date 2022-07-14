
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Policy &amp; Objectives
            <small>Tasks #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Policy &amp; Objectives</li>
			<li class="active">Tasks #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Lessons Learnt', array('/lessonsLearnt/create', 'task'=>$model->id, 'content_type'=>3), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#lessons-learnt">
					<i class="fa fa-external-link"></i> Lessons Learnt
				</a>
				
				<?php /* echo CHtml::link('<i class="fa fa-plus"></i> Safety Recommendations', array('/safetyRecommendations/create', 'task'=>$model->id, 'content_type'=>3), array('class'=>'btn btn-app')); */ ?>
				
				<!-- <a class="btn btn-app" href="#" data-toggle="modal" data-target="#safety-recommendations">
					<i class="fa fa-external-link"></i> Safety Recommendations
				</a> -->
				
				<?php echo CHtml::link('<i class="fa fa-print"></i> Form 121', array('form121', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app')); ?>
				
				<?php echo CHtml::link('<i class="fa fa-print"></i> Form 122', array('form122', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app')); ?>
			</div>
		</div>
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
				  
				  <div class="bg-navy" style="padding: 0px; align: center;">
					
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
								$lessons_learnt = @LessonsLearnt::model()->findAll("content_id = '{$model->id}' and content_type = 3 and status = 1");
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
									echo "<p>0 records found. Click ".CHtml::link('here', array('lessonsLearnt/create', 'task'=>$model->id, 'content_type'=>3))." to add lessons learnt.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				<div class="bg-navy" style="padding: 0px; align: center;">
					
					
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
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$id}' and content_type = 3 and status = 1");
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
									echo "<p>0 records found. Click ".CHtml::link('here', array('safetyRecommendations/create', 'task'=>$model->id, 'content_type'=>3))." to add safety recommendations.</p>";
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
				<table class="table">
					<tr>
						<td><b>Change Management Form</b></td><td><?php echo CHtml::link($model->change_management_id, array('/changeManagement/view', 'id'=>$model->change_management_id)); ?></td>
					</tr>
					<tr>
						<td><b>Title</b></td><td><?php echo CHtml::link($model->title, array('/changeManagement/view', 'id'=>$model->change_management_id)); ?></td>
					</tr>
					<tr>
						<td><b>Location</b></td><td><?php echo $model->location; ?></td>
					</tr>
					<tr>
						<td><b>Analyst</b></td><td><?php echo $model->analyst; ?></td>
					</tr>
					<tr>
						<td><b>Date</b></td><td><?php echo $model->date; ?></td>
					</tr>
				</table>
				<?php /* $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'id',
						'title',
						'location',
						'analyst',
						'date',
						'modified',
						'reported_by',
					),
				)); */ ?>
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'task-step-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table" style="width: 100%; margin-top: 10px;">
					<tr>
						<td>
						<input type="text" placeholder="Enter Task Step Here" name="task-step-description"   class="form-control" /> 
						</td>
						<td>
						<input type="text" placeholder="Enter Task Step Description Here" name="task-step-details"   class="form-control" /> 
						</td>
						<td>
							<input type="hidden" name="task_id" value="<?php echo $model->id; ?>" />
							<input type="submit" value="Submit" class="form-control" />
						</td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>

				<?php
					$task_steps = @TaskSteps::model()->findAll("task_id = '{$model->id}' and status = 1");
					if(!empty($task_steps)){
				?>
				<table class="table" style="width: 100%; margin-top: 10px;">
					<tr class="">
						<td><b>Task Step</b></td>
						<td><b>Task Step Description</b></td>
						<td><b>Hazard(s)</b></td>
						<td><b>Hazard Controls</b></td>
						<td><b>Comments</b></td>
					</tr>
				<?php	
						$k = 1;
						foreach($task_steps as $task_step){
				?>
					<tr style="border-bottom: 1px #ccc solid;" class="">
						<td style="border-bottom: 1px #ccc solid;"><?php echo $task_step->description; ?></td>
						<td style="border-bottom: 1px #ccc solid;"><?php echo $task_step->details; ?></td>
						<td style="border-bottom: 1px #ccc solid; width: 25%;">
						<?php
						$hazards = @TaskStepHazards::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
						if(!empty($hazards)){
							echo "<ol>";
							foreach($hazards as $hazard){
								$register_info = @HazardRiskManagementRegister::model()->findByAttributes(array('task_step_hazard_id'=>$hazard->id));
								if(empty($register_info)){
									echo "<li>".CHtml::link($hazard->details, array('/hazardRiskManagementRegister/create', 'hazard'=>$hazard->id, 'task'=>$model->id))." <i class='fa fa-external-link'></i></li>";
								}else{
									echo "<li>".CHtml::link($hazard->details, array('/hazardRiskManagementRegister/view', 'id'=>$register_info->id))." <i class='fa fa-external-link'></i></li>";
								}
							}
							echo "</ol>";
						}
						?>
						</td>
						<td style="border-bottom: 1px #ccc solid; width: 25%;">
						<?php
						$hazard_controls = @TaskStepHazardControls::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
						if(!empty($hazard_controls)){
							echo "<ol>";
							foreach($hazard_controls as $hazard_control){
								echo "<li>{$hazard_control->details}</li>";
							}
							echo "</ol>";
						}
						?>
						</td>
						<td style="border-bottom: 1px #ccc solid; width: 25%;">
						<?php
						$comments = @TaskStepComments::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
						if(!empty($comments)){
							echo "<ol>";
							foreach($comments as $comment){
								echo "<li>{$comment->details}</li>";
							}
							echo "</ol>";
						}
						?>
						</td>
					</tr>
					<tr style="border-bottom: 1px #ccc solid;" class="sms_tr">
						<td style="border-bottom: 1px #ccc solid;"></td>
						<td style="border-bottom: 1px #ccc solid;"></td>
						<td style="border-bottom: 1px #ccc solid;">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>"task-step-hazard-form-{$k}",
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
						)); ?>
							<table class="table" style="width: 100%;">
								<tr>
									<td style="width: 90%;">
										<input type="text" placeholder="Add Hazard" name="task-step-hazard-details" style="width: 90%;" />
										<input type="hidden" name="task_step_id" value="<?php echo $task_step->id; ?>" />
									</td>
									<td><input type="submit" value="+" style="" /></td>
								</tr>
							</table>
						<?php $this->endWidget(); ?>
						</td>
						<td style="border-bottom: 1px #ccc solid;">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>"task-step-hazard-control-form-{$k}",
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
						)); ?>
							<table class="table" style="width: 100%;">
								<tr>
									<td style="width: 90%;">
										<input type="text" placeholder="Add Hazard Control" name="task-step-hazard-control-details" style="width: 90%;" />
										<input type="hidden" name="task_step_id" value="<?php echo $task_step->id; ?>" />
									</td>
									<td><input type="submit" value="+" style="" /></td>
								</tr>
							</table>
						<?php $this->endWidget(); ?>
						</td>
						<td style="border-bottom: 1px #ccc solid;">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>"task-step-hazard-control-form-{$k}",
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
						)); ?>
							<table class="table" style="width: 100%;">
								<tr>
									<td style="width: 90%;">
										<input type="text" placeholder="Add Comment" name="task-step-comment-details" style="width: 90%;" />
										<input type="hidden" name="task_step_id" value="<?php echo $task_step->id; ?>" />
									</td>
									<td><input type="submit" value="+" style="" /></td>
								</tr>
							</table>
						<?php $this->endWidget(); ?>
						</td>
					</tr>
				<?php
						$k++;
						}
				?>
				</table>
				<?php
					}else{
						echo "<p  >This task has no task steps recorded yet.</p>";
					}
				?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
