<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Implementation Status</h3>
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
											$actions = @ActionsInvestigation::model()->findAll("investigation_id = '{$model->id}' and status = 1");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td><b>Safety Recommendation</b></td>
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
												<td><?php echo @$action->sr->brief; ?></td>
												<td><?php echo $action->details; ?></td>
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo (abs((strtotime($action->date_action_taken) - strtotime($model->date_reported))/(60*60*24))); ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php if($action->accepted == 'NO'){echo CHtml::link('Accept', array('incidents/view', 'id'=>$model->id, 'accept_action_investigate'=>$action->id, 'sr'=>@$action->sr->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-success'));}else{echo CHtml::link('Reject', array('incidents/view', 'id'=>$model->id, 'reject_action_investigate'=>$action->id), array('confirm'=>"Are you sure?", 'class'=>'btn btn-danger'));} ?></td>
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