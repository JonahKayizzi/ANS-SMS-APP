<?php
/* @var $this IncidentsController */
/* @var $incident Incidents */
if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=NULL;}
$incident = @Incidents::model()->findByPk($id);
?>


<table style="width: 100%; padding: 7px 0px 7px 0px;" border=0>
	<tr>
		<td>
			<span style="padding: 7px; "><b>
				Incident #<?php echo $incident->id; ?> 
				<?php if($incident->category == 'NONE'){ ?> 
					<?php echo CHtml::link('OSHE', array('index', 'id'=>$incident->id, 'category'=>'OSHE', 'action'=>'set'), array('confirm'=>'Are you sure?', 'style'=>'padding: 1px; background-color: #939d9e; color: #fff; border: 1px #ccc solid; ')); ?> 
					<?php echo CHtml::link('AVIATION', array('index', 'id'=>$incident->id, 'category'=>'AVIATION', 'action'=>'set'), array('confirm'=>'Are you sure?', 'style'=>'padding: 1px; background-color: #62acb6; color: #fff; border: 1px #ccc solid; ')); ?> 
					<?php echo CHtml::link('DISASTER', array('index', 'id'=>$incident->id, 'category'=>'DISASTER', 'action'=>'set'), array('confirm'=>'Are you sure?', 'style'=>'padding: 1px; background-color: #01aac2; color: #fff; border: 1px #ccc solid; ')); ?> 
					
				<?php } ?> 
				
			</b></span>	
		</td>
		<td align="right" >
			<span style="color: #fff; background-color: #<?php echo $incident->status0->color; ?>; padding: 7px; " ><?php echo $incident->status0->name; ?> </span>
		</td>
	</tr>
</table>

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$incident,
	'attributes'=>array(
		'id',
		'occurrence',
		'place',
		'time',
		'aircraft_registration',
		'operator',
		'departure_point',
		'persons_on_board',
		'date',
		'type_of_aircraft',
		'nationality',
		'owner',
		'destination',
		'injuries',
		'reported_by',
		'status',
		'modified',
		'category',
		'brief_notes',
	),
)); */ ?>

<?php 

?>

<table width="100%" border=0>
	<tr valign="top">
		<td width="50%" >
			<table style="border: 1px #ccc solid; padding: 4px; background-color: #effdff; width: 100%;" >
				<tr class="sms_tr">
					<td width="30%" style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;" ><b>ID</b></td>
					<td><?php echo $incident->id; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Occurrence</b></td>
					<td><?php echo $incident->occurrence; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Place</b></td>
					<td><?php echo $incident->place; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Time</b></td>
					<td><?php echo $incident->time; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Aircraft Registration</b></td>
					<td><?php echo $incident->aircraft_registration; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Operator</b></td>
					<td><?php echo $incident->operator; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Departure Point</b></td>
					<td><?php echo $incident->departure_point; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Persons On Board</b></td>
					<td><?php echo $incident->persons_on_board; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Date</b></td>
					<td><?php echo $incident->date; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Type Of Aircraft</b></td>
					<td><?php echo $incident->type_of_aircraft; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Nationality</b></td>
					<td><?php echo $incident->nationality; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Owner</b></td>
					<td><?php echo $incident->owner; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Destination</b></td>
					<td><?php echo $incident->destination; ?></td>
				</tr>
				
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Injuries</b></td>
					<td><?php echo $incident->injuries; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Reported By</b></td>
					<td><?php echo $incident->reported_by; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Status</b></td>
					<td><?php echo $incident->status0->name; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Reported On</b></td>
					<td><?php echo $incident->modified; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Category</b></td>
					<td><?php echo $incident->category; ?></td>
				</tr>
				<tr class="sms_tr">
					<td style="border-right: 1px #ccc solid; background-color: #6faccf; color: #fff;"><b>Brief Notes</b></td>
					<td>
						<?php echo $incident->brief_notes; ?> 
					</td>
				</tr>
			</table>
		</td>
		<td>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #6faccf; width: 100%; margin: 1px; color: #fff;" >
				<tr  >
					<td><b>Recommended Solution 
					</b></td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				<?php 
					$recommended_solutions = @RecommendedSolutions::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($recommended_solutions)){
						foreach($recommended_solutions as $recommended_solution){
				?>
					<tr valign="top"  class="sms_tr" >
						<td style="width: 80%;" ><?php echo $recommended_solution->details; ?></td>
						<!-- <td>admin</td> -->
						<td><?php echo $recommended_solution->modified; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #6faccf; width: 100%; margin: 12px 1px 1px 1px; color: #fff;" >
				<tr  >
					<td><b>Investigator(s) 
					</b></td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				<?php 
					$investigators = @Investigators::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($investigators)){
						foreach($investigators as $investigator){
				?>
					<tr valign="top"  class="sms_tr" >
						<td style="width: 80%;"><?php echo $investigator->name; ?></td>
						<!-- <td>admin</td> -->
						<td><?php echo $investigator->modified; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #6faccf; width: 100%; margin: 12px 1px 1px 1px; color: #fff;" >
				<tr >
					<td><b>Remarks 
					</b></td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				<?php 
					$remarks = @Remarks::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($remarks)){
						foreach($remarks as $remark){
				?>
					<tr valign="top"  class="sms_tr" >
						<td style="width: 80%;"><?php echo $remark->details; ?></td>
						<!-- <td>admin</td> -->
						<td><?php echo $remark->modified; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #6faccf; width: 100%; margin: 12px 1px 1px 1px; color: #fff;" >
				<tr >
					<td><b>Action to be taken </b></td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				
				<?php 
					$actions = @Actions::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($actions)){
				?>
					<tr valign="top"  class="sms_tr" style="background-color: #6faccf; color: #fff;" >
						<td><b>Action</b></td>
						
						<td><b>Date of capture</b></td>
						<td><b>Deadline</b></td>
						<td><b>Date action taken</b></td>
						<td></td>
					</tr>
				<?php
						foreach($actions as $action){
				?>
					<tr valign="top"  class="sms_tr" >
						<td><?php echo $action->details; ?></td>
						<td><?php echo $action->modified; ?></td>
						<td><?php echo $action->deadline; ?></td>
						<td><?php echo $action->date_action_taken; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #6faccf; width: 100%; margin: 12px 1px 1px 1px; color: #fff;" >
				<tr >
					<td><b>Feedback on action taken </b></td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				<?php 
					$feedbacks = @Feedback::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($feedbacks)){
						foreach($feedbacks as $feedback){
				?>
					<tr valign="top"  class="sms_tr" >
						<td style="width: 80%;"><?php echo $feedback->details; ?></td>
						<!-- <td>admin</td> -->
						<td><?php echo $feedback->modified; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
			<table style="border: 1px #ccc solid; padding: 1px; background-color: orange; width: 100%; margin: 12px 1px 1px 1px; color: #fff;" >
				<tr >
					<td>
						<b>
							Verified by 
						</b>
					</td>
				</tr>
			</table>
			<table style="border: 1px #ccc solid; padding: 1px; background-color: #effdff; margin: 1px; width: 100%;" >
				<?php 
					$verifications = @Verifications::model()->findAll("incident_id = '{$incident->id}' and status = 1");
					
					if(!empty($verifications)){
						foreach($verifications as $verification){
				?>
					<tr valign="top"  class="sms_tr" >
						<td><?php echo $verification->verified_by; ?></td>
						<td><?php echo $verification->note; ?></td>
						<td><?php echo $verification->modified; ?></td>
						<td></td>
					</tr>
				<?php 
						}
					}
				?>
			</table>
			
		</td>
	</tr>
</table>
