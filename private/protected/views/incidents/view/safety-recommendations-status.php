<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title">Safety Recommendations Status</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->id}' and content_type = 6 and status = 1");
								if(!empty($safety_recommendations)){
									$k=1;
									echo "<table class='table table-stripped'>";
									echo "<thead><tr>";
									echo "<td>#</td>";
									echo "<td>Details</td>";
									echo "<td>Type of Control</td>";
									echo "<td>Priority</td>";
									echo "<td>Deadline</td>";
									echo "<td>Action By</td>";
									echo "<td>Date Reviewed</td>";
									echo "<td>Next Review Date</td>";
									echo "<td></td>";
									echo "</tr></thead><tbody>";
									foreach($safety_recommendations as $safety_recommendation){
										
										if($safety_recommendation->open_close == 0){
											if(Users::model()->checkIfUserIsAdmin()){
												/* $close_link = CHtml::link('Close', array('/incidents/view', 'id'=>$model->id, 'sr_close'=>$safety_recommendation->id), array('class'=>'btn btn-danger', 'confirm'=>'Are you sure?')); */
												
												$close_link = "";
											}else{
												$close_link = "";
											}
											
										}else{
											/* $close_link = "<span style='background-color: #ffcccc; padding: 3px;'>Closed</span>"; */
											$close_link = "";
										}
										
										$review_dates = SafetyRequirementsReviewDates::model()->findAll("safety_requirement_id = {$safety_recommendation->id}");
										$date_reviewed = "";
										foreach($review_dates as $review_date){$date_reviewed = $review_date->date_reviewed;}
										
										$next_review_dates = SafetyRequirementsNextReviewDates::model()->findAll("safety_requirement_id = {$safety_recommendation->id}");
										$next_date_reviewed = "";
										foreach($next_review_dates as $next_review_date){$next_date_reviewed = $next_review_date->next_review_date;}
										
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$safety_recommendation->brief." </td><td  style=''>".@$safety_recommendation->control->name." </td><td  style=''>".$safety_recommendation->priority." </td><td  style=''>".$safety_recommendation->deadline." </td><td  style=''>".@$safety_recommendation->actionBy->name." </td><td  style=''>".@$date_reviewed." </td><td  style=''>".@$next_date_reviewed." </td><td>".$close_link."</td>";
										echo "</tr>";
										$k++;
									}
									echo "</tbody></table>";	
								}
								
								?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>