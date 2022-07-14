<style>
			.workshop_cls td{border: 1px #000 solid; padding: 2px;}
		</style>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;margin:auto">
		<table class="table">
			<tr>
				<td align="right"><b>SMS FORM 115</b></td>
			</tr>
			<tr>
				<td align="center"><b>DIRECTORATE OF AIR NAVIGATION SERVICES<br />CHANGE MANAGEMENT FORM</b></td>
			</tr>
		</table>
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Originator (Name & Title)</td>
				<td align="center">System/Equipment Concerned</td>
				<td align="center">Date Raised</td>
				<td align="center">Reference No.</td>
			</tr>
			<tr>
				<td align="center"><?php echo $model->originator_name; ?><br /><?php echo $model->originator_title; ?></td>
				<td align="center"><?php echo $model->system_equipment_concerned; ?></td>
				<td align="center"><?php echo $model->date_raised; ?></td>
				<td align="center"><?php echo $model->reference_no; ?></td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Change Description</td>
			</tr>
			<tr>
				<td align="center"><?php echo $model->change_description; ?></td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Change Justification (Attach relevant documents if available)</td>
			</tr>
			<tr>
				<td align="center"><?php echo $model->change_justification; ?></td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Back out Plan (What happens if change cannot be made)</td>
			</tr>
			<tr>
				<td align="center"><?php echo $model->back_out_plan; ?></td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Areas affected by the change</td>
			</tr>
			<tr>
				<td align="center">
				<P><?php echo $model->areas_affected; ?></P>
					<?php
					$items = @CmAffectedAreas::model()->findAll("change_management_id = {$model->id} and status = 1");
					if(!empty($items)){
						$k = 1;
					?>
						<table width="100%" class="">
							<tr>
								<td><b>No.</b></td><td><b>Area Affected</b></td><td><b>Recorded On</b></td><td><b>Recorded By</b></td>
							</tr>
							<?php
								foreach($items as $item){
							?>
								<tr>
									<td><?php echo $k; ?></td><td><?php echo $item->details; ?></td><td><?php echo $item->modified; ?></td><td><?php echo $item->reported_by; ?></td>
								</tr>
							<?php
								}
							?>
						</table>
					<?php	
					}
					?>
				</td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="background-color: #eee;">
				<td align="center">Costs (if any)</td>
				<td align="center">Time (how long to implement change)</td>
				<td align="center">Proposed Implementer</td>
			</tr>
			<tr>
				<td align="center">
				<?php
				$items = @CmCosts::model()->findAll("change_management_id = {$model->id} and staus = 1");
				if(!empty($items)){
					$k = 1;
				?>
					<table width="100%" class="td_cls">
						<tr>
							<td><b>No.</b></td><td><b>Item</b></td><td><b>Cost</b></td><td><b>Unit</b></td>
						</tr>
						<?php
							foreach($items as $item){
						?>
							<tr>
								<td><?php echo $k; ?></td><td><?php echo $item->item; ?></td><td><?php echo $item->cost; ?></td><td><?php echo $item->unit; ?></td>
							</tr>
						<?php
							}
						?>
					</table>
				<?php	
				}
				?>
				</td>
				<td align="center"><?php echo $model->time; ?></td>
				<td align="center"><?php echo $model->proposed_implementer; ?></td>
			</tr>
		</table>
		
		<table class="table">
			<tr style="">
				<td align="center"><b>Recommendation and Approval</b></td>
			</tr>
		</table>
		<table class="table">
			<tr style="">
				<td align="center">Recommended by:</td>
				<td align="center">Approved/Authorized by:</td>
			</tr>
			<tr style="">
				<td align="center"><?php echo $model->recommended_by; ?><br /><?php echo $model->recommendation_date; ?></td>
				<td align="center"><?php echo $model->approved_by; ?><br /><?php echo $model->approval_date; ?></td>
			</tr>
		</table>
		</div>
