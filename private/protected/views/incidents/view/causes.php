<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Causes <?php if((Users::model()->checkIfUserIsAdmin())){ ?>[<?php echo CHtml::link('~Manage Main Categories', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#causesMainManage-modal')); ?>][<?php echo CHtml::link('~Manage Sub Categories', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#causesSubManage-modal')); ?>]<?php } ?><!-- <a href="#" class="" data-toggle="modal" data-target="#causesModal"><i class="fa fa-plus-circle" style="color: #33cc33;"></i></a> --></h3>
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
											$causes = @IncidentsCauses::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($causes)){
												foreach($causes as $cause){
										?>
											<tr>
												<td><?php echo $cause->id; ?></td>
												<td><?php echo @$cause->cause->main->name; ?></td>
												<td><?php echo @$cause->cause->name; ?></td>
												<td><?php echo CHtml::link('Delete', array('incidents/view', 'id'=>$model->id, 'cancel_cause'=>$cause->id), array('class'=>"btn btn-danger btn-xs", 'confirm'=>'Are you sure?')); ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'incidents-causes-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td width="">
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>"  />
												<?php
													echo CHtml::dropDownList('incident_causes_sub', '',IncidentCausesSub::model()->getOptions(),array('class'=>'form-control', ));
												?>
											</td>
											<td><input type="submit" class="form-control" value="Save" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
						  <div class="" >
							<div class="modal" id="causesMainManage-modal">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Manage Main Categories</h4>
								  </div>
								  <div class="modal-body">
									<?php
										$incident_main_causes = @IncidentCausesMain::model()->findAll("status = 1");
										if(!empty($incident_main_causes)){
									?>
										<table class="table">
										<tr>
											<th>#</th>
											<th>Main Category</th>
											<th></th>
										</tr>
										<?php foreach($incident_main_causes as $incident_main_cause){ ?>
										<tr>
											<td><?php echo $incident_main_cause->id; ?></td>
											<td><?php echo $incident_main_cause->name; ?></td>
											<td><?php echo CHtml::link('Delete', array('/incidents/view', 'id'=>$model->id, 'cancel_main_cause'=>$incident_main_cause->id, 'action'=>'del'), array('class'=>"btn btn-danger btn-xs", 'confirm'=>'Are you sure?')); ?></td>
										</tr>
										<?php } ?>
										</table>
									<?php
										}
									  ?>
										<?php $form=$this->beginWidget('CActiveForm', array(
											'id'=>'incident-main-causes-form',
											// Please note: When you enable ajax validation, make sure the corresponding
											// controller action is handling ajax validation correctly.
											// There is a call to performAjaxValidation() commented in generated controller code.
											// See class documentation of CActiveForm for details on this.
											'enableAjaxValidation'=>false,
										)); ?>
										<table width="100%" class="table">
											<tr>
												<td>
													<input type="text" name="incident_main_cause" placeholder="Add Main Category" class="form-control" />
												</td>
											</tr>
											<tr>
												<td><input type="submit" value="Save" class="form-control" /></td>
											</tr>
										</table>
										<?php $this->endWidget(); ?>
								  </div>
								</div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						  </div><!-- /.example-modal -->
						  <div class="" >
							<div class="modal" id="causesSubManage-modal">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Manage Sub Categories</h4>
								  </div>
								  <div class="modal-body">
									<?php
										$incident_sub_causes = @IncidentCausesSub::model()->findAll("status = 1");
										if(!empty($incident_sub_causes)){
									?>
										<table class="table">
										<tr>
											<th>#</th>
											<th>Main Category</th>
											<th>Sub Category</th>
											<th></th>
										</tr>
										<?php foreach($incident_sub_causes as $incident_sub_cause){ ?>
										<tr>
											<td><?php echo $incident_sub_cause->id; ?></td>
											<td><?php echo @$incident_sub_cause->main->name; ?></td>
											<td><?php echo $incident_sub_cause->name; ?></td>
											<td><?php echo CHtml::link('Delete', array('/incidents/view', 'id'=>$model->id, 'cancel_sub_cause'=>$incident_sub_cause->id, 'action'=>'del'), array('class'=>"btn btn-danger btn-xs", 'confirm'=>'Are you sure?')); ?></td>
										</tr>
										<?php } ?>
										</table>
									<?php
										}
									  ?>
										<?php $form=$this->beginWidget('CActiveForm', array(
											'id'=>'incident-sub-causes-form',
											// Please note: When you enable ajax validation, make sure the corresponding
											// controller action is handling ajax validation correctly.
											// There is a call to performAjaxValidation() commented in generated controller code.
											// See class documentation of CActiveForm for details on this.
											'enableAjaxValidation'=>false,
										)); ?>
										<table width="100%" class="table">
											<tr>
												<td>
													<?php
														echo CHtml::dropDownList('incident_causes_main', '',IncidentCausesMain::model()->getOptions(),array('class'=>'form-control', ));
													?>
												</td>
											</tr>
											<tr>
												<td>
													<input type="text" name="incident_sub_cause" placeholder="Add Sub Category" class="form-control" />
												</td>
											</tr>
											<tr>
												<td><input type="submit" value="Save" class="form-control" /></td>
											</tr>
										</table>
										<?php $this->endWidget(); ?>
								  </div>
								</div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						  </div><!-- /.example-modal -->
						  
						  <div class="" >
							<div class="modal" id="causesModalEdit">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header" style="background-color: #ff9933; color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Edit Cause #324</h4>
								  </div>
								  <div class="modal-body">
									<div class="form-group">
										<!-- <label for="cause"></label> -->
										<textarea class="form-control" rows="3" >Sample causes information here</textarea>
									</div>
								  </div>
								  <div class="modal-footer">
									<a href="#" class="btn btn-info" role="button"><i class="fa fa-floppy-o"></i></a>
									<a href="#" class="btn btn-default" role="button" data-dismiss="modal"><i class="fa fa-close"></i></a>
								  </div>
								</div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						  </div><!-- /.example-modal -->
					</div>
				</div>