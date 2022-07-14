<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">SITREP Category <i>Click <?php echo CHtml::link('here', array('/sitrepCategories/admin')); ?> to manage all SITREP Categories</i><!-- <a href="#" class="" data-toggle="modal" data-target="#causesModal"><i class="fa fa-plus-circle" style="color: #33cc33;"></i></a> --></h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'sitrep-category-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td width="100%">
											
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>"  />
												<?php if($model->sitrep_category == NULL){echo 'UNDEFINED';}else{echo @$model->sitrepCategory->name;} ?>
												
											</td>
										</tr>
										<tr valign="top">
											<td width="100%">
												
												<?php
													echo CHtml::dropDownList('sitrep_category', '',SitrepCategories::model()->getOptions(),array('class'=>'form-control', ));
												?>
												
											</td>
										</tr>
										<tr valign="top">
											<td><input type="submit" class="form-control" value="Save" style="width: 100%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
						  
					</div>
				</div>