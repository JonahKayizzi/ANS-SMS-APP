<head>

	<style>
        .col-md-21 *{
		margin:5px;
		}
		.col-md-2, .col-md-21{
			    width: 153px;
  
				min-height:55px;
    border: 1px solid #C1BFBF;
	border-right: 1px solid #C1BFBF;

    float: left;
    
		}
		
		body{
			width:3412px;
		} 
		
		.row{
                       display:flex;
			border: 1px solid #C1BFBF;
border-bottom:none;
		
		}
		.col-md-2{
			 background-color: #eee;
		}
	</style>
</head>
<body>
<?php
if(isset($_GET['fields'])){
$hazard = $_GET['hazard'];
$top = $hazard['top'];
$hd  = $hazard['hd'];
$cauzes = $hazard['causes'];
$ss = $hazard['ss'];
$ec = $hazard['ec'];
$eec = $hazard['eec'];
$efects = $hazard['efects'];
$sev = $hazard['sev'];
$sev_r = $hazard['sev_r'];
$lh = $hazard['lh'];
$lhr = $hazard['lhr'];
$ir = $hazard['ir'];
$sr = $hazard['sr'];
$or = $hazard['or'];
$tf = $hazard['tf'];
$prr = $hazard['prr'];
$pt = $hazard['pt'];
$ma = $hazard['ma'];
$fq = $hazard['fq'];
$sr = $hazard['sr'];
$rmk = $hazard['remarks'];
$src = $hazard['src'];


$date_from = $hazard['date_from'];
$date_to = $hazard['date_to'];	




 ?>

<?php 
if(isset($_GET['id'])){

$hazards = @Incidents::model()->findAll("id =".$_GET['id']);
}
else{
$hazards = @Incidents::model()->findAll("main_category = 'Hazard' and date between '".$date_from."' and '".$date_to."' and status != 1");
}
if(empty($hazards)){
echo "<div><h4>Hazards not found between {$date_from}  and ${date_to}!</h4></div>";
}
else{ ?>
	<div class="row"> 
			<div class="col-md-2"><b>HAZARD ID</b></div>
			<?php if(!empty($top)){?><div class="col-md-2"><b>TYPE OF OPERATION </b></div> <?php } ?>
			<?php if(!empty($hd)){?><div class="col-md-2"><b>HAZARD DESCRIPTION</b></div> <?php } ?>
			<?php if(!empty($src)){?><div class="col-md-2"><b>HAZARD SOURCE</b></div> <?php } ?>
			<?php if(!empty($cauzes)){?><div class="col-md-2"><b>CAUSES</b></div> <?php } ?>
			<?php if(!empty($ss)){?><div class="col-md-2"><b>SYSTEM STATE</b></div> <?php } ?>
			<?php if(!empty($ec)){?><div class="col-md-2"><b>EXISTING CONTROL(S)</b></div> <?php } ?>
			<?php if(!empty($eec)){?><div class="col-md-2"><b>EVIDENCE OF EXISTING CONTROL(S)</b></div> <?php } ?>
			<?php if(!empty($efects)){?><div class="col-md-2"><b>CONSEQUENCES</b></div> <?php } ?>
			<?php if(!empty($sev)){?><div class="col-md-2"><b>SEVERITY</b></div> <?php } ?>
			<?php if(!empty($sev_r)){?><div class="col-md-2"><b>SEVERITY RATIONALE</b></div> <?php } ?>
			<?php if(!empty($lh)){?><div class="col-md-2"><b>LIKELYHOOD</b></div> <?php } ?>
			<?php if(!empty($lhr)){?><div class="col-md-2"><b>LIKELIHOOD RATIONALE</b></div> <?php } ?>
			<?php if(!empty($ir)){?><div class="col-md-2"><b>INITIAL RISK</b></div> <?php } ?>
			<?php if(!empty($sr)){?><div class="col-md-2"><b>SAFETY REQUIREMENTS/</br>MITIGATIONS</b></div> <?php } ?>
			<?php if(!empty($or)){?><div class="col-md-2"><b>OFFICE RESPONSIBLE</b></div> <?php } ?>
			<?php if(!empty($tf)){?><div class="col-md-2"><b>TIME FRAME</b></div> <?php } ?>
			<?php if(!empty($prr)){?><div class="col-md-2"><b>PREDICTED RESIDUAL RISK</b></div> <?php } ?>
			<?php if(!empty($pt)){?><div class="col-md-2"><b>PERFORMANCE TARGETS</b></div> <?php } ?>
			<?php if(!empty($ma)){?><div class="col-md-2"><b>MONITORING ACTIVITES</b></div> <?php } ?>
			<?php if(!empty($fq)){?><div class="col-md-2"><b>FREQUENCY</b></div> <?php } ?>
			<?php if(!empty($sr)){?><div class="col-md-2"><b>SUBSTITUTE RISK</b></div> <?php } ?>
			<?php if(!empty($rmk)){?><div class="col-md-2"><b>REMARKS AS AT <?php echo date("Y-m-d",time()); ?></b></div> <?php } ?>
<div style="clear:both"></div>
	</div>

	<?php		foreach($hazards as $hazard){  
$investigators = @Investigators::model()->with('user_relation')->findAll("incident_id = '{$hazard->id}' and t.status = 1");
		?>	
<div class="row"> 
	<div class="col-md-21"><p><?php echo $hazard->number  ; ?> </p></div>
	<?php if(!empty($top)){ ?> <div class="col-md-21"><p><?php echo $hazard->type_of_operation; ?></p></div> <?php } ?>

	<?php if(!empty($hd)){ ?> <div class="col-md-21"><p><?php echo $hazard->occurrence ?> </p></div> <?php } ?>
	<?php if(!empty($src)){ ?> <div class="col-md-21"><p><?php echo $hazard->brief_notes ?> </p></div> <?php } ?>
	<?php if(!empty($cauzes)){ ?> <div class="col-md-21"> <?php 
		$causes = @Causes::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
				if(!empty($causes)){
					echo "<ol>";
					foreach($causes as $cause){
						echo "<li>{$cause->details}</li>";
					}
					echo "</ol>";
				}
	?></div> <?php } ?>
	<?php if(!empty($ss)){ ?> <div class="col-md-21"> 
		<?php 
			$states = @SystemStates::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
				if(!empty($states)){
					echo "<ol>";
					foreach($states as $state){
						echo "<li>{$state->details}</li>";
					}
					echo "</ol>";
				}
		?>
	</div> <?php } ?>
	<?php if(!empty($ec)){ ?> <div class="col-md-21"> 
		<?php 
			$defenses = @ExistingDefenses::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
				if(!empty($defenses)){
					echo "<ol>";
					foreach($defenses as $defense){
						echo "<li>{$defense->details}</li>";
					}
					echo "</ol>";
				}
		?>
	</div><?php } ?>
	<?php if(!empty($eec)){ ?> <div class="col-md-21"> 
		<?php 
			$evidences = @Evidences::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
				if(!empty($evidences)){
					echo "<ol>";
					foreach($evidences as $evidence){
						echo "<li>{$evidence->details}</li>";
					}
					echo "</ol>";
				}
		?>
	</div><?php }  ?>
	<?php $effects = @Effects::model()->with('effectRiskManagements')->findAll("hazard_id ='{$hazard->id}'");
				if(!empty($effects)){
				$effectz = '';
				$severity = '';
				$severity_ra = '';
				$likelihood = '';
				$initial = '';
				$likelihood_ra = '';

				
					foreach($effects as $effect){
					
						$effectz .= "<tr><td>{$effect->name}</td></tr>";
					
					
					foreach($effect->effectRiskManagements as $effectRM ){

						$severity .= "<tr><td>{$effectRM->severity}</td></tr>";
						$severity_ra .= "<tr><td>{$effectRM->severity_rationale}</td></tr>";
						$likelihood .= "<tr><td>{$effectRM->likelihood}</td></tr>";
						$likelihood_ra .= "<tr><td>{$effectRM->likelihood_rationale}</td></tr>";
						$initial .= "<tr><td>{$effectRM->likelihood} {$effectRM->severity}</td></tr>";
					}
					
					}
					
				}else{}
				
			?>

	<?php if(!empty($efects)){ ?> <div class="col-md-21"> 
		<?php if(isset($effectz)){?>
			<table>
				<?php echo $effectz; ?>
			</table>
		<?php } ?>	
	</div> <?php } ?>
	<?php if(!empty($sev)){ ?> <div class="col-md-21"> 
		<?php if(isset($severity)){?>
			<table>
				<?php echo $severity; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php if(!empty($sev_r)){ ?> <div class="col-md-21"> 
	<?php if(isset($severity_ra)){?>
			<table>
				<?php echo $severity_ra; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php if(!empty($lh)){ ?> <div class="col-md-21">
	<?php if(isset($likelihood)){?>
			<table>
				<?php echo $likelihood; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php if(!empty($lhr)){ ?> <div class="col-md-21">
		<?php if(isset($likelihood_ra)){?>
			<table>
				<?php echo $likelihood_ra; ?>
			</table>
		<?php } ?>
	</div> <?php } ?>
	<?php if(!empty($ir)){ ?> <div class="col-md-21">
	 <?php if(isset($initial)){?>
			<table>
				<?php echo $initial; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php
		
		$safetyRequirements= @SafetyRequirements::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
		$mitigation = '';
		$timeframe = '';
		if(!empty($safetyRequirements)){	
			foreach($safetyRequirements as $requirement){
			$timeframe .= "<tr><td>{$requirement->time_frame}</td></tr>";
			$mitigation .= "<tr><td>{$requirement->mitigation}</td></tr>";
	?>
		
	<?php }} ?>
	<?php if(!empty($sr)){ ?> <div class="col-md-21">
	 <?php if(isset($mitigation)){?>
			<table>
				<?php echo $mitigation; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	
	<?php if(!empty($or)){ ?> <div class="col-md-21"><?php //echo "15";person_responsible ?><?php 
if(!empty($investigators)){
						foreach($investigators as $investigator){
							echo @$investigator->user_relation->name."<br/>";
				}
			}?>

</div> <?php } ?>
	<?php if(!empty($tf)){ ?> <div class="col-md-21"><?php //echo "16"; ?>
	<?php if(isset($timeframe)){?>
			<table>
				<?php echo $timeframe; ?>
			</table>
		<?php } ?>
	</div> <?php } ?>

	<?php if(!empty($prr)){ ?> <div class="col-md-21"><?php //echo "17"; ?></div> <?php } ?>
	<?php if(!empty($pt)){ ?> <div class="col-md-21"><?php //echo "18"; ?>
		<?php 
			$targets = @PerformanceTargets::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
				if(!empty($targets)){
					echo "<ol>";
					foreach($targets as $target){
						echo "<li>{$target->details}</li>";
					}
					echo "</ol>";
				}
		?>
	</div><?php } ?>
	<?php
		
		$monitorings = @MonitoringActivities::model()->findAll("status = 1 and incident_id ='{$hazard->id}'");
		$monitoringA = '';
		$frequency = '';
		$substituteRisk = '';
		$timeframe = '';
		if(!empty($monitorings)){	
			foreach($monitorings as $monitor){
			$monitoringA .= "<tr><td>{$monitor->monitoring_activity}</td></tr>";
			$frequency .= "<tr><td>{$monitor->frequency}</td></tr>";
			$substituteRisk .= "<tr><td>{$monitor->substitute_risk}</td></tr>";
		}}	
	?>
	
	<?php if(!empty($ma)){ ?> <div class="col-md-21"><?php //echo "19"; ?>
	 <?php if(isset($monitoringA)){?>
			<table>
				<?php echo $monitoringA; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php if(!empty($fq)){ ?> <div class="col-md-21"> <?php //echo "20"; ?>
	 <?php if(isset($frequency)){?>
			<table>
				<?php echo $frequency; ?>
			</table>
		<?php } ?>
	</div> <?php } ?>
	<?php if(!empty($sr)){ ?> <div class="col-md-21"><?php //echo "21"; ?>
	 <?php if(isset($substituteRisk)){?>
			<table>
				<?php echo $substituteRisk; ?>
			</table>
		<?php } ?>
	</div><?php } ?>
	<?php if(!empty($rmk)){ ?> <div class="col-md-21"><?php //echo "22"; ?>
	<?php $remarks = @Remarks::model()->findAll("status = 1 and incident_id ='{$hazard->id}'"); ?>
	 <?php if(!empty($remarks)){?>
			<?php 
			echo "<ol>";
					foreach($remarks as $remark){
						echo "<li>{$remark->details}</li>";
					}
			echo "</ol>";
			?>
		<?php } ?>
	</div><?php } ?>
	
	<div style="clear:both"></div>
</div> 
<?php } ?>

<?php  } } else {?>

<style>
body{ 
	width:auto !important;
}
</style>

<?php $this->beginWidget('CActiveForm', array(
	'id'=>'hazard-form',
        'method' => 'get',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


<center>
<?php

?>
<h4>Select Worksheet Duration</h4>
<div style="width:300px; display:inline-block; ">
<label>From:</label>
<?php
$new_timestamp = strtotime('-2 months', strtotime(date('Y-m-d')));
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'hazard[date_from]',
							'value'=> date("Y-m-d",$new_timestamp),     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>'width: 100%; border: 1px #ccc solid;'
							),
						));
						?>
</div>

<div style="width:300px; display:inline-block; margin-left:20px; ">
<label>To:</label>
<?php 

						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'hazard[date_to]',
							'value'=>date('Y-m-d'),     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>'width: 100%; border: 1px #ccc solid;'
							),
						));
						?>
						
</div>	
<?php

?>	
		
<h4> Select Fields for the Hazard Worksheet</h4>
<table >
<tr>
    <td>
         <input type="checkbox" name="hazard[hd]" checked  /> Hazard Description
    </td>
     <td>
         <input type="checkbox" name="hazard[src]" checked  /> Hazard Source
    </td>
    <td>
         <input type="checkbox" name="hazard[causes]" checked  /> Causes
    </td>
    <td>
         <input type="checkbox" name="hazard[ss]" checked  /> System state
    </td>
    <td>
         <input type="checkbox" name="hazard[ec]" checked  /> Existing Controls
    </td>
</tr>
<tr>
    <td>
         <input type="checkbox" name="hazard[eec]" checked  /> Evidence of Existing Controls
    </td>
    <td>
         <input type="checkbox" name="hazard[efects]" checked  /> Consequences
    </td>
    <td>
         <input type="checkbox" name="hazard[sev]" checked  /> Severity
    </td>
    <td>
         <input type="checkbox" name="hazard[sev_r]" checked  /> Severity Rationale
    </td>
</tr>
<tr>
    <td>
         <input type="checkbox" name="hazard[lh]" checked  /> Likelihood
    </td>
    <td>
         <input type="checkbox" name="hazard[lhr]" checked  /> Likelihood Rationale
    </td>
    <td>
         <input type="checkbox" name="hazard[ir]" checked  /> Initial Risk 
    </td>
    <td>
         <input type="checkbox" name="hazard[sr]" checked  /> Safety Requirements
    </td>
</tr>
<tr>
    <td>
         <input type="checkbox" name="hazard[or]" checked  /> Office Responsible
    </td>
    <td>
         <input type="checkbox" name="hazard[tf]" checked  /> Time Frame
    </td>
    <td>
         <input type="checkbox" name="hazard[prr]" checked  /> Predicted Residual Risk
    </td>
    <td>
         <input type="checkbox" name="hazard[pt]" checked  /> Performance Targets
    </td>
</tr>
<tr>
    <td>
         <input type="checkbox" name="hazard[ma]" checked  /> Monitoring Activities </td>
    <td>
         <input type="checkbox" name="hazard[fq]" checked  /> Frequency
    </td>
    <td>
         <input type="checkbox" name="hazard[sr]" checked  /> Substitute Risk
    </td>
    <td>
         <input type="checkbox" name="hazard[remarks]" checked  /> Remarks As At <?php echo date("Y-m-d",time()); ?>
    </td>
</tr>
<tr><td><input type="checkbox" name="hazard[top]" checked  /> Type of Operation</td></tr>
</table>
<input type="hidden" name="fields" value='1' />

<br/><br/><br/>

<?php echo CHtml::submitButton('Submit' ); ?><br /><br />
<?php  
if(isset($_GET['id'])){
?>
	<a style="padding: 4px; border: 1px #ccc solid; background-color: #ccc; text-decoration: none;" href="index.php?r=incidents/view&id=<?php echo $_GET['id']; ?>">Go Back</a>		
<?php }else{ ?>
	<a style="padding: 4px; border: 1px #ccc solid; background-color: #ccc; text-decoration: none;" href="index.php?r=incidents/index">Go Back</a>		
<?php } ?>

</center>

<?php $this->endWidget(); ?>

<?php } ?>

</body>