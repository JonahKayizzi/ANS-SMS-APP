<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$incident = @Incidents::model()->findByPk($_GET['incident']);
?>
<table cellpadding="2px" cellspacing="0px"  style="width: 100%;" >
		<tr valign="top"  style="" >
			<td align="right"><i>(All Times Local 12hr Clock)</i></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">Re:  DANS/<?php echo $_GET['incident']; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left" >To:  MD, DMD, D/ANS, CS, DAAS, DATRS, M/ATM, DHRA, D/F, MMSL, CJSO, MPA, MFSS, M/SMS, MCNS</td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; border-bottom: 1px #000 solid;" >
		<tr valign="top"  style="" >
			<td align="center"><h1>SITUATION REPORT (SITREP)</h1></td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%;" >
		<tr valign="top"  style="" >
			<td align="left"><i>1. AVAILABLE INFORMATION:</i></td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%;" >
		<tr valign="top" style="" >
			<td align="left"  ><b>Occurrence</b></td>
			<td align="left" colspan=3 style="border-bottom: 1px #000 dotted;" ><?php echo $incident->occurrence; ?></td>
		</tr>
		<tr valign="top" style="" >
			<td align="left" width="15%"><b>Place/Position</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->place; ?></td>
			<td align="left" width="10%"><b>Date</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->date; ?></td>
		</tr>
		<tr valign="top" style="" >
			<td align="left" ><b>Time</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->time; ?></td>
			
		</tr>
		<tr valign="top" style="" >
			<td align="left" ><b>Aircraft Registration</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->aircraft_registration; ?></td>
			
		</tr>
		<tr valign="top" style="" >
			<td align="left" ><b>Operator</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->operator; ?></td>
			
		</tr>
		<tr valign="top" style="" >
			<td align="left" ><b>Departure Point</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->departure_point; ?></td>
			
		</tr>
		<tr valign="top" style="" >
			<td align="left" ><b>Persons on Board</b></td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->persons_on_board; ?></td>
			
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; margin-top: 10px;" >
		<tr valign="top"  style="" >
			<td align="left"><i>2. BRIEF NOTES:</i></td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%;" >
		<tr valign="top" style="" >
			<td align="left" style="" ><?php echo $incident->brief_notes; ?></td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; margin-top: 10px;" >
		<tr valign="top"  style="" >
			<td align="left"><i>3. ACTIONS:</i></td>
		</tr>
	</table>
	
	<?php
		$actions = @Actions::model()->findAll("status = 1 and incident_id = '{$incident->id}'");
		if(!empty($actions)){
			echo "<table cellpadding='2px' cellspacing='0px'  style='width: 100%;' >
			<tr valign='top' style='' >
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Action</b></td>
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Date of capture</b></td>
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Deadline</b></td>
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Date action taken</b></td>
			</tr>";
			foreach($actions as $action){
				echo "<tr valign='top' style='' >
					<td align='left' style='' >{$action->details}</td>
					<td align='left' style='' >{$action->modified}</td>
					<td align='left' style='' >{$action->deadline}</td>
					<td align='left' style='' >{$action->date_action_taken}</td>
				</tr>";
			}
		}else{
			echo "This incident has no actions attached to it.";
		}
	?>
	
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; margin-top: 10px;" >
		<tr valign="top"  style="" >
			<td align="left">4. REPORTED BY: </td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo $incident->reported_by; ?></td>
			<td align="left">DATE: </td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo date('Y-m-d', strtotime($incident->modified)); ?></td>
			<td align="left">TIME: </td>
			<td align="left" style="border-bottom: 1px #000 dotted;"><?php echo date('H:i', strtotime($incident->modified)); ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left"></td>
			<td align="left"><?php $reported_by_info = @Users::model()->find("username = '{$incident->reported_by}'"); echo @$reported_by_info->position; ?></td>
			<td align="left"></td>
			<td align="left"></td>
			<td align="left"></td>
			<td align="left"></td>
		</tr>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 100%; margin-top: 10px;" >
		<tr valign="top"  style="" >
			<td align="left"><i>5. REMARKS:</i></td>
		</tr>
	</table>
	
	<?php
		$remarks = @Remarks::model()->findAll("status = 1 and incident_id = '{$incident->id}'");
		if(!empty($actions)){
			echo "<table cellpadding='2px' cellspacing='0px'  style='width: 100%;' >
			<tr valign='top' style='' >
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Remark</b></td>
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Made by</b></td>
				<td align='left' style='border-bottom: 1px #000 solid;' ><b>Date</b></td>
			</tr>";
			foreach($remarks as $remark){
				echo "<tr valign='top' style='' >
					<td align='left' style='' >{$remark->details}</td>
					<td align='left' style='' >admin</td>
					<td align='left' style='' >{$remark->modified}</td>
				</tr>";
			}
		}else{
			echo "This incident has no remarks attached to it.";
		}
	?>
	
	