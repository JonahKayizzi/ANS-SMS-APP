<?php if($search == 0){ ?>	
<?php

?>
<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'date',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
<table class="table"  cellpadding="2px"  >
		<tr valign="middle"  style="" >
			<td>
			From: 
			</td>
			<td>
			
				
				
					<?php
						// $date = date('Y-m-d');
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'datepicker-showButtonPanel',
							'value'=>$st_dt,    
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								/* 'style'=>'border: 1px #eee solid;  color: #000;' */
							),
						));
						?> 
				</td>
				<td>
				To: 
				</td>
				<td>
					<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'datepicker-showButtonPanel2',
							'value'=>$end_dt,    
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								/* 'style'=>'border: 1px #eee solid;  color: #000;' */
							),
						));
						?> 
				</td>
		</tr>
		<tr valign="middle"  style="" >
			<td>
			Priority: 
			</td>
			<td>
				<select name="priority">
					<option value="All">All</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				</td>
				<td>
				Action By: 
				</td>
				<td>
					<?php
						echo CHtml::dropDownList('officer', '',Users::model()->getOfficers2(),array('class'=>'', ));
					?>
				</td>
		</tr>
		<tr valign="middle"  style="" >
			<td>
				Source:
			</td>
			<td>
			<?php
						echo CHtml::dropDownList('sr_category', '',SourceTypes::model()->getOptions2(),array('class'=>'', ));
					?>
			</td>
			<td>
				Result:
			</td>
			<td>
			<select name="search_result"  >
				<option value="1">Back Linked</option>
				<option value="2">Print Friendly</option>
			</select>
			</td>
		</tr>
		<tr valign="middle"  style="" >
			<td>
				Status:
			</td>
			<td>
			<select name="search_status"  >
				<option value="2">All</option>
				<option value="0">Open</option>
				<option value="1">Closed</option>
			</select>
			</td>
			<td>
				Department:
			</td>
			<td>
				<?php
						echo CHtml::dropDownList('user_department', '',UserDepartments::model()->getOptionsAll(),array('class'=>'', ));
					?>
			</td>
		</tr>
		<tr valign="middle"  style="" >
			<td>
				Type of Control:
			</td>
			<td>
			<?php
						echo CHtml::dropDownList('type_of_control', '',@TypesOfControlsSub::model()->getOptionsAll(),array('class'=>'', ));
					?>
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				&nbsp;
			</td>
		</tr>
		<tr valign="middle"  style="" >
			<td COLSPAN=4>
			<input type="submit" name="Search" value="Search" class="" />
			</td>
			
		</tr>
	</table>
	
	<?php $this->endWidget(); ?> 
	<?php  } ?>
<?php if($search == 1){ ?>	
<style>
	#form123_length{float: left; width: 50%;}
	#form123_filter{float: right; width: 50%; text-align: right;}
	td{padding: 5px; border-bottom: 1px #ccc solid; font-size: 15px;}
</style>

<table id="form-123-report" class="display" width="100%" cellspacing="0">
	<thead>
		<tr  >
			<th align=""><b>Date</B></th>
			<th align=""><b>Source</B></th>
			<th align=""><b>Description</B></th>
			<th align=""><b>Causes/Safety Issues</B></th>
			<th align=""><b>Safety Requirements</B></th>
			<th align=""><b>Priority</B></th>
			<th align=""><b>Deadline</B></th>
			<th align=""><b>Action By</B></th>
			<th align=""><b>Department</B></th>
			<th align=""><b>Remarks</B></th>
			<th align=""><b>Status</B></th>
		</tr>
	</thead>
<tbody>	
		<?php
		foreach ($model as $item) {
			# code...
			?>
<tr>
<td><?php echo $item->modified; ?></td>
<td>
<?php /* echo $item->source; */ ?>
<?php 
	$path = "#";
	if($item->content_type == 7){$path = "safetyRecommendations/view";}
	if($item->content_type == 6){$path = "incidents/view";}
	if($item->content_type == 5){$path = "auditForm/view";}
	if($item->content_type == 4){$path = "riskManagement/view";}
	if($item->content_type == 3){$path = "tasks/view";}
	if($item->content_type == 2){$path = "workshops/view";}
	if($item->content_type == 1){$path = "incidents/view";}
	
	if($search_result == 1){
		if($item->content_type == 7){
			echo CHtml::link($item->source, array($path, 'id'=>@$item->id));
		}else{
			echo CHtml::link($item->source, array($path, 'id'=>@$item->content_id));
		}
		
	}else{
		echo $item->source;
	}
	
?>
</td>
<td><?php echo $item->details; ?></td>
<td>
<?php echo $item->causes; ?>
<?php 
	if($item->content_id == ''){$content_id = 0;}else{$content_id = $item->content_id;}
	if($item->content_type == 1){
		$causes = @IncidentsCauses::model()->findAll("incident_id = ".@$content_id);
		if(!empty($causes)){
			echo "<ol>";
			foreach($causes as $cause){
				echo "<li>".@$cause->cause->name."</li>";
			}
			echo "</ol>";
		}
	}
	
	if($item->content_type == 6){
		//$aircraft_incident_info = @AircraftIncidentInvestigations::model()->findByPk($content_id);
		//$causes = @IncidentsCauses::model()->findAll("incident_id = ".@$aircraft_incident_info->incident_id);
		$causes = @IncidentsCauses::model()->findAll("incident_id = ".$content_id);
		if(!empty($causes)){
			echo "<ol>";
			foreach($causes as $cause){
				echo "<li>".@$cause->cause->name."</li>";
			}
			echo "</ol>";
		}
	}
 ?>

</td>
<td><?php echo $item->brief; ?></td>
<td><?php echo $item->priority; ?></td>
<td><?php echo $item->deadline; ?></td>
<td><?php echo @$item->actionBy->name; ?></td>
<td><?php echo @$item->actionBy->userDepartment->name; ?></td>
<td>
<?php 
	echo $item->remarks; 
	
	if($item->content_type == 5){
		$remarks = @AuditForm::model()->findByPk($content_id);
		echo @$remarks->lead_auditors_comments;
	}
	
	if($item->content_type == 1){
		$remarks = @Remarks::model()->findAll("incident_id = '{$content_id}' and status = 1");
		if(!empty($remarks)){
			echo "<ol>";
			foreach($remarks as $remark){
				echo "<li>".@$remark->details."</li>";
			}
			echo "</ol>";
		}
	}
	
	if($item->content_type == 6){
		$remarks = @Remarks::model()->findAll("incident_id = '{$content_id}' and status = 1");
		if(!empty($remarks)){
			echo "<ol>";
			foreach($remarks as $remark){
				echo "<li>".@$remark->details."</li>";
			}
			echo "</ol>";
		}
	}
?>
</td>
<td><?php if($item->open_close == 0){echo "Open";}else{echo "Closed";} ?></td>
</tr>

			<?php
		}
		?>

</tbody>
			</table>
			<?php  } ?>