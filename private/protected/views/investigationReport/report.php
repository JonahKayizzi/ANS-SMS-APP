<?php
header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=".rand().".doc");
		header("Pragma: no-cache");
		header("Expires: 0");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class="container">
<h1><?php echo $model->title; ?></h1>
<?php
foreach ($model->reportFields as $field) {
?>

<h3><?php echo $field->name ?></h3>
	<p>
		<?php echo $field->description ?>
	</p>
<?php

}
?>
<h3>Recommendations</h3>
<p>
<?php
								$safety_recommendations = @SafetyRecommendations::model()->findAll("content_id = '{$model->incident_id}' and content_type = 6 and status = 1");
								echo "<ol>";
								if(!empty($safety_recommendations)){
									$k=1;
									foreach($safety_recommendations as $safety_recommendation){
										echo "<li>".$safety_recommendation->brief."</li>";
										$k++;
									}	
								}else{
									echo "<li>0 records found.</li>";
								}
								echo "</ol>";
								
								?></p>
</div>