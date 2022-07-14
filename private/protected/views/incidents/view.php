<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	$model->id,
);

$main_category = $model->main_category;

$this->menu=array(
	array('label'=>'All '.$model->main_category.'s', 'url'=>array('index','status'=>0)),
	array('label'=>'Incoming '.$model->main_category.'s', 'url'=>array('index','status'=>1)),
	/* array('label'=>'Pending '.$model->main_category.'s', 'url'=>array('index','status'=>2)), */
	array('label'=>'Initiated '.$model->main_category.'s', 'url'=>array('index','status'=>3)),
	array('label'=>'Monitored '.$model->main_category.'s', 'url'=>array('index','status'=>4)),
	array('label'=>'Closed '.$model->main_category.'s', 'url'=>array('index','status'=>5)),
	
);
?>
<?php 
	$imageUrl_add = Yii::app()->request->baseUrl.'/images/1437745034_add.png'; 
	$imageUrl_edit = Yii::app()->request->baseUrl.'/images/1437745501_edit.png'; 
	$imageUrl_print = Yii::app()->request->baseUrl.'/images/1437747079_Print.png'; 
	$image_add = '<img src="'.$imageUrl_add.'" width="17px" alt="[+Add]" />'; 
	$image_edit = '<img src="'.$imageUrl_edit.'" width="17px" alt="[-Edit]" />'; 
	$image_print = '<img src="'.$imageUrl_print.'" width="37px" alt="[~Print]" />';
