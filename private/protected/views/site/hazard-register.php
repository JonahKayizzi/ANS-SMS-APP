<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;margin:auto">
<table class="table" >
	<tr>
		<td align="right"><b>SMS FORM 125</b></td>
	</tr>
	<tr>
		<td align="left"><b>HAZARD REGISTER</b></td>
	</tr>
</table>
<table class="table" >
		<!-- <tr valign="top" style="" >
			<td colspan="7" align="center" ><h1>CIVIL AVIATION AUTHORITY</h1></td>
		</tr>
		<tr valign="top" style="" >
			<td colspan="7" align="center" ><h3>DIRECTORATE OF AIR NAVIGATION SERVICES</h3></td>
		</tr>
		<tr valign="top" style="" >
			<td colspan="7" align="center" ><h3>SAFETY MANAGEMENT SYSTEMS AND QUALITY ASSURANCE</h3></td>
		</tr>
		<tr valign="top" style="" >
			<td colspan="7" align="center" ><h1>HAZARD REGISTER - SMS FORM 125</h1></td>
		</tr> -->
		<tr valign="top"  style="background-color: #eee;" >
			<td><b>HAZARD ID</b></td>
			<td><b>TYPE OF OPERATION OR ACTIVITY</b></td>
			<td><b>DESCRIPTION OF HAZARD</b></td>
			<td><b>DESCRIPTION OF CONSEQUENCES</b></td>
			<td><b>CURRENT/EXISTING DEFENCES TO CONTROL SAFETY RISKS</b></td>
			<td><b>FURTHER ACTIONS TO REDUCE THE RISKS EG.TECHNICAL,ADMINSTRATIVE, DEFENCES, TRAINING ETC</b></td>
			<td><b>PERSON RESPONSIBLE</b></td>
		</tr>
		<?php
			$tr = "";
			$hazards = @Incidents::model()->findAll("main_category = 'Hazard' and status != 5");
			$today = date('Y-m-d');
			
			foreach($hazards as $hazard){
				
				$reported_on = $hazard->date;
				if((abs((strtotime($today) - strtotime($reported_on))/(60*60*24)) >= 365)){
					echo "<tr valign='top' >";
					echo "<td>".CHtml::link($hazard->number, array('incidents/view', 'id'=>$hazard->id))."</td>";
					echo "<td>{$hazard->type_of_operation}</td>";
					echo "<td>{$hazard->occurrence}</td>";
					echo "<td>";
					$consequence1s = @Consequences::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
					if(!empty($consequence1s)){
						echo "<ol>";
						foreach($consequence1s as $consequence1){
							echo "<li>{$consequence1->description}</li>";
						}
						echo "</ol>";
					}
					
					$consequences = @IncidentsConsequences::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
					if(!empty($consequences)){
						echo "<ol>";
						foreach($consequences as $consequence){
							echo "<li>".@$consequence->consequence->name."</li>";
						}
						echo "</ol>";
					}
					echo "</td>";
					echo "<td>";
					$defenses = @ExistingDefenses::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
					if(!empty($defenses)){
						echo "<ul>";
						foreach($defenses as $defense){
							echo "<li>{$defense->details}</li>";
						}
						echo "</ul>";
					}
					echo "</td>";
					echo "<td>";
					$actions = @FurtherActions::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
					if(!empty($actions)){
						echo "<ul>";
						foreach($actions as $action){
							echo "<li>{$action->details}</li>";
						}
						echo "</ul>";
					}
					echo "</td>";
					echo "<td>{$hazard->person_responsible}</td>";
					echo "</tr>";	
				}
				
				
			}
			
		?>
	</table>

</div>