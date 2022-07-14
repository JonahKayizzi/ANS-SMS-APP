<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Requirements / Mitigations</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->id}' and content_type = 1 and status = 1");
								if(!empty($safety_recommendations)){
									$k=1;
									echo "<table class='table table-stripped'>";
									echo "<thead><tr>";
									echo "<td>#</td>";
									echo "<td>Safety Requirement</td>";
									echo "<td>Type of Control</td>";
									echo "<td>Priority</td>";
									echo "<td>Deadline</td>";
									echo "<td>Action By</td>";
									echo "<td>Date Reviewed</td>";
									echo "<td>Next Review Date</td>";
									
									echo "</tr></thead><tbody>";
									foreach($safety_recommendations as $safety_recommendation){
										
										
										
										$review_dates = SafetyRequirementsReviewDates::model()->findAll("safety_requirement_id = {$safety_recommendation->id}");
										$date_reviewed = "";
										foreach($review_dates as $review_date){$date_reviewed = $review_date->date_reviewed;}
										
										$next_review_dates = SafetyRequirementsNextReviewDates::model()->findAll("safety_requirement_id = {$safety_recommendation->id}");
										$next_date_reviewed = "";
										foreach($next_review_dates as $next_review_date){$next_date_reviewed = $next_review_date->next_review_date;}
										
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$safety_recommendation->brief." </td><td  style=''>".@$safety_recommendation->control->name." </td><td  style=''>".$safety_recommendation->priority." </td><td  style=''>".$safety_recommendation->deadline." </td><td  style=''>".@$safety_recommendation->actionBy->name." </td><td  style=''>".@$date_reviewed." </td><td  style=''>".@$next_date_reviewed." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</tbody></table>";	
								}
								
								?>
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'srequirement-form',
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
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>" />
												<input type="hidden" name="incident_number" value="<?php echo $model->number; ?>" />
											</td>
										</tr>

										<tr valign="top">
											<td >Mitigation</td>
											<td ><input type="text" name="mitigation" style="width: 99%;" class="form-control" /></td>
										</tr>
										<tr valign="top">
											<td >Type of Control</td>
											<td ><?php
												echo CHtml::dropDownList('type_of_control', '',@TypesOfControlsSub::model()->getOptions(),array('class'=>'form-control', ));
											?></td>
										</tr>
										<tr valign="top">
											<td >Priority</td>
											<td >
												<select name="priority" class="form-control">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
											</td>
										</tr>
										<tr valign="top">
											<td >Deadline</td>
											<td >
											<!-- <input type="text" name="time_frame" style="width: 99%;" class="form-control" /> -->
											<?php
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'name'=>'time_frame',
												'value'=>date('Y-m-d'),     
												'options'=>array(
													'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
													'showButtonPanel'=>true,
													'dateFormat'=>'yy-mm-dd',
												),
												'htmlOptions'=>array(
													'style'=>'width: 99%; border: 1px #ccc solid;',
													'class'=>'form-control',
													'placeholder'=>'YYY-MM-DD',
												),
											));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td>Implementor</td>
											<td>
											<?php
												echo CHtml::dropDownList('officer', '',Users::model()->getImplementors(),array('class'=>'form-control', ));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td ></td>
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