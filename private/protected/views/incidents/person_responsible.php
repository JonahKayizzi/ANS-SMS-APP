<b>Person responsible</b><br />
<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%">
	<tr>
		<td>
			<input type="text" name="person_responsible" value="<?php $incident = @Incidents::model()->findByPk($id); echo $incident->person_responsible; ?>" style="width: 100%;" />
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Save" /></td>
	</tr>
</table>
<?php $this->endWidget(); ?>