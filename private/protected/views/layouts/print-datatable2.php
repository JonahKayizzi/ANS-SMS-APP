<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datatables/dataTables.bootstrap.css">
</head>

<body>

<div style="width: 90%; margin: 0 auto;">

<?php echo $content; ?>

</div>
<script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->request->baseUrl; ?>/datatables/jquery-1.8.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	  $(function () {
		$("#review-schedule-table").DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": false
        });
	  });
	</script>
</body>
</html>
