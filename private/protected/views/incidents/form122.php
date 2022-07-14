<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;margin:auto">
	<div class="pull-right">
<h4>SMS FORM 122</h4>
	</div>
<div>
<h4>HAZARD AND RISK MANAGEMENT REGISTER FOR ANS</h4>
	</div>
<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<td rowspan="3">SN</td>
		<td rowspan="3">Description of hazard</td>
				<td rowspan="3">Description of consquences</td>
				<td colspan="5">Risk Assessment</td>
				<td>Evaluation</td>
		</tr>
		<tr >
			<td rowspan="2">Current Defences</td>
			<td rowspan="2">Current Risk Index</td>
			<td colspan="2">Further Actions to reduce the tisks</td>

			<td rowspan="2">Risk Owner</td>
			<td rowspan="2">Actual Risk Index</td>
		</tr>
		<tr>
			<td>Technical and Administrative Defences</td>
			<td>Technical Risk Index</td>
		</tr>
		</thead>
		<tbody>






<tr>
	<td><?php echo $model->id; ?></td>
	<td><?php echo $model->brief_notes; ?> </td>
	<td>				<?php 
					$consequences = @Consequences::model()->findAll("incident_id = '{$model->id}' and status = 1");
					
					if(!empty($consequences)){
						foreach($consequences as $consequence){
				?>
				

				<?php echo $consequence->description; ?>
			
				<?php echo CHtml::link($image_edit, array('consequences/update', 'id'=>$consequence->id), array('onClick'=>"return popup(this, 'consequence')")); ?></td>
					</br>
				<?php 
						}
					}
				?></td>
	<td>	<?php 
					$defences = @ExistingDefenses::model()->findAll("incident_id = '{$model->id}' and status = 1");
					
					if(!empty($defences)){
						foreach($defences as $defence){
				?>

<?php echo $defence->details; ?><br/>
				<?php 
						}
					}
				?>

			</td>
		<td><?php 	

						$severities = @Severity::model()->findAll("incident_id = '{$model->id}' and status = 1");
					
					if(!empty($severities)){


	foreach($severities as $severity){


		?>
			<?php echo $severity->likelihood.$severity->severity; ?>
		<?php

	}
}
		?></td>
	<td>N/A</td>
	<td>N/A</td>
	<td>N/A</td>
	<td>
<?php 
					$requirements = @SafetyRequirements::model()->findAll("incident_id = '{$model->id}' and status = 1");
					
					if(!empty($requirements)){
				?>

				<?php
						foreach($requirements as $requirement){
				?>

				<?php echo $requirement->predicted_residual_risk; ?>

					<?php 
						}
					}
				?>
	</td>
</tr>


		</tbody>
</table>

<table class="table">
	<tr>
		<td>
			<b>Evaluated By:</b><br/><br/>
					Name:<br/><br/>
					Date:<br/><br/>


		</td>
		<td> Signiture</td>
	</tr>

		<tr>
		<td>
			<b>Approved By:</b><br/><br/>
					Name:<br/><br/>
					Date:<br/><br/>


		</td>
		<td> Signiture</td>
	</tr>
</table>
<table class="table">


		<tr><td><b>Next Evaluation Date</b><br/></td></tr>

				<tr><td><b>Next Review Date</b><br/></td></tr>
	</table>
</div>