<?php
//echo $newModel->status;
if($newModel->status!='closed'){

$this->menu=array(
	array('label'=>'Add Safety Occurance Data', 'url'=>array('safetyOccurrenceData/create','incident'=>$model->id)),);
}
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 

 echo $form->hiddenField($newModel,'incident_id',array('value'=>$model->id)); 
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<table class="table table-striped" style="width:400px;margin:auto;">
	<tr>
<th colspan="2"> 
<center>
	INCIDENT EDIT

</center>
</th>
	</tr>
	<tr>
		<td><b>Number</b></td>
		<td>#/IS/00<?php echo $model->id ?></td>
	</tr>
	<tr>
		<td><b>Occurance</b></td>
		<td><?php echo $model->occurrence ?></td>
	</tr>
		<tr>
		<td><b>Place</b></td>
		<td><?php echo $model->place ?></td>
	</tr>
	<tr>
		<td><b>Date</b></td>
		<td><?php echo $model->date ?></td>
	</tr>
		
	<tr>
		<td><b>Notes</b></td>
		<td><?php echo $model->brief_notes ?></td>
	</tr>
	<tr>
		<td><b>Status</b></td>
		<td><?php echo $form->dropDownList($newModel,'status',array('closed'=>'Closed','Under Investigation'=>'Under Investigation'));?></td>
	</tr>


	<tr>
		<td><b>Investigation</b></td>
		<td><?php echo $form->dropDownList($newModel,'level',array('full'=>'Full','brief'=>'Brief')); ?></td>


	</tr>
	<tr>
		<td colspan="2">
			<center>
<button type="submit" class="btn btn-primary btn-sm">Save Incident
</button>
			</center>
		</td>
	</tr>
</table>

<?php $this->endWidget(); ?>