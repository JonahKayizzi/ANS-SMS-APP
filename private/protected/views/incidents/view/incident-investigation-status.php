<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Incident Investigation Info</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									
									<table class="table table-striped">
										
										<tr valign="top">
											<td >Aircraft Involved</td>
											<td ><?php echo $model->aircraft_involved; ?></td>
										</tr>
										
										<tr valign="top">
											<td >Form of Notification</td>
											<td >
											<?php echo $model->form_of_notification; ?>
											</td>
										</tr>
										<tr valign="top">
											<td >Level of Investigation</td>
											<td >
											<?php echo $model->level_of_investigation; ?>
											</td>
										</tr>
										<tr valign="top">
											<td >Terms of Reference</td>
											<td >
											<?php echo $model->investigation_tor; ?>
											</td>
										</tr>
										<tr valign="top">
											<td >Deadline</td>
											<td >
											<?php echo $model->investigation_deadline; ?>
											</td>
										</tr>
										<tr valign="top">
											<td >Investigator</td>
											<td >
											<?php echo @$model->investigator->name; ?>
											</td>
										</tr>
									</table>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>