<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :900px;margin:auto">

<h4>DANS SMS INTERNAL, EVALUATION, AUDIT AND INSPECTION SCHEDULE 2016</h4>

<table class="table table-bordered table-striped">
	<tr>
		<td></td>
		<?php
		foreach ($model as $item) {
		?>
		 	<th>
		 		<?php echo $item->name  ?>
		 	</th>
		 	<?php
		 } 
		?>

	</tr>

	<tr>
				<td>
<b>
Dates
</b>
		</td>
		<?php
		foreach ($model as $item) {

		 	?>
		 	<td>
		 		<?php echo @$item->auditDates[0]->date  ?>
		 		<br/>
		 		<?php

if(@$item->auditDates[0]->date){
		 		?>
		 		<b>(Audit)</b>
		 		<?php

		 	}
		 	?>

		 	</td>
		 	<?php
		 } 
		?>

	</tr>
	<tr>
		<td>
<b>
Auditors
</b>
		</td>
			<?php
		foreach ($model as $item) {

		 	?>
		 	<td>
		 		<ol>
		 			<?php
		 			if(@$item->auditDates[0]->date){
foreach ($item->auditDates[0]->auditors as $auditor) {
	?>
<li><?php echo $auditor->user_relation->name; ?></li>

	<?php
}
}


?>
		 	
		 	</ol>
		 	</td>
		 	<?php
		 } 
		?>
	</tr>

</table>