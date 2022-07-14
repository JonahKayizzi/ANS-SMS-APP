    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <h1>Risk Analysis Graph </h1> <form style="margin: 0; padding: 0;">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'incidents-form',
        'method' => 'get',
  'htmlOptions'=>array(
       'style'=>'display:inline!important;',
'action'=>'incidents/riskanalysiscat&year=2015'
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
<option>select</option>
<option>oshe</option>
<option>aviation</option>
<option>minor</option>
<option>serious</option>
<option>other</option>
<option>none</option>
</select>
<?php echo CHtml::submitButton('Submit' ); ?>


<?php $this->endWidget(); ?>
<?php
//get month names
$months = array();
for ($i = 0; $i < 13; $i++) {
    $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
    $months[date('n', $timestamp)] = date('F', $timestamp);
}

?>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['months',<?php
          //loop through iccedent types

          foreach ($model as $key=>$value ) {
            ?>
            '<?php echo $key ?>',
            <?php
          } ?>],
          <?php
          for($i = 0; $i<12; $i++){
            //get every incident value for every month
          ?>['<?php echo $months[$i+1] ?>', <?php

            foreach ($model as $key=>$value ) {
            ?>
            <?php echo $value[$i+1] ?>,
            <?php
          } ?>],

     <?php
      }
      ?>
        ]);

        var options = {
          title: 'Risk Analysis',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

        <div id="curve_chart" style="height:300px"></div>