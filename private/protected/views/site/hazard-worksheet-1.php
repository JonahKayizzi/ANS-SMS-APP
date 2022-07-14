<head>

	<style>
       
	</style>
</head>
<body>

<center>
<?php
if($search_worksheet == 0){
?>
<h4>Select Worksheet Duration</h4>
<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'name',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table">
					<tr>
						<td>From: </td>
						<td>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'start_date',
							'value'=>$start_date,     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'class'=>'form-control'
							),
						));
						?> 
						</td>
						<td>To: </td>
						<td>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'end_date',
							'value'=>$end_date,     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'class'=>'form-control'
							),
						));
						?> 
						</td>
						<td>Option: </td>
						<td>
						<select name="display_option">
							<option value="PRINT">Print Friendly</option>
							<option value="LINK">Back Linked</option>
						</select>
						</td>
						<td>
							<input type="hidden" name="search_worksheet" value="1" />
						</td>
						<td>
						<input type="submit" value="Search " class="btn btn-primary" /> 
						</td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
	
<?php } ?>
</center>
<?php if($search_worksheet == 1){ ?>
<div class="docs-main">

<?php
$hazards = @Incidents::model()->findAll("main_category = 'Hazard' and date between '{$start_date}' and '{$end_date}'");
?>

		<table class="tablesaw worksheet" data-tablesaw-mode="columntoggle">
			<thead>
				<tr>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">HAZARD ID</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">TYPE OF OPERATION</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">HAZARD DESCRIPTION</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">HAZARD SOURCE</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="23">PRELIMINARY ACTION(S) TAKEN</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">CAUSES</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">SYSTEM STATE</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">EXISTING CONTROL(S)</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">EVIDENCE OF EXISTING CONTROL(S)</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">CONSEQUENCES</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">SAFETY REQUIREMENTS/MITIGATIONS</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="14">MITIGATION IMPLEMENTATION</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="17">ASSOCIATED RISKS</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="18">PERFORMANCE TARGETS</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="19">MONITORING ACTIVITES</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="22">REMARKS </th>
				</tr>
			</thead>
			<tbody>
			<?php
			$c = 0;
			foreach($hazards as $hazard){
				$c++;
			?>


				<tr style="<?php if($c%2 == 0){echo "background-color: #eee;";} ?>">
					<td class="title">
					<?php if($display_option == "PRINT"){ ?>
						<?php echo @$hazard->number; ?> 
					<?php }else{ ?>
						<?php echo CHtml::link(@$hazard->number, array('/incidents/view', 'id'=>$hazard->id)); ?> 
					<?php } ?>
					</td>
					<td><?php echo @$hazard->type_of_operation; ?></td>
					<td><?php echo @$hazard->brief_notes; ?></td>
					<td><?php echo @HazardSources::model()->findByPk($hazard->hazard_source)->name; ?></td>
					<td>
					<?php 
										
											$actions_taken = @ActionsTaken::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($actions_taken)){
												echo "<ol>";
												foreach($actions_taken as $action_taken){
										?>
												<LI><?php echo $action_taken->description; ?></LI>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<?php 
											$causes = @IncidentsCauses::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($causes)){
												echo "<ol>";
												foreach($causes as $cause){
										?>
												<li><?php echo @$cause->cause->name; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<?php 
											$states = @SystemStates::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($states)){
												echo "<ol>";
												foreach($states as $state){
										?>
												<li><?php echo $state->details; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<?php 
											$defences = @ExistingDefenses::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($defences)){
												echo "<ol>";
												foreach($defences as $defence){
										?>
												<li><?php echo $defence->details; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<?php 
											$evidences = @Evidences::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($evidences)){
												echo "<ol>";
												foreach($evidences as $evidence){
										?>
												<li><?php echo $evidence->details; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<?php 
											$consequences = @Consequences::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($consequences)){
												echo "<ol>";
												foreach($consequences as $consequence){
										?>
												<li><?php echo $consequence->description; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
										
										<?php 
											$consequences2 = @IncidentsConsequences::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($consequences2)){
												echo "<ol>";
												foreach($consequences2 as $consequence2){
										?>
												<li><?php echo @$consequence2->consequence->name; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					
					<td>
					<table class="worksheet-sub">
						<?php 
											$requirements = @SafetyRequirements::model()->findAll("incident_id = '{$hazard->id}'");
											
											if(!empty($requirements)){
										?>
											<tr  >
												<td>Mitigation</td>
												<td>Priority</td>
												<td>Deadline</td>
												<td>Officer</td>
											</tr>
										<?php
												foreach($requirements as $requirement){
										?>
											<tr  >
												<td><?php echo $requirement->mitigation; ?></td>
												<td><?php echo @$requirement->priority; ?></td>
												<td><?php echo $requirement->time_frame; ?></td>
												<td><?php echo @$requirement->incident->officer->name; ?></td>
											</tr>
										<?php 
												}
											}
										?>
					</table>
					</td>
					<td>
					<table class="worksheet-sub">
				
										<?php 
											$actions = @Actions::model()->findAll("incident_id = '{$hazard->id}' and status = 1 and accepted = 'YES'");
											
											if(!empty($actions)){
										?>
											<tr valign="top"  class="" style="" >
												<td>Action</td>
												
												<td>Date of implementation  </td>
												<td>Accepted</td>
												<td>Comment</td>
											</tr>
										<?php
												foreach($actions as $action){
										?>
											<tr valign="top"  class="" >
												<td><?php echo $action->details; ?></td>
												
												<td><?php echo $action->date_action_taken; ?></td>
												<td><?php echo $action->accepted; ?></td>
												<td><?php echo $action->comment; ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
					</td>
					<td>
					<table class="worksheet-sub">
										<?php 
											
											$effects = @Effects::model()->findAll("hazard_id = '{$hazard->id}'");
											
											if(!empty($effects)){
										?>
											<tr valign="middle"  class=""  >
												<td style="">Effects</td>
												<td style="">Severity</td>
												<td style="">Severity rationale</td>
												<td style="">Likelihood</td>
												<td style="">Likelihood rationale</td>
												<td style="">Initial Risk</td>
												<td style="">Predicted Residual Risk</td>
											</tr>
										<?php
												foreach($effects as $effect){
										?>
											<tr valign=""  class="" >
												<td >
													<?php echo @$effect->consequence_relation->description; ?>
												</td>
														<td><?php echo @$effect->severity->value; ?></td>
														<td>
															
															<?php
																$esRationales = @EffectsSeverityRationales::model()->findAll("status = 1 and effects_id = '{$effect->id}'");
																if(!empty($esRationales)){
																	echo "<ol>";
																	foreach($esRationales as $esRationale){
																		echo '<li>'.@$esRationale->severityRationale->name.'</li>';
																	}
																	echo "</ol>";
																}
																
															?>
														</td>
														<td><?php echo $effect->likelihood_id; ?></td>
														<td><?php echo @$effect->likelihood->rationale; ?></td>
														<td><?php echo $effect->initial_risk_index; ?></td>
														<td><?php echo $effect->predicted_residual_risk_index; ?></td>
													
											</tr>
										<?php 
												}
											}
										?>
									</table>
					</td>
					<td>
					
						<?php 
											$targets = @PerformanceTargets::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($targets)){
												echo "<ol>";
												foreach($targets as $target){
										?>
												<li><?php echo $target->details; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
					<td>
					<table class="worksheet-sub">
										<?php 
											$mactivities = @MonitoringActivities::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($mactivities)){
										?>
											<tr valign="top"  class="" style="" >
												<td>Monitoring activity</td>
												<td>Frequency</td>
												<td>Duration</td>
												<td>Substitute risk</td>
											</tr>
										<?php
												foreach($mactivities as $mactivity){
										?>
											<tr valign="top"  class="" >
												<td><?php echo $mactivity->monitoring_activity; ?></td>
												<td><?php echo $mactivity->frequency; ?></td>
												<td><?php echo $mactivity->duration; ?></td>
												<td><?php echo $mactivity->substitute_risk; ?></td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
					</td>
					<td>
					<?php 
											$remarks = @Remarks::model()->findAll("incident_id = '{$hazard->id}' and status = 1");
											
											if(!empty($remarks)){
												echo "<ol>";
												foreach($remarks as $remark){
										?>
												<li><?php echo $remark->details; ?></li>
										<?php 
												}
												echo "</ol>";
											}
										?>
					</td>
				</tr>
<?php			
			}
			?>				
			</tbody>
		</table>

	</div>
<?php } ?>
</body>