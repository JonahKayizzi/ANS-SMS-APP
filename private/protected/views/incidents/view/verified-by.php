<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<table class="table ">
										<tr >
											<td>
												<b>
													Verified by 
													<?php 
														$verifications = @Verifications::model()->findAll("incident_id = '{$model->id}' and status = 1");
														
														if(empty($verifications)){
													?>
														<?php echo CHtml::link('+Add', array('verifications/create', 'incident'=>$model->id), array('onClick'=>"return popup(this, 'verify')")); ?>
													<?php 
														}
													?>
												</b>
											</td>
										</tr>
									</table>
									
										<?php 
											//$verifications = @Verifications::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($verifications)){
										?>
										<table class="table ">
										<?php
												foreach($verifications as $verification){
										?>
											<tr valign="top"  class="sms_tr" >
												<td><?php echo $verification->verified_by; ?></td>
												<td><?php echo $verification->note; ?></td>
												<td><?php echo $verification->modified; ?></td>
												<td><?php echo CHtml::link($image_edit, array('verifications/update', 'id'=>$verification->id), array('onClick'=>"return popup(this, 'verify')")); ?></td>
											</tr>
										<?php 
												}
										?>
										</table>
										<?php
											}
										?>

									
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>