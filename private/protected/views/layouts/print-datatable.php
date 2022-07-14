<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css">

</head>

<body>

<div style="width: 90%; margin: 0 auto;">

<?php echo $content; ?>

</div>
<script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->request->baseUrl; ?>/datatables/jquery-1.8.2.min.js"></script>

</body>
</html>
