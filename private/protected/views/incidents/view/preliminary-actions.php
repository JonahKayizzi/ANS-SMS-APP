<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Preliminary Action(s) taken <!-- <a href="#" class="" data-toggle="modal" data-target="#causesModal"><i class="fa fa-plus-circle" style="color: #33cc33;"></i></a> --></h3>
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
										
											$actions_taken = @ActionsTaken::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($actions_taken)){
												foreach($actions_taken as $action_taken){
										?>
											<tr>
												<td><?php echo $action_taken->id; ?></td>
												<td><?php echo $action_taken->description; ?></td>
												<!-- <td>admin</td> -->
												<td><?php echo $action_taken->date; ?></td>
												<td><?php echo $action_taken->reported_by; ?></td>
												<td><?php /* echo CHtml::link($image_edit, array('causes/update', 'id'=>$cause->id), array('onClick'=>"return popup(this, 'cause')")); */ ?></td>
												<td><!-- <i class="fa fa-close" style="color: #ff0000;"></i> --></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'action-taken-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td width="80%">
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>"  />
											</td>
											<td></td>
										</tr>
										<tr valign="top">
											<td width="80%"><input type="text" name="action_taken" style="width: 99%;"  class="form-control" /></td>
											<td><input type="submit" class="form-control" value="Save" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
						  <div class="" >
							<div class="modal" id="actionTakenModal">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Action Taken</h4>
								  </div>
								  <div class="modal-body">
									<div class="form-group">
										<!-- <label for="cause"></label> -->
										<textarea class="form-control" rows="3" placeholder="Type text here"></textarea>
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
						  
						  <div class="" >
							<div class="modal" id="actionTakenModalEdit">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header" style="background-color: #ff9933; color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Edit Action Taken #XXX</h4>
								  </div>
								  <div class="modal-body">
									<div class="form-group">
										<!-- <label for="cause"></label> -->
										<textarea class="form-control" rows="3" >Sample information here</textarea>
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