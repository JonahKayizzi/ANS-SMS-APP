<?php
/* @var $this SafetyOccurrenceDataController */
/* @var $model SafetyOccurrenceData */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'safety-occurrence-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<style>td{border-bottom: 1px #ccc solid;}</style>
<table class="table table-hover table-striped" >
		<tr valign="top"  style="" >
			<td align="left" width="20px" ></td>
			<td align="left" width="20%" ><b>Item</b></td>
			<td align="left"><b>Tower</b></td>
			<td align="left"><b>Approach</b></td>
			<td align="left"><b>Area Control</b></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">1</td>
			<td align="left"><?php echo $form->labelEx($model,'date_of_occurrence'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'date_of_occurrence',array('class'=>'form-control')); ?><br />
			<?php
			/* $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'SafetyOccurrenceData[date_of_occurrence]',
				'value'=>date('Y-m-d'),    
				'options'=>array(
					'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
					'showButtonPanel'=>true,
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>''
				),
			)); */
			?>
			<?php echo $form->error($model,'date_of_occurrence', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'date_of_occurrence_2',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'date_of_occurrence_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'date_of_occurrence_3',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'date_of_occurrence_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">2</td>
			<td align="left"><?php echo $form->labelEx($model,'time_of_occurrence'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'time_of_occurrence',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_of_occurrence', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_of_occurrence_2',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_of_occurrence_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_of_occurrence_3',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_of_occurrence_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">3</td>
			<td align="left"><?php echo $form->labelEx($model,'shift'); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'shift',array('Day'=>'Day','Night'=>'Night'),array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'shift', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'shift_2',array('Day'=>'Day','Night'=>'Night'),array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'shift_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'shift_3',array('Day'=>'Day','Night'=>'Night'),array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'shift_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">4</td>
			<td align="left"><?php echo $form->labelEx($model,'duration_of_shift'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'duration_of_shift',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'duration_of_shift', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'duration_of_shift_2',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'duration_of_shift_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'duration_of_shift_3',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'duration_of_shift_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">5</td>
			<td align="left"><?php echo $form->labelEx($model,'time_dc_logged_on_duty'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_on_duty',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_dc_logged_on_duty', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_on_duty_2',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_dc_logged_on_duty_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_on_duty_3',array('class'=>'form-control')); ?><br />
			<?php echo $form->error($model,'time_dc_logged_on_duty_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">6</td>
			<td align="left"><?php echo $form->labelEx($model,'time_dc_logged_off_duty'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_off_duty',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_logged_off_duty', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_off_duty_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_logged_off_duty_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_logged_off_duty_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_logged_off_duty_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">7</td>
			<td align="left"><?php echo $form->labelEx($model,'time_dc_reported_on_duty'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_on_duty',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_on_duty', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_on_duty_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_on_duty_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_on_duty_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_on_duty_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">8</td>
			<td align="left"><?php echo $form->labelEx($model,'time_dc_reported_off_duty'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_off_duty',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_off_duty', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_off_duty_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_off_duty_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'time_dc_reported_off_duty_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'time_dc_reported_off_duty_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">9</td>
			<td align="left"><?php echo $form->labelEx($model,'no_of_personnel_on_shift_roster'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_roster',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_roster', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_roster_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_roster_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_roster_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_roster_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">10</td>
			<td align="left"><?php echo $form->labelEx($model,'no_of_personnel_on_shift_logbook'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_logbook',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_logbook', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_logbook_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_logbook_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_personnel_on_shift_logbook_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_personnel_on_shift_logbook_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">11</td>
			<td align="left"><?php echo $form->labelEx($model,'density_of_traffic'); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'density_of_traffic',array('Low'=>'Low','Medium'=>'Medium','High'=>'High'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'density_of_traffic', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'density_of_traffic_2',array('Low'=>'Low','Medium'=>'Medium','High'=>'High'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'density_of_traffic_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'density_of_traffic_3',array('Low'=>'Low','Medium'=>'Medium','High'=>'High'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'density_of_traffic_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">12</td>
			<td align="left"><?php echo $form->labelEx($model,'no_of_trainees_on_shift'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_trainees_on_shift',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_trainees_on_shift', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_trainees_on_shift_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_trainees_on_shift_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'no_of_trainees_on_shift_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'no_of_trainees_on_shift_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">13</td>
			<td align="left"><?php echo $form->labelEx($model,'traffic_handled_by_trainee'); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'traffic_handled_by_trainee',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'traffic_handled_by_trainee', array('style'=>'color: red;')); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'traffic_handled_by_trainee_2',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'traffic_handled_by_trainee_2', array('style'=>'color: red;')); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'traffic_handled_by_trainee_3',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'traffic_handled_by_trainee_3', array('style'=>'color: red;')); ?></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">14</td>
			<td align="left"><?php echo $form->labelEx($model,'controller_under_medication'); ?></td>
			<td align="left">
			<?php echo $form->dropDownList($model,'controller_under_medication',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'controller_under_medication', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'controller_under_medication_2',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'controller_under_medication_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->dropDownList($model,'controller_under_medication_3',array('Yes'=>'Yes','No'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'controller_under_medication_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">15</td>
			<td align="left"><?php echo $form->labelEx($model,'date_from_last_annual_leave'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'date_from_last_annual_leave',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'date_from_last_annual_leave', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'date_from_last_annual_leave_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'date_from_last_annual_leave_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'date_from_last_annual_leave_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'date_from_last_annual_leave_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">16</td>
			<td align="left"><?php echo $form->labelEx($model,'last_training_attended'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_attended',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_attended', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_attended_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_attended_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_attended_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_attended_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">17</td>
			<td align="left"><?php echo $form->labelEx($model,'last_training_date'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_date',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_date', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_date_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_date_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_training_date_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_training_date_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">18</td>
			<td align="left"><?php echo $form->labelEx($model,'last_proficiency_date'); ?></td>
			<td align="left">
			<?php echo $form->textField($model,'last_proficiency_date',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_proficiency_date', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_proficiency_date_2',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_proficiency_date_2', array('style'=>'color: red;')); ?>
			</td>
			<td align="left">
			<?php echo $form->textField($model,'last_proficiency_date_3',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_proficiency_date_3', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">19</td>
			<td align="left"><?php echo $form->labelEx($model,'weather_information'); ?></td>
			<td align="left" colspan=3 >
			<?php echo $form->textArea($model,'weather_information',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'weather_information', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left">20</td>
			<td align="left"><?php echo $form->labelEx($model,'aerodrome_information'); ?></td>
			<td align="left" colspan=3>
			<?php echo $form->textArea($model,'aerodrome_information',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'aerodrome_information', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<?php if(isset($_GET['edit'])&&($_GET['edit']=='yes')){ $imageUrl_add = Yii::app()->request->baseUrl.'/images/1437745034_add.png';  $image_add = '<img src="'.$imageUrl_add.'" width="17px" alt="[+Add]" />';  ?>
		<tr valign="top"  style="" >
			<td align="left">21</td>
			<td align="left"><?php echo $form->labelEx($model,'controllers_on_duty'); ?></td>
			<td align="left" colspan=3>
			<?php /* echo $form->textArea($model,'controllers_on_duty',array('style'=>'width: 100%; height: 70px;')); */ ?>
			<?php /* echo $form->error($model,'controllers_on_duty', array('style'=>'color: red;')); */ ?>
			Click here to add controllers on duty <?php echo CHtml::link($image_add, array('dutyControllers/create', 'incident'=>$_GET['incident'], 'sod_id'=>$_GET['id'], 'id'=>$_GET['id'])); ?>
			</td>
		</tr>
		<?php } ?>
		<tr valign="top"  style="" >
			<td align="left"></td>
			<td align="left"></td>
			<td align="left" colspan=3>
			<?php echo $form->hiddenField($model,'incident_id', array('value'=>$_GET['incident'])); ?>
			<?php echo $form->error($model,'incident_id', array('style'=>'color: red;')); ?>
			<?php echo $form->hiddenField($model,'completed_by',array('value'=>Yii::app()->user->name)); ?>
			<?php echo $form->error($model,'completed_by', array('style'=>'color: red;')); ?>
			</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left"></td>
			<td align="left"></td>
			<td align="left" colspan=3><input type="submit" value="Save" class="form-control" /></td>
		</tr>
	</table>
<?php $this->endWidget(); ?>