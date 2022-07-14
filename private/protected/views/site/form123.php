<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$incident = @Incidents::model()->findByPk($_GET['incident']);
?>
<style>
table{
	margin:auto;
}
.td_border td{border: 1px #ccc solid; padding: 7px;}
</style>
<table cellpadding="2px" cellspacing="0px"  style="width: 60%; border: 0px #000 solid; " >
		<tr valign="top"  style="" >
			<td></td><td align="right"><b>SMS FORM 123</b></td>
		</tr>
		<tr valign="top"  style="" >
			<td align="left"><h3>FOLLOW UP ACTIONS ON SAFETY RECOMMENDATIONS</h3></td>
			<td>
				<?php
					if(isset($_POST['datepicker-showButtonPanel'])){
						$st_dt = $_POST['datepicker-showButtonPanel'];
						$end_dt = $_POST['datepicker-showButtonPanel2'];
					}else{
						$year = date('Y');
						$month = date('m');
						$st_dt = $year.'-'.$month.'-'.'01';
						$end_dt = date('Y-m-d');
					}
				?>
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'date',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
					From: <?php
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
								'style'=>'border: 1px #eee solid;  color: #000;'
							),
						));
						?> &nbsp; 
					To: <?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'datepicker-showButtonPanel2',
							'value'=>$end_dt,    
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>'border: 1px #eee solid;  color: #000;'
							),
						));
						?> &nbsp; 
					<input type="submit" value="Search" style="border: 1px #eee solid; color: #000;" /> &nbsp; 
					
				<?php $this->endWidget(); ?> 
			</td>
		</tr>
	</table>
	
<table cellpadding="2px" cellspacing="0px"  style="width: 80%; border: 0px #000 solid;" class="td_border td_spacing" >
		<tr valign="top"  style="background-color: #eee;" >
			<td align="" ><b>DATE</B></td>
			<td align=""><b>SOURCE</B></td>
			<td align=""><b>DESCRIPTION</B></td>
			<td align=""><b>CAUSES/SAFETY ISSUES</B></td>
			<td align=""><b>SAFETY RECOMMENDATIONS</B></td>
			<td align=""><b>ACTION BY</B></td>
			<td align=""><b>STATUS</B></td>
			<td align=""><b>REMARKS</B></td>
		</tr>
		
		<?php
			$tr = "";
			$occurrences = @Incidents::model()->findAll("date between '{$st_dt}' and '{$end_dt}'");
			
			foreach($occurrences as $occurrence){
				echo "<tr valign='top'  style='' >
						<td align='' >{$occurrence->date}</td>
						<td align=''>{$occurrence->number}</td>
						<td align=''>{$occurrence->occurrence}</td>
						
						<td align=''>";
				$causes = @Causes::model()->findAll("status = 1 and incident_id ='{$occurrence->id}'");
				if(!empty($causes)){
					echo "<ol>";
					foreach($causes as $cause){
						echo "<li>{$cause->details}</li>";
					}
					echo "</ol>";
				}	
				echo "			
						</td>
						<td align=''>";
				$srecommendations = @SafetyRecommendations::model()->findAll("status = 1 and incident_id ='{$occurrence->id}'");
				if(!empty($srecommendations)){
					echo "<ol>";
					foreach($srecommendations as $srecommendation){
						echo "<li>{$srecommendation->details}</li>";
					}
					echo "</ol>";
				}			
				echo "</td>
						<td align=''>{$occurrence->person_responsible}</td>
						<td align=''>{$occurrence->status0->name}</td>
						<td align=''>";
				$remarks = @Remarks::model()->findAll("status = 1 and incident_id ='{$occurrence->id}'");
				if(!empty($remarks)){
					echo "<ol>";
					foreach($remarks as $remark){
						echo "<li>{$remark->details}</li>";
					}
					echo "</ol>";
				}			
						
				echo "		
						</td>
					</tr>";
			}
				
		?>
	</table>
	
	<table cellpadding="2px" cellspacing="0px"  style="width: 80%; border: 0px #000 solid; margin-top: 10px;" >
		<tr valign="top"  style="" >
			<td align="center">Name</td>
			<td align="center">Signature</td>
			<td align="center">Date</td>
		</tr>
		<tr valign="top"  style="" >
			<td align="center">____________________________________________________</td>
			<td align="center">____________________________________________________</td>
			<td align="center">____________________________________________________</td>
		</tr>
	</table>
	
	<br /><br />
<table style="width: 80%; " >
	<tr>
		<td align="left" style=""><b>Next Review Date</b>: ______________________________________________</td>
	</tr>
</table>