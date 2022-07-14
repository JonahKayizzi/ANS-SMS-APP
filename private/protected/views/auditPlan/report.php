<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class="container">
<h1><?php echo $model->title?></h1>
<?php
foreach ($model->auditPlanFields as $field) {
?>

<h3><?php echo $field->name ?></h3>
	<p>
		<?php echo $field->description ?>
	</p>
<?php

}
?>
</div>