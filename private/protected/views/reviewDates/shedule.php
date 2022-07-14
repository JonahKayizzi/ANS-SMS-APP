<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :800px;margin:auto">
	<div>
<h4>REVIEW SCHEDULE</h4>
	</div>


<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<td>ID</td>
		<td>OCCURENCE</td>
		<td>NEXT REVIEW DATE</td>
		<td>USER</td>
		</thead>
		<tbody>




		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$model,
			'itemView'=>'_sheduleview',
		)); ?>



		</tbody>
</table>

	</div>