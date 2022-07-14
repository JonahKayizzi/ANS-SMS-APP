<?php 
	$imageUrl_add = Yii::app()->request->baseUrl.'/images/1437745034_add.png'; 
	$imageUrl_edit = Yii::app()->request->baseUrl.'/images/1437745501_edit.png'; 
	$imageUrl_print = Yii::app()->request->baseUrl.'/images/1437747079_Print.png'; 
	$image_add = '<img src="'.$imageUrl_add.'" width="17px" alt="[+Add]" />'; 
	$image_edit = '<img src="'.$imageUrl_edit.'" width="17px" alt="[-Edit]" />'; 
	$image_print = '<img src="'.$imageUrl_print.'" width="37px" alt="[~Print]" />';
?>
<?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Audit Form #<?php echo $model->issue_no; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Audit Form #<?php echo $model->issue_no; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<!-- <div class="row">
			<div class="col-xs-9">
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Lessons Learnt', array('/lessonsLearnt/create', 'audit'=>$model->issue_no, 'content_type'=>5), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#lessons-learnt">
					<i class="fa fa-external-link"></i> Lessons Learnt
				</a>
				
				<?php echo CHtml::link('<i class="fa fa-plus"></i> Safety Recommendations', array('/safetyRecommendations/create', 'audit'=>$model->issue_no, 'content_type'=>5), array('class'=>'btn btn-app')); ?>
				
				<a class="btn btn-app" href="#" data-toggle="modal" data-target="#safety-recommendations">
					<i class="fa fa-external-link"></i> Safety Recommendations
				</a>
			</div>
		</div> -->
		
		
          <div class="row">
            <div class="col-xs-9">
			<?php
				
				?>
				<?php if(isset($_GET['msg'])){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_GET['msg']; ?>
                  </div>
				<?php } ?>
				<?php if(isset($_GET['msg_error'])){ ?>
				<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_GET['msg_error']; ?>
                  </div>
				<?php } ?>
				<?php if($msg != ''){ ?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
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
				
				
				<div class="row">
					<div class="col-xs-12">
						<?php if((Users::model()->checkIfUserIsAdmin())){ ?>
							<?php if($model->open_close == 0){ ?>
								<?php echo CHtml::link('<i class="fa fa-lock"></i> Close', array('auditForm/view', 'id'=>$model->issue_no, 'sr_close'=>$model->issue_no), array('confirm'=>'Are you sure?', 'class'=>'btn btn-app', 'style'=>'background-color: #dd4b39; color: #fff;')); ?>
							<?php } ?>
						<?php } ?>
						
						<?php echo CHtml::link('<i class="fa fa-print"></i> Print', array('auditForm/print2', 'id'=>$model->issue_no), array('target'=>'_blank', 'class'=>'btn btn-app', 'style'=>'background-color: #3C8DBC; color: #fff;')); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
					<div class="box">
				
                <div class="box-body">
				
				
				
				<table class="table table-stripped">
				<?php if($model->audit_plan_id != null){ ?>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['audit_plan_id']; ?></b>
						</td>
						<td><?php echo CHtml::link(@$model->auditPlan->title, array('/auditPlan/view', 'id'=>$model->audit_plan_id)).' << <i>Click to view more details.</i>'; ?></td>
					</tr>
				<?php } ?>
				<?php if($model->questionnaire != null){ ?>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['questionnaire']; ?></b>
						</td>
						<td>
						<?php $questionaire_info = @Questionnaire::model()->findByPk($model->questionnaire); ?>
						<?php echo CHtml::link(@$questionaire_info->title, array('/questionnaire/view', 'id'=>@$model->questionnaire)); ?> << Click here to go back.
						</td>
					</tr>
				<?php } ?>
				<?php if($model->questionnaire_sub_element != null){ ?>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['questionnaire_sub_element']; ?></b>
						</td>
						<td><?php echo @$model->questionnaireQuestion->question; ?></td>
					</tr>
				<?php } ?>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['issue_no']; ?></b>
						</td>
						<td><?php echo $model->issue_no; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['issue_date']; ?></b>
						</td>
						<td><?php echo $model->issue_date; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['auditor_technical_assessor']; ?></b>
						</td>
						<td><?php echo $model->auditor_technical_assessor; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['area_audited']; ?></b>
						</td>
						<td><?php echo $model->area_audited; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['area_audited_date']; ?></b>
						</td>
						<td><?php echo $model->area_audited_date; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['auditees_representative']; ?></b>
						</td>
						<td><?php echo @$model->auditRepresentative->name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['type_of_control']; ?></b>
						</td>
						<td><?php echo @$model->control->name; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['detailed_observation']; ?></b>
						</td>
						<td><?php echo $model->detailed_observation; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['classification_of_non_conformance']; ?></b>
						</td>
						<td><?php echo $model->classification_of_non_conformance; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['reference_number_of_iso_9001_or_procedure']; ?></b>
						</td>
						<td><?php echo $model->reference_number_of_iso_9001_or_procedure; ?></td>
					</tr>
				</table>
				</div>
				</div>
				</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
					<div class="box">
				
                <div class="box-body">
				<table class="table table-stripped">
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['root_cause_analysis_of_non_conformance']; ?></b>
						</td>
						<td><?php echo $model->root_cause_analysis_of_non_conformance; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['suggested_corrective_action']; ?></b>
						</td>
						<td><?php echo $model->suggested_corrective_action; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['proposed_date_of_realisation']; ?></b>
						</td>
						<td><?php echo $model->proposed_date_of_realisation; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['priority']; ?></b>
						</td>
						<td><?php echo $model->priority; ?></td>
					</tr>
				</table>
				</div>
				</div>
				</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Root Cause Analysis</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
							<?php /* echo $form->textArea($model,'root_cause_analysis_of_non_conformance',array('class'=>'form-control')); */ ?>
							<?php
							$this->widget('KRichTextEditor', array(
								'model' => $model,
							  
								'attribute' => 'root_cause_analysis_of_non_conformance',
								'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px; width: 100%;"),
								'options' => array(
									'theme_advanced_resizing' => 'true',
									'theme_advanced_statusbar_location' => 'bottom',
									'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
									'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
									'theme_advanced_buttons3' => '',
								),
							));
							?>
							<?php echo $form->error($model,'root_cause_analysis_of_non_conformance'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Suggested Corrective Action</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
							<?php
							$this->widget('KRichTextEditor', array(
								'model' => $model,
							  
								'attribute' => 'suggested_corrective_action',
								'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px; width: 100%;"),
								'options' => array(
									'theme_advanced_resizing' => 'true',
									'theme_advanced_statusbar_location' => 'bottom',
									'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
									'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
									'theme_advanced_buttons3' => '',
								),
							));
							?>
							<?php echo $form->error($model,'suggested_corrective_action'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Proposed Date of Realisation</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
			
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'AuditForm[proposed_date_of_realisation]',
							/* 'value'=>date('Y-m-d'),  */    
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>' border: 1px #ccc solid;',
								'class'=>'form-control',
								'placeholder'=>'YYYY-MM-DD',
							),
						));
						?>
							<?php echo $form->error($model,'proposed_date_of_realisation'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Priority</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
			
							<select class="form-control" name="AuditForm[priority]">
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
							<?php echo $form->error($model,'priority'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">CAP Implementation Status</h3>
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
											$actions = @ActionsAuditForm::model()->findAll("audit_form_id = '{$model->issue_no}' and status = 1");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td><b>Action</b></td>
												<td><b> Date of implementation  </b></td>
												<td><b>No. of days taken</b></td>
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
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo (abs((strtotime($action->date_action_taken) - strtotime($model->issue_date))/(60*60*24))); ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php if($action->accepted == 'NO'){echo CHtml::link('Accept', array('auditForm/view', 'id'=>$model->issue_no, 'accept_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-success'));}else{echo CHtml::link('Reject', array('auditForm/view', 'id'=>$model->issue_no, 'reject_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-danger'));} ?></td>
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
							  <h3 class="box-title">CAP Implementation Update</h3>
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
											$actions = @ActionsAuditForm::model()->findAll("audit_form_id = '{$model->issue_no}' and status = 1");
											
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
												<td><?php echo CHtml::link($image_edit, array('actionsAudiForm/update', 'id'=>$action->id), array('onClick'=>"return popup(this, 'action')")); ?></td>
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
												<input type="hidden" name="audit_form_id" value="<?php echo $model->issue_no; ?>" />
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
													'class'=>'form-control',
													'placeholder'=>'YYYY-MM-DD',
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
				<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
				<div class="row">
					<div class="col-xs-12">
					<div class="box">
				
                <div class="box-body">
				<table class="table table-stripped">
					<tr>
						<td width="25%">
							<b><?php echo $model->attributeLabels()['verification_of_proof']; ?></b>
						</td>
						<td><?php echo $model->verification_of_proof; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['lead_auditors_comments']; ?></b>
						</td>
						<td><?php echo $model->lead_auditors_comments; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['lead_auditors_comments_date']; ?></b>
						</td>
						<td><?php echo $model->lead_auditors_comments_date; ?></td>
					</tr>
				</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Verification of proof of effective corrective action and close-out by the auditor</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
							<?php
							$this->widget('KRichTextEditor', array(
								'model' => $model,
							  
								'attribute' => 'verification_of_proof',
								'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px; width: 100%;"),
								'options' => array(
									'theme_advanced_resizing' => 'true',
									'theme_advanced_statusbar_location' => 'bottom',
									'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
									'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
									'theme_advanced_buttons3' => '',
								),
							));
							?>
							<?php echo $form->error($model,'suggested_corrective_action'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Lead Auditor's Comments</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'audit-form-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table ">
					<tr>
						<td colspan="2">
							<?php echo $form->hiddenField($model,'issue_no', array('value'=>$model->issue_no)); ?>
							<?php
							$this->widget('KRichTextEditor', array(
								'model' => $model,
							  
								'attribute' => 'lead_auditors_comments',
								'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 300px; width: 100%;"),
								'options' => array(
									'theme_advanced_resizing' => 'true',
									'theme_advanced_statusbar_location' => 'bottom',
									'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
									'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
									'theme_advanced_buttons3' => '',
								),
							));
							?>
							<?php echo $form->error($model,'suggested_corrective_action'); ?>
						</td>
						
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Submit" class="form-control" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>
				
				<?php
					$this->renderPartial('next-review-date', array('model'=>$model, 'NextReviewDate'=>$NextReviewDate, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				
				<?php
					$this->renderPartial('review-date', array('model'=>$model, 'ReviewDate'=>@$ReviewDate, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				<?php } ?>
				<div class="row">
					
				</div>

              
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