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
			Directorate: 
			</td>
			<td>
				<?php
						echo CHtml::dropDownList('directorate', '',Directorates::model()->getOptions(),array('class'=>'', ));
					?>
				</td>
				<td>
				Category: 
				</td>
				<td>
					<?php
						echo CHtml::dropDownList('category', '',LessonsLearntCategories::model()->getOptions(),array('class'=>'', ));
					?>
				</td>
		</tr>
		<tr valign="middle"  style="" >
			<td>
				Source:
			</td>
			<td>
			
			<?php
						echo CHtml::dropDownList('sr_category', '',SourceTypes::model()->getOptions(),array('class'=>'', ));
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

<table id="lessons-learnt-report" class="display" width="100%" cellspacing="0">
	<thead>
		<tr  >
			<td align="" ><b>ID</B></td>
			<td align="" ><b>DATE</B></td>
			<td align=""><b>SOURCE TYPE</B></td>
			<td align=""><b>SOURCE DETAIL</B></td>
			<td align=""><b>SAFETY CONCERN</B></td>
			<td align=""><b>LESSON(S) LEARNT</B></td>
			<td align=""><b>DIRECTORATE</B></td>
			<td align=""><b>CATEGORY</B></td>
			<td align=""><b>COST IMPLICATION</B></td>
		</tr>
	</thead>
<tbody>	
		<?php
		foreach ($model as $item) {
			# code...
			?>
<tr>
<td><?php echo CHtml::link($item->id, array('/lessonsLearnt/view', 'id'=>$item->id)); ?></td>
<td><?php echo $item->date_reported; ?></td>
<td>
<?php 
	echo $item->source_type;
?>
</td>
<td><?php echo $item->source_detail; ?></td>
<td>
<?php echo $item->safety_concern; ?>
</td>
<td><?php echo $item->Description; ?></td>
<td><?php echo $item->Divission; ?></td>
<td><?php echo @$item->sub_category; ?></td>
<td align="right" ><?php echo number_format($item->cost); ?></td>
</tr>

			<?php
		}
		?>

</tbody>
			</table>
			<?php  } ?>