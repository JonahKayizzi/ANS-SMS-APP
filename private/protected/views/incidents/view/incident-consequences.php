<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Description of consequences / Effects</h3>
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
											$consequences = @IncidentsConsequences::model()->findAll("incident_id = '{$model->id}' and status = 1");
											
											if(!empty($consequences)){
												foreach($consequences as $consequence){
										?>
											<tr>
												<td><?php echo $consequence->id; ?></td>
												<td><?php echo @$consequence->consequence->main->name; ?></td>
												<td><?php echo @$consequence->consequence->name; ?></td>
												<td><?php echo CHtml::link('Delete', array('incidents/view', 'id'=>$model->id, 'cancel_consequence'=>$consequence->id), array('class'=>"btn btn-danger btn-xs", 'confirm'=>'Are you sure?')); ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'incidents-consequences-form',
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
													echo CHtml::dropDownList('incident_consequences_sub', '',IncidentConsequencesSub::model()->getOptions(),array('class'=>'form-control', ));
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
					</div>
				</div>