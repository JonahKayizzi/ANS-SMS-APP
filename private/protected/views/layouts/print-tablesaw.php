
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/tablesaw/tablesaw.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/tablesaw/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/tablesaw/dependencies/jquery.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/tablesaw/tablesaw.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/tablesaw/tablesaw-init.js"></script>
	<script src="//filamentgroup.github.io/demo-head/loadfont.js"></script>
</head>
<body>
	<?php echo $content; ?>
	
</body>
</html>
