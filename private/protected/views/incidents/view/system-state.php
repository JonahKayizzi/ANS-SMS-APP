<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">System State</h3>
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
											$states = @SystemStates::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($states)){
												foreach($states as $state){
										?>
											<tr  >
												<td><?php echo $state->id; ?></td>
												<td><?php echo $state->details; ?></td>
												<!-- <td>admin</td> -->
												<td><?php echo $state->modified; ?></td>
												<td><?php echo $state->reported_by; ?></td>
												<td><?php echo CHtml::link($image_edit, array('systemStates/update', 'id'=>$state->id), array('onClick'=>"return popup(this, 'sstate')")); ?></td>
												<td><!-- <i class="fa fa-close" style="color: #ff0000;"></i> --></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'sstate-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td width="80%">
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>" />
											</td>
											<td></td>
										</tr>
										<tr valign="top">
											<td width="80%"><input type="text" name="sstate" style="width: 99%;"  class="form-control" /></td>
											<td><input type="submit" value="Save"  class="form-control" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>