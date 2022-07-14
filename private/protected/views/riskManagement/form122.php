<style> .cls1 td{border-bottom: 1px #ccc solid;} </style>
		<table style="width: 100%;">
			<tr>
				<td align="right"><b>SMS FORM 122</b></td>
			</tr>
			<tr>
				<td align="left"><b>HAZARD AND RISK MANAGEMENT REGISTER FOR ANS</b></td>
			</tr>
		</table>
		
		<table style="width: 100%;" class="cls1" >
			<tr style="background-color: #ccc;">
				<td rowspan=3><b>SN.</b></td>
				<td rowspan=3><b>Description of hazard</b></td>
				<td rowspan=3><b>Description of consequences</b></td>
				<td colspan=5><b>Risk Assessment</b></td>
				<td ><b>Evaluation</b></td>
			</tr>
			<tr style="background-color: #ccc;">
				<td rowspan=2><b>Current Defences</b></td>
				<td rowspan=2><b>Current Risk Index</b></td>
				<td colspan=2><b>Further Actions to reduce the risks</b></td>
				<td rowspan=2><b>Risk Owner</b></td>
				<td rowspan=2><b>Actual Risk Index</b></td>
			</tr>
			<tr style="background-color: #ccc;">
				<td ><b>Technical and Administrative Defences</b></td>
				<td ><b>Theoretical Risk Index</b></td>
			</tr>
			<tr>
				<td ><?php echo $model->id; ?></td>
				<td ><?php echo $model->description; ?></td>
				<td >
					<?php
						$items = @RmConsequences::model()->findAll("risk_management_id = {$model->id} and status = 1");
						if(!empty($items)){
							echo "<ul>";
							foreach($items as $item){
								echo "<li>{$item->details}</li>";
							}	
							echo "</ul>";
						}
					?>
				</td>
				<td >
					<?php
						$items = @RmCurrentDefences::model()->findAll("risk_management_id = {$model->id} and status = 1");
						if(!empty($items)){
							echo "<ul>";
							foreach($items as $item){
								echo "<li>{$item->details}</li>";
							}	
							echo "</ul>";
						}
					?>
				</td>
				<td ><?php echo $model->current_risk_index; ?></td>
				<td >
					<?php
						$items = @RmTechnicalDefences::model()->findAll("risk_management_id = {$model->id} and status = 1");
						if(!empty($items)){
							echo "<ul>";
							foreach($items as $item){
								echo "<li>{$item->details}</li>";
							}	
							echo "</ul>";
						}
					?>
				</td>
				<td ><?php echo $model->theoretical_risk_index; ?></td>
				<td ><?php echo $model->risk_owner; ?></td>
				<td ><?php echo $model->actual_risk_index; ?></td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td align="left"><b>Evaluated by: </b></td>
			</tr>
		</table>
		
		<table width="100%">
			<tr>
				<td>Name</td>
				<td>____________________________</td>
				<td>Signature</td>
				<td>____________________________</td>
				<td>Date</td>
				<td>____________________________</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td align="left"><b>Approved by: </b></td>
			</tr>
		</table>
		
		<table width="100%">
			<tr>
				<td>Name</td>
				<td>____________________________</td>
				<td>Signature</td>
				<td>____________________________</td>
				<td>Date</td>
				<td>____________________________</td>
			</tr>
		</table>
		&nbsp;
		<table >
			<tr>
				<td><b>Next Evaluation Date</b></td>
				<td>________________________________________________________</td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b>Next Review Date</b></td>
				<td>________________________________________________________</td>
			</tr>
		</table>