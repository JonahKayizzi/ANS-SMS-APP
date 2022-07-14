<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Evidence of Existing Control </h3>
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
											$evidences = @Evidences::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($evidences)){
												foreach($evidences as $evidence){
										?>
											<tr >
												<td><?php echo $evidence->id; ?></td>
												<td><?php echo $evidence->details; ?></td>
												<!-- <td>admin</td> -->
												<td><?php echo $evidence->modified; ?></td>
												<td><?php echo $evidence->reported_by; ?></td>
												<td><?php echo CHtml::link($image_edit, array('evidences/update', 'id'=>$evidence->id), array('onClick'=>"return popup(this, 'evidence')")); ?></td>
												<td><!-- <i class="fa fa-close" style="color: #ff0000;"></i> --></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'evidence-form',
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
											<td width="80%"><input type="text" name="evidence" style="width: 99%;" class="form-control" /></td>
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