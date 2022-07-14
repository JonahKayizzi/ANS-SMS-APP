<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Monitoring activities</h3>
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
											$mactivities = @MonitoringActivities::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($mactivities)){
										?>
											<tr valign="top"  class="sms_tr" style="" >
												<td></td>
												<td><b>Monitoring activity</b></td>
												<td><b>Frequency</b></td>
												<td><b>Duration</b></td>
												<td><b>Substitute risk</b></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										<?php
												foreach($mactivities as $mactivity){
										?>
											<tr valign="top"  class="sms_tr" >
												<td><?php echo $mactivity->id; ?></td>
												<td><?php echo $mactivity->monitoring_activity; ?></td>
												<td><?php echo $mactivity->frequency; ?></td>
												<td><?php echo $mactivity->duration; ?></td>
												<td><?php echo $mactivity->substitute_risk; ?></td>
												<td><?php echo $mactivity->reported_by; ?></td>
												<td><?php echo CHtml::link($image_edit, array('monitoringActivities/update', 'id'=>$mactivity->id), array('onClick'=>"return popup(this, 'mactivity')")); ?></td>
												<td><!-- <i class="fa fa-close" style="color: #ff0000;"></i> --></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									
									<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'monitoring-form',
													// Please note: When you enable ajax validation, make sure the corresponding
													// controller action is handling ajax validation correctly.
													// There is a call to performAjaxValidation() commented in generated controller code.
													// See class documentation of CActiveForm for details on this.
													'enableAjaxValidation'=>false,
												)); ?>
									<table class="table table-striped">
										<tr>
											<td>Monitoring Activity</td>
											<td><input type="text" class="form-control" name="MonitoringActivities[monitoring_activity]" /> </td>
										</tr>
										<tr>
											<td>Frequency</td>
											<td> <input type="text" class="form-control" name="MonitoringActivities[frequency]" /></td>
										</tr>
										<tr>
											<td>Duration</td>
											<td><input type="text" class="form-control" name="MonitoringActivities[duration]" /></td>
										</tr>
										<tr>
											<td>Substitute Risk</td>
											<td > <input type="text" class="form-control" name="MonitoringActivities[substitute_risk]" /></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="submit" class="form-control" value="Save" style="width: 99%;"></td>
										</tr>
										<input value="<?php echo Yii::app()->user->name; ?>" name="MonitoringActivities[reported_by]" id="MonitoringActivities_reported_by" type="hidden">	
										<input value="<?php echo $model->id; ?>" name="MonitoringActivities[incident_id]" id="MonitoringActivities_incident_id" type="hidden">
									</table>

									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>