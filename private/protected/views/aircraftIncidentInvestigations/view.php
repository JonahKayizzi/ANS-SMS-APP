<?php 
	$imageUrl_add = Yii::app()->request->baseUrl.'/images/1437745034_add.png'; 
	$imageUrl_edit = Yii::app()->request->baseUrl.'/images/1437745501_edit.png'; 
	$imageUrl_print = Yii::app()->request->baseUrl.'/images/1437747079_Print.png'; 
	$image_add = '<img src="'.$imageUrl_add.'" width="17px" alt="[+Add]" />'; 
	$image_edit = '<img src="'.$imageUrl_edit.'" width="17px" alt="[-Edit]" />'; 
	$image_print = '<img src="'.$imageUrl_print.'" width="37px" alt="[~Print]" />';
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Assurance
            <small>Aircraft Incident Investigations #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Assurance</li>
			<li class="active">Aircraft Incident Investigations #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		
		<div class="row">
			<div class="col-xs-12">
				
				<?php if((Users::model()->checkIfUserIsOfficer())){ ?>
					<?php 
					echo CHtml::link('<i class="fa fa-mail-reply"></i> Forward to Admin', array('/aircraftIncidentInvestigations/view', 'id'=>$model->id, 'forward'=>1), array('style'=>'color: #fff; background-color: #00a65a;', 'class'=>'btn btn-app', 'confirm'=>'Are you sure?'
					));
					?>
				<?php } ?>
				
				<?php 
					
					$r = @InvestigationReport::model()->findByAttributes(array('aircraft_incident_investigation_id'=>$model->id));
					if(!empty($r)){
						echo CHtml::link('<i class="fa fa-book"></i> Investigation Report', array('/investigationReport/view', 'id'=>$r->id), array('class'=>'btn btn-app', 'style'=>'background-color: #00c0ef; color: #fff;')); 
					}else{
						echo CHtml::link('<i class="fa fa-book"></i> Investigation Report', array('/investigationReport/create', 'incident'=>$model->id), array('class'=>'btn btn-app', 'style'=>'background-color: #00c0ef; color: #fff;')); 
					}
				?>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Lessons Learnt', array('/lessonsLearnt/create', 'a-investigation'=>$model->id, 'content_type'=>6), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#lessons-learnt" ><i class="fa fa-external-link"></i> Lessons Learnt</a>
				
				<?php /* echo CHtml::link('<i class="fa fa-plus"></i> Safety Recommendations', array('/safetyRecommendations/create', 'a-investigation'=>$model->id, 'content_type'=>6), array('class'=>'btn btn-app')); */ ?>
							
				<!-- <a class="btn btn-app" href="#" data-toggle="modal" data-target="#safety-recommendations" ><i class="fa fa-external-link"></i> Safety Recommendations</a> -->
				
			</div>
		</div>
		
          <div class="row">
            <div class="col-xs-9">
				<?php
				if(isset($_GET['accept_action'])){
					if(@ActionsInvestigation::model()->updateByPk($_GET['accept_action'], array('accepted'=>'YES'))){
						
						$msg = "Safety Recommendation implementaion #{$_GET['accept_action']} has been accepted.";
						
					}
				}
				if(isset($_GET['reject_action'])){
					if(@ActionsInvestigation::model()->updateByPk($_GET['reject_action'], array('accepted'=>'NO'))){
						$msg = "Safety Recommendation implementaion #{$_GET['reject_action']} has been rejected.";
					}
				}
				?>
				<?php if(isset($_GET['msg'])){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_GET['msg']; ?>
                  </div>
				<?php } ?>
				<?php if(isset($_GET['msg_error'])){ ?>
				<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_GET['msg_error']; ?>
                  </div>
				<?php } ?>
				<?php if($msg != ''){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg; ?>
                  </div>
				<?php } ?>
				<?php if($msg_error != ''){ ?>
				<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg_error; ?>
                  </div>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php if(AircraftIncidentInvestigations::model()->checkIfUnderInvestigation($model->id)){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
					This incident is still under investigation.
                  </div>
				<?php } ?>
				<?php } ?>
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
						<td><?php echo CHtml::link($model->incident->occurrence, array('/incidents/view', 'id'=>$model->incident_id)); ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_of_occurence']; ?></b>
						</td>
						<td><?php echo $model->date_of_occurence; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['description']; ?></b>
						</td>
						<td><?php echo $model->description; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['aircraft_involved']; ?></b>
						</td>
						<td><?php echo $model->aircraft_involved; ?></td>
					</tr>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['form_of_notification']; ?></b>
						</td>
						<td><?php echo $model->form_of_notification; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['category']; ?></b>
						</td>
						<td><?php echo $model->category; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['level_of_investigation']; ?></b>
						</td>
						<td><?php echo $model->level_of_investigation; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['tor']; ?></b>
						</td>
						<td><?php echo $model->tor; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_of_assignment']; ?></b>
						</td>
						<td><?php echo $model->date_of_assignment; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['deadline']; ?></b>
						</td>
						<td><?php echo $model->deadline; ?></td>
					</tr>
				</table>
			</div>
		</div>
		
		
		<?php /* if(Users::model()->checkIfUserIsAdmin()){ */ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Status</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->id}' and content_type = 6 and status = 1");
								if(!empty($safety_recommendations)){
									$k=1;
									echo "<table class='table table-stripped'>";
									echo "<thead><tr>";
									echo "<td>#</td>";
									echo "<td>Details</td>";
									echo "<td>Priority</td>";
									echo "<td>Deadline</td>";
									echo "<td>Action By</td>";
									echo "</tr></thead><tbody>";
									foreach($safety_recommendations as $safety_recommendation){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$safety_recommendation->brief." </td><td  style=''>".$safety_recommendation->priority." </td><td  style=''>".$safety_recommendation->deadline." </td><td  style=''>".@$safety_recommendation->actionBy->name." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</tbody></table>";	
								}else{
									echo "<p>0 records found. </p>";
								}
								
								?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				<?php /* } */ ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Update</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'sr-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td ></td>
											<td width="70%">
												<input type="hidden" name="investigation_id" value="<?php echo $model->id; ?>" />
											</td>
										</tr>
										<tr valign="top">
											<td >Safety Recommendation</td>
											<td ><input type="text" name="safety_recommendation" style="width: 99%;" class="form-control" /></td>
										</tr>
										<tr valign="top">
											<td >Priority</td>
											<td >
												<select name="priority" class="form-control">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
											</td>
										</tr>
										<tr valign="top">
											<td >Deadline</td>
											<td >
											<!-- <input type="text" name="time_frame" style="width: 99%;" class="form-control" /> -->
											<?php
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'name'=>'time_frame',
												'value'=>date('Y-m-d'),     
												'options'=>array(
													'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
													'showButtonPanel'=>true,
													'dateFormat'=>'yy-mm-dd',
												),
												'htmlOptions'=>array(
													'style'=>'width: 99%; border: 1px #ccc solid;',
													'class'=>'form-control'
												),
											));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td>Officer</td>
											<td>
											<?php
												echo CHtml::dropDownList('officer', '',Users::model()->getOfficers(),array('class'=>'form-control', ));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td ></td>
											<td><input type="submit" class="form-control" value="Save" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				<?php } ?>
				<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Implementation Status</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									<table class="table table-striped">
				
										<?php 
											$actions = @ActionsInvestigation::model()->findAll("investigation_id = '{$model->id}' and status = 1");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td><b>Action</b></td>
												<td><b>Date of capture</b></td>
												
												<td><b> Date of implementation  </b></td>
												<td><b>Accepted</b></td>
												<td><b>Comment</b></td>
												<td><b>Reported By</b></td>
												<td></td>
											</tr>
										<?php
												foreach($actions as $action){
										?>
											<tr valign="top"  class="" >
												<td><?php echo $action->details; ?></td>
												<td><?php echo $action->modified; ?></td>
												
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php if($action->accepted == 'NO'){echo CHtml::link('Accept', array('aircraftIncidentInvestigations/view', 'id'=>$model->id, 'accept_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-success'));}else{echo CHtml::link('Reject', array('aircraftIncidentInvestigations/view', 'id'=>$model->id, 'reject_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-danger'));} ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				<?php } ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Implementation Update</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<table class="table table-striped">
				
										<?php 
											$actions = @ActionsInvestigation::model()->findAll("investigation_id = '{$model->id}' and status = 1");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td><b>Action</b></td>
												<td><b>Date of capture</b></td>
												
												<td><b> Date of implementation  </b></td>
												<td><b>Accepted</b></td>
												<td><b>Comment</b></td>
												<td></td>
												<td></td>
											</tr>
										<?php
												foreach($actions as $action){
										?>
											<tr valign="top"  class="" >
												<td><?php echo $action->details; ?></td>
												<td><?php echo $action->modified; ?></td>
												
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php echo CHtml::link($image_edit, array('actionsInvestigation/update', 'id'=>$action->id), array('onClick'=>"return popup(this, 'action')")); ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'action-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td ></td>
											<td width="70%">
												<input type="hidden" name="investigation_id" value="<?php echo $model->id; ?>" />
											</td>
										</tr>
										<tr valign="top">
											<td >Details</td>
											<td ><input type="text" name="action" style="width: 99%;" class="form-control" /></td>
										</tr>
										
										<tr valign="top">
											<td >Date of implementaion</td>
											<td >
											<?php
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'name'=>'date_action_taken',
												/* 'value'=>date('Y-m-d'),  */    
												'options'=>array(
													'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
													'showButtonPanel'=>true,
													'dateFormat'=>'yy-mm-dd',
												),
												'htmlOptions'=>array(
													'style'=>'width: 99%; border: 1px #ccc solid;',
													'class'=>'form-control'
												),
											));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td >Comment</td>
											<td ><input type="text" name="comment" style="width: 99%;" class="form-control" /></td>
										</tr>
										<tr valign="top">
											<td ></td>
											<td><input type="submit" value="Save" class="form-control" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
		
		<?php /* } */ ?>
		<div class="row">
					<div class="col-md-12">
						<?php /* if((Users::model()->checkIfUserIsInvestigator())){ */ ?>
						<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
		<div class="box">
			<div class="box-body">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'investigation-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this
				'action' => Yii::app()->createUrl('aircraftIncidentInvestigations/formDetails'),
				'enableAjaxValidation'=>false,
			)); ?>
				<input type="hidden" name="incident" value="<?php echo $model->id; ?>" />
                  <table class="table table-stripped">
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['transcript_submitted']; ?></b>
						</td>
						<td>
							<select name="transcript_submitted" class="form-control" >
								<option value="NO"  >NO</option>
								<option value="YES" <?php if($model->transcript_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
					
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['transcript']; ?></b>
						</td>
						<td><input type="text" name="transcript_submission_date" class="form-control" value="<?php echo $model->transcript; ?>" placeholder="YYYY-MM-DD" /></td>
					</tr>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['SAG_submitted']; ?></b>
						</td>
						<td>
							<select name="SAG_submitted" class="form-control" >
								<option value="NO"  >NO</option>
								<option value="YES" <?php if($model->SAG_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['SAG_submission']; ?></b>
						</td>
						<td><input type="text" name="SAG_submission_date" class="form-control" value="<?php echo $model->SAG_submission; ?>" placeholder="YYYY-MM-DD" /></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['SAG_reviewed_by']; ?></b>
						</td>
						<td><input type="text" name="SAG_reviewed_by" value="<?php echo $model->SAG_reviewed_by; ?>" class="form-control" /></td>
					
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['SAG_reviewed']; ?></b>
						</td>
						<td><input type="text" name="SAG_reviewed_date" class="form-control" value="<?php echo $model->SAG_reviewed; ?>" placeholder="YYYY-MM-DD" /></td>
						
						
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['preliminary_report_submitted']; ?></b>
						</td>
						<td>
							<select name="preliminary_report_submitted" class="form-control" >
								<option value="NO" >NO</option>
								<option value="YES" <?php if($model->preliminary_report_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
					
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['preliminary_report']; ?></b>
						</td>
						<td><input type="text" name="preliminary_report_submission_date" value="<?php echo $model->preliminary_report; ?>" class="form-control" placeholder="YYYY-MM-DD" /></td>
					</tr>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['controller_report_submitted']; ?></b>
						</td>
						<td>
							<select name="controller_report_submitted" class="form-control" >
								<option value="NO" >NO</option>
								<option value="YES" <?php if($model->controller_report_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['controller_report']; ?></b>
						</td>
						<td><input type="text" name="controller_report_date" class="form-control" value="<?php echo $model->controller_report; ?>" placeholder="YYYY-MM-DD" /></td>
					
						
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['sodf_submitted']; ?></b>
						</td>
						<td>
							<select name="sodf_submitted" class="form-control" >
								<option value="NO" >NO</option>
								<option value="YES" <?php if($model->sodf_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['sodf']; ?></b>
						</td>
						<td><input type="text" name="sodf_date" class="form-control" value="<?php echo $model->sodf; ?>" placeholder="YYYY-MM-DD" /></td>
					
						
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['fps_submitted']; ?></b>
						</td>
						<td>
							<select name="fps_submitted" class="form-control" >
								<option value="NO" >NO</option>
								<option value="YES" <?php if($model->fps_submitted == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['fps']; ?></b>
						</td>
						<td><input type="text" name="fps_date" class="form-control" value="<?php echo $model->fps; ?>" placeholder="YYYY-MM-DD" /></td>
					
						
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['forwarded_to_DANS_and_Mgrs_sent']; ?></b>
						</td>
						<td>
							<select name="forwarded_to_DANS_and_Mgrs_sent" class="form-control" >
								<option value="NO" >NO</option>
								<option value="YES" <?php if($model->forwarded_to_DANS_and_Mgrs_sent == 'YES'){echo 'selected';} ?> >YES</option>
							</select>
						</td>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['forwarded_to_DANS_and_Mgrs']; ?></b>
						</td>
						<td><input type="text" name="forwarded_to_DANS_and_Mgrs_date" value="<?php echo $model->forwarded_to_DANS_and_Mgrs; ?>" class="form-control" placeholder="YYYY-MM-DD" /></td>
					</tr>
					<!-- <tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['final_report']; ?></b>
						</td>
						<td><?php echo $model->final_report; ?></td>
					</tr> -->
				</table>
				<table class="table "><tr><td><input type="submit" name="submit" value="Save Above Changes" class="form-control" style="background-color: #ccc;" /></td></tr></table>
				<?php $this->endWidget(); ?>
			</div>
		</div>
		<?php } ?>
		<?php /* } */ ?>
		<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
		<div class="box">
			<div class="box-body">
				
				<div class="row">
					<div class="col-xs-12">
						
						<?php echo CHtml::link('<button class="btn btn-block btn-warning ">Update</button>', array('/aircraftIncidentInvestigations/update', 'id'=>$model->id)); ?>
					</div>
				</div>
				
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		<?php } ?>
					</div>
				</div>
		
            </div><!-- /.col -->
			<div class="col-xs-3">
			
				<div class="bg-navy" style=" width: 100%; padding: 0px; align: center;">
					
					
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
								$lessons_learnt = @LessonsLearnt::model()->findAll("content_id = '{$model->id}' and content_type = 6 and status = 1");
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
									echo "<p>0 records found. Click ".CHtml::link('here', array('lessonsLearnt/create', 'a-investigation'=>$model->id, 'content_type'=>6))." to add lessons learnt.</p>";
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
						<div class="modal" id="safety-recommendations">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Safety Recommendations</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->id}' and content_type = 6 and status = 1");
								if(!empty($safety_recommendations)){
									$k=1;
									echo "<table class='table table-stripped'>";
									echo "<thead><tr>";
									echo "<td>#</td>";
									echo "<td>Details</td>";
									echo "<td>Remarks</td>";
									echo "<td>Reported By</td>";
									echo "<td>Date</td>";
									echo "</tr></thead><tbody>";
									foreach($safety_recommendations as $safety_recommendation){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$safety_recommendation->brief." </td><td  style=''>".$safety_recommendation->remarks." </td><td  style=''>".$safety_recommendation->reported_by." </td><td  style=''>".$safety_recommendation->modified." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</tbody></table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('safetyRecommendations/create', 'a-investigation'=>$model->id, 'content_type'=>6))." to add safety recommendations.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
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
				<?php } ?> 
				 
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->