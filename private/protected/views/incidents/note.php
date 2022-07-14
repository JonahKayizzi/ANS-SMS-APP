<b>Brief Notes</b><br />
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
			
			<textarea name="note" style="width: 100%; height: 70px;" >
				<?php $incident = @Incidents::model()->findByPk($id); echo $incident->brief_notes; ?>
			</textarea>
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Save" /></td>
	</tr>
</table>
<?php $this->endWidget(); ?>