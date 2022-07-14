<div class="row">
					<div class="col-md-12">
						<div class="box box-default box-solid"   >
							<div class="box-header with-border" style="background-color: <?php if($model->parent_occurrence != NULL){echo "orange";} ?>">
							  <h3 class="box-title"><?php echo $model->main_category; ?> #<?php echo $model->id; ?> </h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<table class="table">
										<tr>
											<td><b>ID</b></td><td><?php echo $model->id; ?></td>
											<td><b>Number</b></td><td><?php echo $model->number; ?></td>
										</tr>
										<tr>
											<td><b><?php echo $model->main_category; ?></b></td><td><?php echo $model->occurrence; ?></td>
											<td><b>Description</b></td><td><?php echo $model->brief_notes; ?></td>
										</tr>
										<tr>
											<td><b>Place</b></td><td><?php echo $model->place; ?></td>
											<td><b>Date of occurrence</b></td><td><?php echo $model->date; ?></td>
										</tr>
										<tr>
											<td><b>Time</b></td><td><?php echo $model->time; ?></td>
											<td><b>Date reported</b></td><td><?php echo $model->date_reported; ?></td>
										</tr>
										<tr>
											<td><b>Reoccuring</b></td><td><?php if($model->reoccuring == 0){echo "NO";}else{echo "YES";} ?></td>
											<td><b>Reported By</b></td><td><?php echo $model->reported_by; ?></td>
										</tr>
										<tr>
											<td><b>Department</b></td><td><?php echo $model->reported_by_department; ?></td>
											<td><b>Telephone No.</b></td><td><?php echo $model->reported_by_tel; ?></td>
										</tr>
										<tr>
											<td><b>Email</b></td><td><?php echo $model->reported_by_email; ?></td>
											<td><b>Reported On</b></td><td><?php echo $model->modified; ?></td>
										</tr>
										<tr>
											<td><b>Status</b></td><td><span class="label label-success"><?php echo $model->status0->name; ?></span></td>
											<td><b>Main Category</b></td><td><?php echo $model->main_category; ?> <?php if(Users::model()->checkIfUserIsAdmin()){ ?>[<?php echo CHtml::link('~Re-classify', array('update', 'id'=>$model->id)); ?>]<?php } ?></td>
										</tr>
										<tr>
										<?php if($model->main_category == 'Incident'){ ?>
											<td><b>Incident Category</b></td><td><?php echo $model->incident_category; ?></td>
										<?php }else{ ?>	
											<td></td><td></td>
										<?php } ?>
											<td><b>Category</b></td><td><?php echo @$model->category; ?></td>
										</tr>
										<?php if($model->parent_occurrence != NULL){ ?>
										<tr style="background-color: <?php if($model->parent_occurrence != NULL){echo "orange";} ?>">
											<td><b>&nbsp;</b></td><td></td>
											<td><b>Parent Occurrence #</b></td><td><?php echo CHtml::link($model->parent_occurrence, array('/incidents/view', 'id'=>$model->parent_occurrence), array('style'=>'color: #000; font-weight: bold;')); ?> <i>Click to view</i></td>
										</tr>
										<?php } ?>
										<tr>
											<td><b>Brief</b></td>
											<td>
												<?php echo $model->brief_notes; ?> 
												<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
												[
													<?php if($model->brief_notes == ''){ ?>
														<?php echo CHtml::link('+Add Brief Notes', array('note', 'id'=>$model->id), array('onClick'=>"return popup(this, 'note')")); ?>
													<?php }else{ ?>
														<?php echo CHtml::link('~Edit Brief Notes', array('note', 'id'=>$model->id), array('onClick'=>"return popup(this, 'note')")); ?>
													<?php } ?>
												]
												<?php } ?>
											</td>
											<td><b>Notes/Recommendation on fixing the problem</b></td><td><?php echo $model->recommendations; ?></td>
										</tr>
										<tr>
											<td><b>Type of operation or activity</b> <?php if((Users::model()->checkIfUserIsAdmin())){ ?>[
													<?php echo CHtml::link('~Manage', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#activityTypeManage-modal')); ?>
											]<?php } ?></td>
											<td>
												<?php echo @OperationTypes::model()->findByPk($model->type_of_operation)->name; ?> 
												<?php if((Users::model()->checkIfUserIsAdmin())){ ?>[
													<?php echo CHtml::link('~Edit', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#activityType-modal')); ?>
												]<?php } ?>
												<div class="" >
													<div class="modal" id="activityType-modal">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Type of operation or activity</h4>
														  </div>
														  <div class="modal-body">
															<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'note',
																// Please note: When you enable ajax validation, make sure the corresponding
																// controller action is handling ajax validation correctly.
																// There is a call to performAjaxValidation() commented in generated controller code.
																// See class documentation of CActiveForm for details on this.
																'enableAjaxValidation'=>false,
															)); ?>
															<table width="100%" class="table">
																<tr>
																	<td>
																		<?php
																			echo CHtml::dropDownList('activity_type', '',OperationTypes::model()->getOptions(),array('class'=>'form-control', ));
																		?>
																	</td>
																</tr>
																<tr>
																	<td><input type="submit" value="Save" class="form-control" /></td>
																</tr>
															</table>
															<?php $this->endWidget(); ?>
														  </div>
														  
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
												  </div><!-- /.example-modal -->
												  <div class="" >
													<div class="modal" id="activityTypeManage-modal">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Types of operation or activity</h4>
														  </div>
														  <div class="modal-body">
														  <?php
															$activity_types = @OperationTypes::model()->findAll("status = 1");
															if(!empty($activity_types)){
														?>
															<table class="table">
															<tr>
																<th>#</th>
																<th>Type of Operation</th>
																<th></th>
															</tr>
															<?php foreach($activity_types as $activity_type){ ?>
															<tr>
																<td><?php echo $activity_type->id; ?></td>
																<td><?php echo $activity_type->name; ?></td>
																<td><?php echo CHtml::link('Delete', array('/incidents/view', 'id'=>$model->id, 'activity_type'=>$activity_type->id, 'action'=>'del'), array('confirm'=>'Are you sure?')); ?></td>
															</tr>
															<?php } ?>
															</table>
														<?php
															}
														  ?>
															<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'note',
																// Please note: When you enable ajax validation, make sure the corresponding
																// controller action is handling ajax validation correctly.
																// There is a call to performAjaxValidation() commented in generated controller code.
																// See class documentation of CActiveForm for details on this.
																'enableAjaxValidation'=>false,
															)); ?>
															<table width="100%" class="table">
																<tr>
																	<td>
																		<input type="text" name="new_activity_type" placeholder="Add Type of Operation" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td><input type="submit" value="Save" class="form-control" /></td>
																</tr>
															</table>
															<?php $this->endWidget(); ?>
														  </div>
														  
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
												  </div><!-- /.example-modal -->
											</td>
											<td><!-- <b>Person responsible</b> --></td>
											<td>
												<?php /* echo $model->person_responsible; */ ?> 
												
													<?php /* if($model->person_responsible == ''){ */ ?>
														<?php /* echo CHtml::link('+Add', array('personResponsible', 'id'=>$model->id), array('onClick'=>"return popup(this, 'tactivity')")); */ ?>
													<?php /* }else{ */ ?>
														<?php /* echo CHtml::link('~Edit', array('personResponsible', 'id'=>$model->id), array('onClick'=>"return popup(this, 'tactivity')")); */ ?>
													<?php /* } */ ?>
												
											</td>
										</tr>
										<tr>
											<td></td>
											<td>
												
											</td>
											<td><b>Hazard Source</b> 
											<?php if((Users::model()->checkIfUserIsAdmin())){ ?>[
													
														<?php echo CHtml::link('~Manage', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#hazardSourceManage-modal')); ?>
													
												]<?php } ?></td>
											<td>
												<?php echo @HazardSources::model()->findByPk($model->hazard_source)->name; ?> 
												<?php if(Users::model()->checkIfUserIsAdmin()){ ?>[
													<?php echo CHtml::link('~Edit', array('#'), array('data-toggle'=>'modal', 'data-target'=>'#hazardSource-modal')); ?>
												]<?php } ?>
												
												<div class="" >
													<div class="modal" id="hazardSource-modal">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Hazard Source</h4>
														  </div>
														  <div class="modal-body">
															<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'note',
																// Please note: When you enable ajax validation, make sure the corresponding
																// controller action is handling ajax validation correctly.
																// There is a call to performAjaxValidation() commented in generated controller code.
																// See class documentation of CActiveForm for details on this.
																'enableAjaxValidation'=>false,
															)); ?>
															<table width="100%" class="table">
																<tr>
																	<td>
																		<?php
																			echo CHtml::dropDownList('hazard_source', '',HazardSources::model()->getOptions(),array('class'=>'form-control', ));
																		?>
																	</td>
																</tr>
																<tr>
																	<td><input type="submit" value="Save" class="form-control" /></td>
																</tr>
															</table>
															<?php $this->endWidget(); ?>
														  </div>
														  
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
												  </div><!-- /.example-modal -->
												  <div class="" >
													<div class="modal" id="hazardSourceManage-modal">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Hazard Sources</h4>
														  </div>
														  <div class="modal-body">
														  <?php
															$hazard_sources = @HazardSources::model()->findAll("status = 1");
															if(!empty($hazard_sources)){
														?>
															<table class="table">
															<tr>
																<th>#</th>
																<th>Hazard Source</th>
																<th></th>
															</tr>
															<?php foreach($hazard_sources as $hazard_source){ ?>
															<tr>
																<td><?php echo $hazard_source->id; ?></td>
																<td><?php echo $hazard_source->name; ?></td>
																<td><?php echo CHtml::link('Delete', array('/incidents/view', 'id'=>$model->id, 'hazard_source'=>$hazard_source->id, 'action'=>'del'), array('confirm'=>'Are you sure?')); ?></td>
															</tr>
															<?php } ?>
															</table>
														<?php
															}
														  ?>
															<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'note',
																// Please note: When you enable ajax validation, make sure the corresponding
																// controller action is handling ajax validation correctly.
																// There is a call to performAjaxValidation() commented in generated controller code.
																// See class documentation of CActiveForm for details on this.
																'enableAjaxValidation'=>false,
															)); ?>
															<table width="100%" class="table">
																<tr>
																	<td>
																		<input type="text" name="new_hazard_source" placeholder="Add Hazard Source" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td><input type="submit" value="Save" class="form-control" /></td>
																</tr>
															</table>
															<?php $this->endWidget(); ?>
														  </div>
														  
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
												  </div><!-- /.example-modal -->
											</td>
										</tr>
									</table>
									<hr />
									<b>SMS FORM 124 data</b> <i>(Use bottom right links to add, edit or remove SMS form 124 data)</i>
									<ul>
										<li>Accident &amp; Incident Investigation Data <a href="#" data-toggle="modal" data-target="#form124-data"><i class="fa  fa-external-link"></i></a></li>
										<li>Contributing Factors <a href="#" data-toggle="modal" data-target="#form124-contributing-factors"><i class="fa  fa-external-link"></i></a></li>
										<li>Corrective Actions <a href="#" data-toggle="modal" data-target="#form124-corrective-actions"><i class="fa  fa-external-link"></i></a></li>
										<li>Data Analysis Checklist <a href="#" data-toggle="modal" data-target="#form124-data-analysis-checklist"><i class="fa  fa-external-link"></i></a></li>
										<li>Additional Comments <a href="#" data-toggle="modal" data-target="#form124-additional-comments"><i class="fa  fa-external-link"></i></a></li>
									</ul>
									<div class="" >
										<div class="modal" id="form124-data">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Accident &amp; Incident Investigation Data</h4>
											  </div>
											  <div class="modal-body">
												<?php 
													$investigation_data = @SmsForm124Data::model()->find("incident_id = {$id}");
													if(!empty($investigation_data)){
														echo "<table class='table table-striped'>";
														echo "<tr>";
														echo "<td><b>Type of incident</b></td><td>{$investigation_data->type_of_incident}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Case #</b></td><td>{$investigation_data->case_no}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Employee name</b></td><td>{$investigation_data->employee_name}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Employee #</b></td><td>{$investigation_data->employee_number}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Supervisor</b></td><td>{$investigation_data->supervisor}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Department</b></td><td>{$investigation_data->department}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Location of incident</b></td><td>{$investigation_data->location_of_incident}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Movement area</b></td><td>{$investigation_data->movement_area}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Hospital</b></td><td>{$investigation_data->hospital}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Date of incident</b></td><td>{$investigation_data->date_of_incident}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Time of incident</b></td><td>{$investigation_data->time_of_incident}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Date reported</b></td><td>{$investigation_data->date_reported}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Type of injury</b></td><td>{$investigation_data->type_of_injury}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Body part injured</b></td><td>{$investigation_data->body_part_injured}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Cause of incident</b></td><td>{$investigation_data->cause_of_incident}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Incident site</b></td><td>{$investigation_data->incident_site}</td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td><b>Type of equipment_involved</b></td><td>{$investigation_data->type_of_equipment_involved}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Related act</b></td><td>{$investigation_data->related_act}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Weather conditions</b></td><td>{$investigation_data->weather_conditions}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Incident description</b></td><td>{$investigation_data->incident_description}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Investigation</b></td><td>{$investigation_data->investigation}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Area supervisor</b></td><td>{$investigation_data->area_supervisor}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Analysis date</b></td><td>{$investigation_data->analysis_date}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Completed by</b></td><td>{$investigation_data->completed_by}</td>";
														echo "</tr>";
														echo "</table>";
													}else{
														echo "<p>Accident / Incident investigation data form has not yet been filled out. Click ".CHtml::link('here', array('smsForm124Data/create', 'incident'=>$id))." to fill it out.</p>";
													}
												?>
											  </div>
											  
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									  </div><!-- /.example-modal -->
									  <div class="" >
										<div class="modal" id="form124-contributing-factors">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Contributing Factors</h4>
											  </div>
											  <div class="modal-body">
												<?php
												$factors = @SmsForm124ContributingFactors::model()->findAll("incident_id = '{$id}' and status = 1");
												if(!empty($factors)){
													$k=1;
													echo "<table class='table table-stripped'>";
													foreach($factors as $factor){
														echo "<tr>";
														echo "<td style='' >{$k}</td><td  style=''>".$factor->details." </td><td  style=''>".$factor->modified." </td>";
														echo "</tr>";
														$k++;
													}
													echo "</table>";	
												}else{
													echo "<p>0 records found. Click ".CHtml::link('here', array('smsForm124ContributingFactors/create', 'incident'=>$id))." to add contributing factors.</p>";
												}
												
												?>
											  </div>
											  
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									  </div><!-- /.example-modal -->
									  <div class="" >
										<div class="modal" id="form124-corrective-actions">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Corrective Actions</h4>
											  </div>
											  <div class="modal-body">
												<?php
												$actions = @SmsForm124CorrectiveActions::model()->findAll("incident_id = '{$id}' and status = 1 ORDER BY priority DESC");
												if(!empty($actions)){
													$k=1;
													echo "<table class='table table-stripped'>";
													foreach($actions as $action){
														echo "<tr>";
														echo "<td style='' >{$k}</td><td  style=''>".$action->action." </td><td  style=''>".$action->owner." </td><td  style=''>".$action->completion_date." </td><td  style=''>".$action->priority." </td><td  style=''>".$action->completion_status." </td><td  style=''>".$action->completed_on." </td>";
														echo "</tr>";
														$k++;
													}
													echo "</table>";	
												}else{
													echo "<p>0 records found. Click ".CHtml::link('here', array('smsForm124CorrectiveActions/create', 'incident'=>$id))." to add corrective actions.</p>";
												}
												
												?>
											  </div>
											  
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									  </div><!-- /.example-modal -->
									  <div class="" >
										<div class="modal" id="form124-data-analysis-checklist">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Data Analysis Checklist</h4>
											  </div>
											  <div class="modal-body">
												<?php 
													$check_list = @SmsForm124DataAnalysisChecklist::model()->find("incident_id = {$id}");
													if(!empty($check_list)){
														echo "<table class='table table-striped'>";
														echo "<tr>";
														echo "<td><b>Photographs</b></td><td>{$check_list->photographos}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Diagrams</b></td><td>{$check_list->diagrams}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Supervisor statements</b></td><td>{$check_list->supervisor_statements}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Witness statements</b></td><td>{$check_list->witness_statements}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Employment history</b></td><td>{$check_list->employment_history}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Employee statement</b></td><td>{$check_list->employee_statement}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Walk around checklist 	</b></td><td>{$check_list->walk_around_checklist}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Training records</b></td><td>{$check_list->training_records}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Police reports</b></td><td>{$check_list->police_reports}</td>";
														echo "</tr>";
														echo "<tr>";
														echo "<td><b>Other</b></td><td>{$check_list->other}</td>";
														echo "</tr>";
														echo "</table>";
													}else{
														echo "<p>Checklist form has not yet been filled out. Click ".CHtml::link('here', array('smsForm124DataAnalysisChecklist/create', 'incident'=>$id))." to fill it out.</p>";
													}
												?>
											  </div>
											  
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									  </div><!-- /.example-modal -->
									  <div class="" >
										<div class="modal" id="form124-additional-comments">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Additional Comments</h4>
											  </div>
											  <div class="modal-body">
												<?php
												$items = @SmsForm124Comments::model()->findAll("incident_id = '{$id}' and status = 1");
												if(!empty($items)){
													$k=1;
													echo "<table class='table table-stripped' >";
													foreach($items as $item){
														echo "<tr>";
														echo "<td style='' >{$k}</td><td  style=''>".$item->comment." </td><td  style=''>".$item->modified." </td>";
														echo "</tr>";
														$k++;
													}
													echo "</table>";	
												}else{
													echo "<p>0 records found. Click ".CHtml::link('here', array('smsForm124Comments/create', 'incident'=>$id))." to add additional comments.</p>";
												}
												
												?>
											  </div>
											  
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									  </div><!-- /.example-modal -->
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>