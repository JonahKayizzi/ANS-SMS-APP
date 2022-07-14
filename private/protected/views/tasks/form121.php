
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;margin:auto">
<table class="table" >
		<tr valign="top"  style="" >
			<td align="right"><b>SMS FORM 121</b></td>
		</tr>
	</table>
	
	<table class="table" >
		<tr valign="top"  style="" >
			<td align="left"><b>SYSTEM AND TASK ANALYSIS WORKSHEET</b></td>
		</tr>
	</table>
	
	<table class="table" >
		<tr valign="top"  style="" >
			<td >Task Title: <?php echo $model->title; ?></td>
			<td >Task Location: <?php echo $model->location; ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td >Analyst Name: <?php echo $model->analyst; ?></td>
			<td >Date: <?php echo $model->date; ?></td>
		</tr>
	</table>
	

<?php
	$task_steps = @TaskSteps::model()->findAll("task_id = '{$model->id}' and status = 1");
	if(!empty($task_steps)){
?>
<table class="table" style="width: 100%; margin-top: 10px;">
	<tr class="sms_thead">
		<td><b>Task Step</b></td>
		<td><b>Task Step Description</b></td>
		<td><b>Hazard(s)</b></td>
		<td><b>Hazard Controls</b></td>
		<td><b>Comments</b></td>
	</tr>
<?php	
		$k = 1;
		foreach($task_steps as $task_step){
?>
	<tr style="border-bottom: 1px #ccc solid;" class="sms_tr">
		<td style="border-bottom: 1px #ccc solid;"><?php echo $task_step->description; ?></td>
		<td style="border-bottom: 1px #ccc solid;"><?php echo $task_step->details; ?></td>
		<td style="border-bottom: 1px #ccc solid; width: 25%;">
		<?php
		$hazards = @TaskStepHazards::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
		if(!empty($hazards)){
			echo "<ol>";
			foreach($hazards as $hazard){
				echo "<li>{$hazard->details}</li>";
			}
			echo "</ol>";
		}
		?>
		</td>
		<td style="border-bottom: 1px #ccc solid; width: 25%;">
		<?php
		$hazard_controls = @TaskStepHazardControls::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
		if(!empty($hazard_controls)){
			echo "<ol>";
			foreach($hazard_controls as $hazard_control){
				echo "<li>{$hazard_control->details}</li>";
			}
			echo "</ol>";
		}
		?>
		</td>
		<td style="border-bottom: 1px #ccc solid; width: 25%;">
		<?php
		$comments = @TaskStepComments::model()->findAll("status = 1 and task_step_id ='{$task_step->id}'");
		if(!empty($comments)){
			echo "<ol>";
			foreach($comments as $comment){
				echo "<li>{$comment->details}</li>";
			}
			echo "</ol>";
		}
		?>
		</td>
	</tr>
	
<?php
		$k++;
		}
?>
</table>
<?php
	}else{
		echo "This task has no task steps recorded yet.";
	}
?>

</div>