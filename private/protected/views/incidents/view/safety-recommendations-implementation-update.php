<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Implementation Update</h3>
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
											$actions = @ActionsInvestigation::model()->findAll("investigation_id = '{$model->id}' and status = 1");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td><b>Safety Recommendation</b></td>
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
												<td><?php echo @$action->sr->brief; ?></td>
												<td><?php echo $action->details; ?></td>
												<td><?php echo $action->modified; ?></td>
												
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
												<td><?php echo $action->reported_by; ?></td>
												<td><?php echo CHtml::link($image_edit, array('actionsInvestigation/update', 'id'=>$action->id), array('onClick'=>"return popup(this, 'action')")); ?></td>
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
												<input type="hidden" name="investigation_id" value="<?php echo $model->id; ?>" />
											</td>
										</tr>
										<tr valign="top">
											<td >Safety Recommendation</td>
											<td >
												<?php
												echo CHtml::dropDownList('safety_recommendation_id', '',SafetyRecommendations::model()->getOptionsForImplementation(6, $model->id),array('class'=>'form-control', ));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td >Details</td>
											<td ><input type="text" name="action_investigate" style="width: 99%;" class="form-control" /></td>
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