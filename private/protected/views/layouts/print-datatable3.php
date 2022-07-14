<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
</head>

<body>

<div style="width: 90%; margin: 0 auto;">

<?php echo $content; ?>

</div>

<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
  $(function () {
	$("#form-123-report").DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		dom: 'Bfrtip',
		buttons: [
			'excel', {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
				header: false,
				title: 'Form 123',
            }
		]
	});
	$("#lessons-learnt-report").DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		dom: 'Bfrtip',
		buttons: [
			'excel', {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
				header: false,
				title: 'Lessons Learnt'
            }
		]
	});
  });
</script>
</body>
</html>
