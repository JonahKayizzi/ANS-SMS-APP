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
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Requirements #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Requirements #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">
			<?php
				if(isset($_GET['accept_action'])){
					if(@ActionsSafetyRecommendations::model()->updateByPk($_GET['accept_action'], array('accepted'=>'YES'))){
						
						$msg = "Safety Recommendations implementaion #{$_GET['accept_action']} has been accepted.";
						
					}
				}
				if(isset($_GET['reject_action'])){
					if(@ActionsSafetyRecommendations::model()->updateByPk($_GET['reject_action'], array('accepted'=>'NO'))){
						$msg = "Safety Recommendations implementaion #{$_GET['reject_action']} has been rejected.";
					}
				}
				?>
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
								<?php echo CHtml::link('<i class="fa fa-lock"></i> Close', array('safetyRecommendations/view', 'id'=>$model->id, 'sr_close'=>$model->id), array('confirm'=>'Are you sure?', 'class'=>'btn btn-app', 'style'=>'background-color: #dd4b39; color: #fff;')); ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
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
							<b><?php echo $model->attributeLabels()['source']; ?></b>
						</td>
						<td>
							<?php /* echo Yii::app()->request->baseUrl; */ ?>
							<?php 
								$path = "#";
								if($model->content_type == 7){$path = "safetyRecommendations/view";}
								if($model->content_type == 6){$path = "incidents/view";}
								if($model->content_type == 5){$path = "auditForm/view";}
								if($model->content_type == 4){$path = "riskManagement/view";}
								if($model->content_type == 3){$path = "tasks/view";}
								if($model->content_type == 2){$path = "workshops/view";}
								if($model->content_type == 1){$path = "incidents/view";}
								
								if($model->content_type == 7){
									echo CHtml::link($model->source, array($path, 'id'=>@$model->id));
								}else{
									echo CHtml::link($model->source, array($path, 'id'=>@$model->content_id));
								}
							?>
						</td>
					</tr>
					<?php /* if(isset($model->content_id)){ */ ?>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['source_category']; ?></b>
						</td>
						<td><?php echo $model->source_category; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['source_detail']; ?></b>
						</td>
						<td><?php echo $model->source_detail; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['type_of_control']; ?></b>
						</td>
						<td><?php echo @$model->control->name; ?></td>
					</tr>
					<?php /* } */ ?>
					<?php if(isset($model->content_id)){ ?>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['content_type']; ?></b>
						</td>
						<td><?php echo $model->content_type; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['content_id']; ?></b>
						</td>
						<td><?php echo $model->content_id; ?></td>
					</tr>
					<?php } ?>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['details']; ?></b>
						</td>
						<td><?php echo $model->details; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['causes']; ?></b>
						</td>
						<td><?php echo $model->causes; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['remarks']; ?></b>
						</td>
						<td><?php echo $model->remarks; ?></td>
					</tr>
					<!-- <tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['mitigation']; ?></b>
						</td>
						<td><?php echo $model->mitigation; ?></td>
					</tr> -->
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['brief']; ?></b>
						</td>
						<td><?php echo $model->brief; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['priority']; ?></b>
						</td>
						<td><?php echo $model->priority; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['deadline']; ?></b>
						</td>
						<td><?php echo $model->deadline; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['action_by']; ?></b>
						</td>
						<td><?php echo @$model->actionBy->name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['reported_by']; ?></b>
						</td>
						<td><?php echo $model->reported_by; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['modified']; ?></b>
						</td>
						<td><?php echo $model->modified; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_assigned']; ?></b>
						</td>
						<td><?php echo $model->date_assigned; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_closed']; ?></b>
						</td>
						<td><?php echo $model->date_closed; ?></td>
					</tr>
				</table>
				
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
					</div>
				</div>
				
				<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Implementation Status</h3>
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
											$actions = @ActionsSafetyRecommendations::model()->findAll("sr_id = '{$model->id}' and status = 1");
											
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
												<td><?php echo round((abs((strtotime($action->date_action_taken) - strtotime($model->modified))/(60*60*24))), 1); ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php if($action->accepted == 'NO'){echo CHtml::link('Accept', array('safetyRecommendations/view', 'id'=>$model->id, 'accept_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-success'));}else{echo CHtml::link('Reject', array('safetyRecommendations/view', 'id'=>$model->id, 'reject_action'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-danger'));} ?></td>
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
							  <h3 class="box-title">Implementation Update</h3>
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
											$actions = @ActionsSafetyRecommendations::model()->findAll("sr_id = '{$model->id}' and status = 1");
											
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
												<td><?php echo CHtml::link($image_edit, array('actionsSafetyRecommendations/update', 'id'=>$action->id), array('onClick'=>"return popup(this, 'action')")); ?></td>
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
												<input type="hidden" name="sr_id" value="<?php echo $model->id; ?>" />
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
				
				<?php
					$this->renderPartial('next-review-date', array('model'=>$model, 'NextReviewDate'=>$NextReviewDate, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
				
				<?php
					$this->renderPartial('review-date', array('model'=>$model, 'ReviewDate'=>$ReviewDate, 'image_add'=>$image_add, 'image_edit'=>$image_edit));
				?>
              
            </div><!-- /.col -->
			<div class="col-xs-3">
				
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
				  <div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Reports</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<li><?php echo CHtml::link('SMS Form 123', array('/safetyRecommendations/report'), array('target'=>'_blank')); ?></li>
						<li><?php echo CHtml::link('Review Schedule', array('/safetyRecommendations/reviewSchedule'), array('target'=>'_blank')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  