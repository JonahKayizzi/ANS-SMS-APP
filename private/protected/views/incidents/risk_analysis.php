<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	'Risk Analysis'
);

$this->menu=array(
			array('label'=>'Report Hazard', 'url'=>array('create')),
			array('label'=>'Search for Hazard', 'url'=>array('admin')),
			array('label'=>'Show Incoming Hazards', 'url'=>array('index','main_category'=>'Hazard')),
			array('label'=>'Show Pending Hazards', 'url'=>array('index','main_category'=>'Hazard','status'=>2)),
			array('label'=>'Show Initiated Hazards', 'url'=>array('index','main_category'=>'Hazard','status'=>3)),
			array('label'=>'Show Monitored Hazards', 'url'=>array('index','main_category'=>'Hazard','status'=>4)),
			array('label'=>'Show Closed Hazards', 'url'=>array('index','main_category'=>'Hazard','status'=>5)),
			
		);
?>

<h1>Risk Analysis Graph </h1> <form style="margin: 0; padding: 0;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidents-form',
        'method' => 'get',
	'htmlOptions'=>array(
       'style'=>'display:inline!important;',
'action'=>'incidents/riskAnalysis&year=2015'
    ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<label for='year'>Enter Year:</label>
<?php 
	$year = date('Y');
	$output = "<option>".$year."</option>";
	for($i=0; $i<5 ; $i++){
		$year--;
		$output .= "<option>".$year."</option>";
	}
	?>
<select name='year' id='year'>
	<?php echo $output; ?>
</select>
<label for='year'>Enter Type:</label>

<select name='type' id='type'>
<option>none</option>
<option>Hazards</option>
<option>Incedents2</option>
<option>SITREP</option>
</select>
<?php echo CHtml::submitButton('Submit' ); ?>


<?php $this->endWidget(); ?>
<a href="index.php?r=incidents/riskAnalysiscat">View by Category</a>

  
 
<div id="chart_div"></div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    //load the Google Visualization API and the chart
            google.load('visualization', '1', {'packages': ['columnchart']});
 
            //set callback
            google.setOnLoadCallback (createChart);
 
            //callback function
            function createChart() {
 
                //create data table object
                var dataTable = new google.visualization.DataTable();
 
<?php
	if($type=="none"){

?>

                //define columns
                dataTable.addColumn('string','Month');
                dataTable.addColumn('number', 'Hazards');
                dataTable.addColumn('number', 'Incidents');
		dataTable.addColumn('number', 'SITREP');
		dataTable.addColumn('number', 'Issues');


 
                //define rows of data
  dataTable.addRows([
         ['January', <?php echo $hazards[1]?>, <?php echo $incidents[1]?>, <?php echo $sitreps[1]?>, <?php echo $issues[1]?> ],            // RGB value
         ['February', <?php echo $hazards[2]?>, <?php echo $incidents[2]?>, <?php echo $sitrep[3]?>, <?php echo $issues[2]?>],            // English color name
         ['March', <?php echo $hazards[3]?>,<?php echo $incidents[3]?>, <?php echo $sitreps[3]?>, <?php echo $issues[3]?>],
		 ['April', <?php echo $hazards[4]?>,<?php echo $incidents[4]?>, <?php echo $sitreps[4]?>, <?php echo $issues[4]?>], 
		 ['May', <?php echo $hazards[5]?>,<?php echo $incidents[5]?>, <?php echo $sitreps[5]?>, <?php echo $issues[5]?>],
		 ['June', <?php echo $hazards[6]?>,<?php echo $incidents[6]?>, <?php echo $sitreps[6]?>, <?php echo $issues[6]?>], // 
		 ['July', <?php echo $hazards[7]?>,<?php echo $incidents[7]?>, <?php echo $sitreps[7]?>, <?php echo $issues[7]?>],
		 ['August', <?php echo $hazards[8]?>,<?php echo $incidents[8]?>, <?php echo $sitreps[8]?>, <?php echo $issues[8]?>], // CSS-style declaration
		 ['September', <?php echo $hazards[9]?>,<?php echo $incidents[9]?>, <?php echo $sitreps[9]?>, <?php echo $issues[9]?>],
		 ['October', <?php echo $hazards[10]?>,<?php echo $incidents[10]?>, <?php echo $sitreps[10]?>, <?php echo $issues[10]?>], // CSS-style declaration
		 ['November', <?php echo $hazards[11]?>,<?php echo $incidents[11]?>, <?php echo $sitreps[11]?>, <?php echo $issues[11]?>],
		 ['December', <?php echo $hazards[12]?>,<?php echo $incidents[12]?>, <?php echo $sitreps[12]?>, <?php echo $issues[12]?>], // CSS-style declaration
      ]);
<?php
}
else if($type=="Hazards"){
?>


                //define columns
                dataTable.addColumn('string','Month');
                dataTable.addColumn('number', 'Hazards');


 
                //define rows of data
  dataTable.addRows([
         ['January', <?php echo $hazards[1]?> ],            // RGB value
         ['February', <?php echo $hazards[2]?>],            // English color name
         ['March', <?php echo $hazards[3]?>],
	 ['April', <?php echo $hazards[4]?>], 
	 ['May', <?php echo $hazards[5]?>],
	 ['June', <?php echo $hazards[6]?>], // 
	 ['July', <?php echo $hazards[7]?>],
	 ['August', <?php echo $hazards[8]?>], // CSS-style declaration
	 ['September', <?php echo $hazards[9]?>],
	 ['October', <?php echo $hazards[10]?>], // CSS-style declaration
	 ['November', <?php echo $hazards[11]?>],
	 ['December', <?php echo $hazards[12]?>], // CSS-style declaration
      ]);
<?php
}
else if($type=="Incedents2"){
?>

                //define columns
                dataTable.addColumn('string','Month');
                dataTable.addColumn('number', 'Incedents');


 
                //define rows of data
  dataTable.addRows([
         ['January', <?php echo $incidents[1]?> ],            // RGB value
         ['February', <?php echo $incidents[2]?>],            // English color name
         ['March', <?php echo $incidents[3]?>],
	 ['April', <?php echo $incidents[4]?>], 
	 ['May', <?php echo $incidents[5]?>],
	 ['June', <?php echo $incidents[6]?>], // 
	 ['July', <?php echo $incidents[7]?>],
	 ['August', <?php echo $incidents[8]?>], // CSS-style declaration
	 ['September', <?php echo $incidents[9]?>],
	 ['October', <?php echo $incidents[10]?>], // CSS-style declaration
	 ['November', <?php echo $incidents[11]?>],
	 ['December', <?php echo $incidents[12]?>], // CSS-style declaration
      ]);
<?php

}
else if($type=="SITREP"){
?>

                //define columns
                dataTable.addColumn('string','Month');
                dataTable.addColumn('number', 'SITREP');


 
                //define rows of data
  dataTable.addRows([
         ['January', <?php echo $sitreps[1]?> ],            // RGB value
         ['February', <?php echo $sitreps[2]?>],            // English color name
         ['March', <?php echo $sitreps[3]?>],
	 ['April', <?php echo $sitreps[4]?>], 
	 ['May', <?php echo $sitreps[5]?>],
	 ['June', <?php echo $sitreps[6]?>], // 
	 ['July', <?php echo $sitreps[7]?>],
	 ['August', <?php echo $sitreps[8]?>], // CSS-style declaration
	 ['September', <?php echo $sitreps[9]?>],
	 ['October', <?php echo $sitreps[10]?>], // CSS-style declaration
	 ['November', <?php echo $sitreps[11]?>],
	 ['December', <?php echo $sitreps[12]?>], // CSS-style declaration
      ]);

<?php

}
?>
	  
 
                //instantiate our chart object
                var chart = new google.visualization.ColumnChart (document.getElementById('chart_div'));
 
                //define options for visualization
                var options = {width: 1000, height: 300, is3D: false, title: 'Risk Analysis'};
 
                //draw our chart
                chart.draw(dataTable, options);
 
            }
</script>