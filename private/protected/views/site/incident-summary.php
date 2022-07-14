<style> .cls1 td{border: 1px #000 solid;} </style>
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
<?php
	$incident_causes = @IncidentCause::model()->findAll("status = 1");
	$table = "<table width='100%' class='cls1' cellspacing='0px' cellpadding='3px' >";
	$table = $table."<tr><td>&nbsp;</td><td><b>Category of Occurrence</b></td>";
	if(!empty($incident_causes)){
		foreach($incident_causes as $incident_cause){
			$table = $table."<td><b>{$incident_cause->cause}</b></td>";
		}
		$table = $table."<td><b>Total</b></td>";
	}
	$table = $table."</tr>";
	
	//GO CATEGORY BY CATEGORY
	$incident_categories = @IncidentCategory::model()->findAll("status = 1");
	if(!empty($incident_categories)){
		
		foreach($incident_categories as $incident_category){
			$table = $table."<tr>";
			$incident_category_id = $incident_category->id;
			$incident_category_name = $incident_category->category;
			$table = $table."<td>{$incident_category->id}</td><td>{$incident_category->category}</td>";
			$incident_causes = @IncidentCause::model()->findAll("status = 1");
			
			if(!empty($incident_causes)){
				$total_category = 0;
				$total_cause = array();
				//$total_cause_final = array();
				$k=0;
				foreach($incident_causes as $incident_cause){
					$incident_cause_id = $incident_cause->id;
					
					$log_summary_count = @Incidents::model()->getSafetyLogSummaryCount($incident_category_id, $incident_cause_id, $st_dt, $end_dt);
					$table = $table."<td>";
					$table = $table.$log_summary_count[0]['log_summary_count'];
					$table = $table."</td>";
					$total_category = $total_category + $log_summary_count[0]['log_summary_count'];
					if(!isset($total_cause[$k])){$total_cause[$k] = 0;}
					$total_cause[$k] = $total_cause[$k] + $log_summary_count[0]['log_summary_count'];
					$k++;
				}
				//array_push($total_cause_final, $total_cause);
				$k = 0;
				$table = $table."<td><b>{$total_category}</b></td>";
			}
			$table = $table."</tr>";
		}
		$table = $table."<tr>";
		$table = $table."<td></td><td></td>";
		$incident_causes = @IncidentCause::model()->findAll("status = 1");
		foreach($incident_causes as $incident_cause){
			$table = $table."<td><b>{$total_cause[$k]}</b></td>";
			$k++;
		}
		$table = $table."</tr>";
	}
	$table = $table."</table>";
	echo $table;
	
?>