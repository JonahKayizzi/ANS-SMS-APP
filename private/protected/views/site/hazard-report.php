<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$incident = @Incidents::model()->findByPk($_GET['incident']);
?>
<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border: 0px #000 solid;" >
		<tr valign="top"  style="" >
			<td align="right">SMS FORM 120</td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border: 0px #000 solid;" >
		<tr valign="top"  style="" >
			<td align="left">HAZARD IDENTIFICATION REPORT</td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border: 1px #000 solid;" >
		<tr valign="top"  >
			<td align="left" style="border: 1px #000 solid;"><b>Name(optional)</b>: <?php echo $incident->reported_by_name; ?></td>
			<td align="left" style="border: 1px #000 solid;"><b>Department/Section</b>: <?php echo $incident->reported_by_department; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left" style="border: 1px #000 solid;"><b>Telephone</b>: <?php echo $incident->reported_by_tel; ?></td>
			<td align="left" style="border: 1px #000 solid;"><b>e-mail(optional)</b>: <?php echo $incident->reported_by_email; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				The above information is confidential. This portion will be removed from the form and returned to you as a receipt. No record of your identity will be kept. You may be contacted for additional information prior to submitting the information into the SMS process.
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Description of the issue or hazard:</b><br /><?php echo $incident->occurrence; ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Date and place observed:</b><br /><?php echo $incident->date; ?>, <?php echo $incident->place; ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>How do you recommend fixing the problem?</b><br /><?php echo $incident->brief_notes; ?>
			</td>
		</tr>
		<tr valign="top"  style="background-color: #ccc;" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>To be completed by the Safety Manager:</b><br />
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Hazard Tracking Number assigned:</b> <?php echo $incident->number; ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Investigator assigned:</b> 
				<?php
					$investigators = @Investigators::model()->findAll("status = 1 and incident_id ='{$incident->id}'");
					if(!empty($investigators)){
						echo "<table width='100%'>";
						foreach($investigators as $investigator){
							echo "<tr>";
							echo "<td>{$investigator->name}</td><td>{$investigator->modified}</td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "No investigators assigned.";
					}
				?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Action taken by Internal Evaluation Department:</b> 
				<?php
					$actions = @Actions::model()->findAll("status = 1 and incident_id ='{$incident->id}'");
					if(!empty($actions)){
						echo "<table width='100%'>";
						echo "<tr>";
						echo "<td><b>Details</b></td><td><b>Deadline</b></td><td><b>Date Action Taken</b></td><td><b>Accepted</b></td><td><b>Comment</b></td><td><b>Date</b></td>";
						echo "</tr>";
						foreach($actions as $action){
							echo "<tr>";
							echo "<td style='border-bottom: 1px #ccc solid;'>{$action->details}</td><td style='border-bottom: 1px #ccc solid;'>{$action->deadline}</td><td style='border-bottom: 1px #ccc solid;'>{$action->date_action_taken}</td><td style='border-bottom: 1px #ccc solid;'>{$action->accepted}</td><td style='border-bottom: 1px #ccc solid;'>{$action->comment}</td><td style='border-bottom: 1px #ccc solid;'>{$action->modified}</td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "No actions recorded.";
					}
				?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td colspan=2 style="border: 1px #000 solid;">
				<b>Further actions required:</b> 
				<?php
					$actions = @FurtherActions::model()->findAll("status = 1 and incident_id ='{$incident->id}'");
					if(!empty($actions)){
						echo "<table width='100%'>";
						echo "<tr>";
						echo "<td><b>Details</b></td><td><b>Accepted</b></td><td><b>Comment</b></td><td><b>Date</b></td>";
						echo "</tr>";
						foreach($actions as $action){
							echo "<tr  >";
							echo "<td style='border-bottom: 1px #ccc solid;'>{$action->details}</td><td style='border-bottom: 1px #ccc solid;'>{$action->accepted}</td><td style='border-bottom: 1px #ccc solid;'>{$action->comment}</td><td style='border-bottom: 1px #ccc solid;'>{$action->modified}</td>";
							echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "No further actions recorded.";
					}
				?>
			</td>
		</tr>
	</table>