<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Date Reviewed </h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<table class="table table-striped">
										<?php $safety_requirement_id = SafetyRecommendations::model()->find("content_type = 5 and content_id = {$model->issue_no}"); ?>
										<?php 
											$dates = @SafetyRequirementsReviewDates::model()->findAll("safety_requirement_id = '{$safety_requirement_id->id}'");
											
											if(!empty($dates)){
												foreach($dates as $date){
										?>
											<tr valign="top"  class="" >
												<td><?php echo $date->date_reviewed; ?></td>
												<td><?php echo $date->comment; ?></td>
												<td><?php /* echo CHtml::link($image_edit, array('reviewDates/update', 'id'=>$date->id), array('onClick'=>"return popup(this, 'review_dates')")); */ ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'next-review-date-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td width="100%">
												
												<?php echo $form->hiddenField(@$ReviewDate,'safety_requirement_id',array('value'=>@$safety_requirement_id->id)); ?>
											</td>
										</tr>
										<tr valign="top">
											<td width="100%">
											<?php
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'model'=>@$ReviewDate,
												'attribute'=>'date_reviewed',
												//'name'=>'[SafetyRequirementsNextReviewDates][next_review_date]',
												'value'=>date('Y-m-d'),     
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
										<tr>
											<td width="100%">
												<?php echo $form->textField(@$ReviewDate,'comment',array('class'=>'form-control', 'placeholder'=>'Comment')); ?>
											</td>
										</tr>
										<tr>
											<td>
												<input type="submit" value="Save" class="form-control" style="width: 100%;" />
											</td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>