?>
<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small><?php echo $model->main_category; ?> #<?php echo $model->id; ?> </small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li >Safety Risk Management</li>
			<li >All Occurrences</li>
			 <li class="active"><?php echo $model->main_category; ?> #<?php echo $model->id; ?> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-9">
				<?php if((Users::model()->checkIfUserIsOfficer())){ ?>
				<?php 
				/* echo CHtml::link('<i class="fa fa-mail-reply"></i> Forward to Admin', array('/incidents/view', 'id'=>$model->id, 'forward'=>1), array('style'=>'color: #fff; background-color: #00a65a;', 'class'=>'btn btn-app', 'confirm'=>'Are you sure?'
				)); */
				?>
				<?php } ?>
				
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php if($model->status != 5){ ?>
				<?php echo CHtml::link('<i class="fa fa-lock"></i> Close '.$model->main_category, array('index', 'id'=>$model->id, 'action'=>'close'), array('confirm'=>'Are you sure?', 'class'=>'btn btn-app', 'style'=>'background-color: #dd4b39; color: #fff;')); ?>
				<?php } ?>
				
				
				<?php if((Users::model()->checkIfUserIsAdmin())&&(Incidents::model()->findByPk($model->id)->assigned_to_officer != 1)){ ?>
				<?php 
				/* echo CHtml::link('<i class="fa fa-mail-forward"></i> Assign to Officer', '#', array(
				   'onclick'=>'$("#assignOfficer").dialog("open"); return false;', 'style'=>'color: #fff; background-color: #00c0ef;', 'class'=>'btn btn-app'
				)); */
				?>
				<?php
					/* $this->renderPartial('assignOfficer', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit)); */
				?>
				
				<?php } ?>
				
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsInvestigator())){ ?>
				
				<?php $sod = @SafetyOccurrenceData::model()->find("incident_id = '{$id}' and status = 1"); ?>
				<?php if(empty($sod)){ ?>
					<?php echo CHtml::link('<i class="fa fa-plus"></i> Safety Occurrence Data', array('/safetyOccurrenceData/create', 'incident'=>$id), array('class'=>'btn btn-app')); ?>
				<?php }else{ ?>
					<?php echo CHtml::link('<i class="fa fa-edit"></i> Safety Occurrence Data', array('/safetyOccurrenceData/update', 'id'=>$sod->id, 'incident'=>$id, 'edit'=>'yes'), array('class'=>'btn btn-app')); ?>
				<?php } ?>	
				
				<?php } ?>
				
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Lessons Learnt', array('/lessonsLearnt/create', 'incident'=>$id, 'content_type'=>1), array('class'=>'btn btn-app')); ?>
							
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#lessons-learnt"  ><i class="fa fa-external-link"></i> Lessons Learnt</a>
				
				<!-- <?php echo CHtml::link('<i class="fa fa-plus"></i> Safety Recommendations', array('/safetyRecommendations/create', 'incident'=>$id, 'content_type'=>1), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#safety-recommendations" ><i class="fa fa-external-link"></i> Safety Recommendations</a> -->
							
				<?php } ?>			
			</div>
		</div>
		
          <div class="row">
            <div class="col-xs-9">
				<?php
				if(isset($_GET['sr_close'])){
					if(@SafetyRecommendations::model()->updateByPk($_GET['sr_close'], array('open_close'=>1, 'date_closed'=>date('Y-m-d')))){
						
						$msg = "Safety Recommendation #{$_GET['sr_close']} has been closed.";
						
					}
				}
				if(isset($_GET['accept_action'])){
					if(@Actions::model()->updateByPk($_GET['accept_action'], array('accepted'=>'YES'))){
						
						if(@Incidents::model()->updateByPk($model->id, array('status'=>4))){
							$msg = "Mitigation implementaion #{$_GET['accept_action']} has been accepted.";
							
							@SafetyRecommendations::model()->updateByPk($_GET['sr'], array('open_close'=>1, 'date_closed'=>date('Y-m-d')));
						}
						
					}
				}
				if(isset($_GET['reject_action'])){
					if(@Actions::model()->updateByPk($_GET['reject_action'], array('accepted'=>'NO'))){
						$msg = "Mitigation implementaion #{$_GET['reject_action']} has been rejected.";
					}
				}
				
				if(isset($_GET['accept_action_investigate'])){
					if(@ActionsInvestigation::model()->updateByPk($_GET['accept_action_investigate'], array('accepted'=>'YES'))){
						
						if(@Incidents::model()->updateByPk($model->id, array('status'=>4))){
							$msg = "Safety recommendations implementaion #{$_GET['accept_action_investigate']} has been accepted.";
							
							@SafetyRecommendations::model()->updateByPk($_GET['sr'], array('open_close'=>1, 'date_closed'=>date('Y-m-d')));
						}
						
					}
				}
				if(isset($_GET['reject_action_investigate'])){
					if(@ActionsInvestigation::model()->updateByPk($_GET['reject_action_investigate'], array('accepted'=>'NO'))){
						$msg = "Safety recommendations implementaion #{$_GET['reject_action_investigate']} has been rejected.";
					}
				}
				
				if(isset($_GET['cancel_cause'])){
					if(@IncidentsCauses::model()->updateByPk($_GET['cancel_cause'], array('status'=>0))){
						$msg = "Incident cause #{$_GET['cancel_cause']} has been deleted.";
					}
				}
				
				// if(isset($_GET['cancel_consequence'])){
				// 	if(@IncidentsConsequences::model()->updateByPk($_GET['cancel_consequence'], array('status'=>0))){
				// 		$msg = "Incident consequence #{$_GET['cancel_consequence']} has been deleted.";
				// 	}
				// }

				if(isset($_GET['cancel_consequence'])){
					if(@Consequences::model()->updateByPk($_GET['cancel_consequence'], array('status'=>0))){
						$msg = "Incident consequence #{$_GET['cancel_consequence']} has been deleted.";
					}
				}
				
				if(isset($_GET['cancel_main_cause'])){
					if(@IncidentCausesMain::model()->updateByPk($_GET['cancel_main_cause'], array('status'=>0))){
						$msg = "Incident cause main category #{$_GET['cancel_main_cause']} has been deleted.";
					}
				}
				
				if(isset($_GET['cancel_sub_cause'])){
					if(@IncidentCausesSub::model()->updateByPk($_GET['cancel_sub_cause'], array('status'=>0))){
						$msg = "Incident cause sub category #{$_GET['cancel_sub_cause']} has been deleted.";
					}
				}
				?>
				<?php if($msg != ''){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
                    <h4>	<i class="icon fa fa-exclamation-triangle"></i> Alert!</h4>
                    <?php echo $msg; ?>
                  </div>
				<?php } ?>
				<?php if($msg_error != ''){ ?>
				<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg_error; ?>
                  </div>
				<?php } ?>
				<?php
					$this->renderPartial('view/info', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				
				<?php $content_type = 0; ?>
				<?php if((($model->main_category == 'Hazard')||($model->main_category == 'Issue'))){ ?>
					<?php $content_type = 1; ?>
				<?php } ?>
				<?php if($model->main_category == 'Incident'){ ?>
					<?php $content_type = 6; ?>
				<?php } ?>
				
				
				<?php if((($model->main_category == 'Hazard')||($model->main_category == 'Issue'))){ ?>
				<?php if(@Users::model()->checkIfUserIsImplementor()){ ?>
				<?php
					$this->renderPartial('view/safety-requirements', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php
					$this->renderPartial('view/mitigation-implementation', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				
				<?php } ?>
				<?php } ?>
				
				
				
				
				<?php if($model->main_category == 'SITREP'){ ?>
				<?php
					$this->renderPartial('view/sitrep-causes', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				
				<?php
					$this->renderPartial('view/sitrep-categories', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if(@Users::model()->checkIfUserIsAdmin()){ ?>
				<?php
					$this->renderPartial('view/preliminary-actions', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if($model->main_category == 'Incident'){ ?>
				<?php if((Users::model()->checkIfUserIsInvestigator())){ ?>
				<?php
					$this->renderPartial('view/incident-investigation-status', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if(@Users::model()->checkIfUserIsAdmin()){ ?>
				<?php
					$this->renderPartial('view/incident-investigation', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if(Users::model()->checkIfUserIsImplementor()){ ?>
				<?php
					$this->renderPartial('view/safety-recommendations-status', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsInvestigator())){ ?>
				<?php
					$this->renderPartial('view/safety-recommendations-update', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if(Users::model()->checkIfUserIsInvestigator()){ ?>
				<?php
					$this->renderPartial('view/safety-recommendations-implementation-status', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsImplementor())){ ?>
				<?php
					$this->renderPartial('view/safety-recommendations-implementation-update', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsInvestigator())){ ?>
				<?php
					$this->renderPartial('view/causes', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if((($model->main_category == 'Hazard')||($model->main_category == 'Issue'))){ ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php
					$this->renderPartial('view/safety-requirements-mitigation', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsImplementor())){ ?>
				<?php
					$this->renderPartial('view/safety-requirements-mitigation-implementation', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php } ?>
				<?php if(!(($model->main_category == 'Incident')||($model->category == 'OSHE')||($model->main_category == 'Issue'))){ ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php
					$this->renderPartial('view/system-state', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php
					$this->renderPartial('view/current-defences', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php
					$this->renderPartial('view/existing-controls', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php
					  $this->renderPartial('view/consequences', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit)); 
				?>
				
				<?php
					// $this->renderPartial('view/incident-consequences', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit)); 
				?>
				
				<?php
					$this->renderPartial('view/associated-risks', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				
				<?php } ?>
				
				<?php if(!(($model->main_category == 'Incident')||($model->category == 'OSHE')||($model->main_category == 'Issue'))){ ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php
					$this->renderPartial('view/performance-targets', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php
					$this->renderPartial('view/monitoring-activities', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<?php } ?>
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php
					/* $this->renderPartial('view/next-review-date', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit)); */
				?>
				<?php
					$this->renderPartial('view/review-date', array('model'=>$model, 'id'=>$id, 'content_type'=>$content_type, 'content_id'=>$model->id, 'image_add'=>$image_add, 'image_edit'=>$image_edit, 'ReviewDate'=>$ReviewDate,));
				?>
				<?php
					$this->renderPartial('view/next-review-date', array('model'=>$model, 'id'=>$id, 'content_type'=>$content_type, 'content_id'=>$model->id, 'image_add'=>$image_add, 'image_edit'=>$image_edit, 'NextReviewDate'=>$NextReviewDate));
				?>
				<?php
					$this->renderPartial('view/remarks', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php
					$this->renderPartial('view/verified-by', array('model'=>$model, 'id'=>$id, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
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
								$lessons_learnt = @LessonsLearnt::model()->findAll("content_id = '{$id}' and content_type = 1 and status = 1");
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
									echo "<p>0 records found. Click ".CHtml::link('here', array('lessonsLearnt/create', 'incident'=>$id, 'content_type'=>1))." to add lessons learnt.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				
				<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<?php 
							$baseurl = Yii::app()->request->baseUrl;
							echo "<li>".CHtml::link("Report {$main_category}", "{$baseurl}/../occurrences/", array('target'=>'_blank'))."</li>";
						  ?>
					  </ul>
					  
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
				<?php if($model->main_category != 'SITREP'){ ?>
				<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<?php 
						
							$baseurl = Yii::app()->request->baseUrl;
							foreach($this->menu as $menuItem){
								$url = $menuItem['url'];
								//$status = $menuItem['url']['status'];
								$count = 0; foreach($url as $u){if($count==0){$action=$u;} $status=$u; $count++;}
								echo "<li>".CHtml::link($menuItem['label'], "{$baseurl}/index.php?r=incidents/{$action}&status={$status}&main_category={$main_category}")."</li>";
							}
						  ?>
					  </ul>
					  
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				<?php } ?>  
				  
				  
				  <div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Reports</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<?php if(Yii::app()->controller->id == 'incidents'){ ?>
							<?php if(Yii::app()->controller->action->id == 'view'){ ?>
						<li><?php echo CHtml::link('Situation Report, Form 116', array('/site/sitrep', 'incident'=>$id), array('target'=>'_blank')); ?></li>

						<!-- <li><?php /* echo CHtml::link('Form 122', array('incidents/form122', 'incident'=>$id), array('target'=>'_blank')); */ ?></li> -->
							
						<li><?php echo CHtml::link('Hazard Report, Form 120', array('/site/hazardReport', 'incident'=>$id), array('target'=>'_blank')); ?></li>
							
						<?php $sod = @SafetyOccurrenceData::model()->find("incident_id = '{$id}' and status = 1"); ?>
							<?php if(empty($sod)){ ?>
								<!-- <li><?php echo CHtml::link('Safety Occurrence Data', array('/safetyOccurrenceData/create', 'incident'=>$id), array('target'=>'_blank')); ?></li> -->
							<?php }else{ ?>
								<!-- <li><?php echo CHtml::link('Safety Occurrence Data', array('/safetyOccurrenceData/update', 'id'=>$sod->id, 'incident'=>$id, 'edit'=>'yes'), array('target'=>'_blank')); ?></li> -->
							<?php } ?>
							<?php } ?>
						<?php } ?>
						<li><?php echo CHtml::link('SMS Form 123', array('/safetyRecommendations/report'), array('target'=>'_blank')); ?></li>
						<li><?php echo CHtml::link('SMS Form 124', array('/incidents/form124/', 'id'=>$id), array('target'=>'_blank')); ?></li>
						<li><?php echo CHtml::link('Hazard Register, Form 125', array('/site/hazardRegister'), array('target'=>'_blank')); ?></li>
						<li><?php echo CHtml::link('Hazard Worksheet', array('/site/hazardWorksheet', 'id'=>$id), array('target'=>'_blank')); ?></li>
						<li><?php echo CHtml::link('Review Schedule', array('/safetyRecommendations/reviewSchedule'), array('target'=>'_blank')); ?></li>
						<!-- <li><?php echo CHtml::link('Review Schedule', array('/incidents/reviewSchedule', 'id'=>$id)); ?></li> -->
						<!--<li><?php echo CHtml::link('Safety Logs Summary', array('/site/incidentSummary'), array('target'=>'_blank')); ?></li>-->
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  <div class="box box-default" style="" >
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Accident &amp; Incident Investigation, SMS FORM 124</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
							<?php $form124data = @SmsForm124Data::model()->find("incident_id = '{$_GET['id']}' and status = 1"); ?>
							<?php if(empty($form124data)){ ?>
								<li><?php echo CHtml::link('Data Collection', array('/smsForm124Data/create', 'incident'=>$id)); ?></li>
							<?php }else{ ?>
								<li><?php echo CHtml::link('Data Collection', array('/smsForm124Data/update', 'id'=>$form124data->id, 'incident'=>$id, 'edit'=>'yes')); ?></li>
							<?php } ?>
						
						<li><?php echo CHtml::link('Contributing Factors', array('/smsForm124ContributingFactors/create', 'incident'=>$id)); ?></li>
						<li><?php echo CHtml::link('Corrective Actions', array('/smsForm124CorrectiveActions/create', 'incident'=>$id)); ?></li>
						
							<?php $form124data = @SmsForm124DataAnalysisChecklist::model()->find("incident_id = '{$_GET['id']}' and status = 1"); ?>
							<?php if(empty($form124data)){ ?>
								<li><?php echo CHtml::link('Analysis Checklist', array('/smsForm124DataAnalysisChecklist/create', 'incident'=>$id)); ?></li>
							<?php }else{ ?>
								<li><?php echo CHtml::link('Analysis Checklist', array('/smsForm124DataAnalysisChecklist/update', 'id'=>$form124data->id, 'incident'=>$id, 'edit'=>'yes')); ?></li>
							<?php } ?>
						
						<li><?php echo CHtml::link('Additional Comments', array('/smsForm124Comments/create', 'incident'=>$id), array()); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  
				  
				<?php } ?>
				<?php if(($model->main_category == 'Incident')&&(Users::model()->checkIfUserIsInvestigator())){ ?>
				<div class="box box-default" style="" >
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Incident Investigation Report</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
							<?php $invt = InvestigationReport::model()->find("incident_id = '{$_GET['id']}' and status = 1"); ?>
							<?php if(empty($invt)){ ?>
								<li><?php echo CHtml::link('Make', array('/investigationReport/create', 'incident'=>$id)); ?></li>
							<?php }else{ ?>
								<li><?php echo CHtml::link('Update', array('/investigationReport/view', 'id'=>$invt->id, 'incident'=>$id, 'edit'=>'yes')); ?></li>
							<?php } ?>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  <?php } ?>
			</div>
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->