<?php
/* @var $this IncidentsController */
/* @var $dataProvider CActiveDataProvider */

?>
<?php if(isset($_GET['assigned'])){$assigned = $_GET['assigned'];}else{$assigned = NULL;} ?>
<?php if(isset($_GET['category'])){$category = $_GET['category'];}else{$category = NULL;} ?>
<?php if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = NULL;} ?>
<?php if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = NULL;} ?>

<h1><?php if($status != NULL){$status = @Status::model()->findByPk($_GET['status']); echo @$status->name;}else{echo "INCOMING";} ?> <?php if($main_category != NULL){echo $_GET['main_category'];}else{echo "Occurrence";} ?>(s)</h1>


<div >

<table width="100%" >
	
		<tr class="sms_thead" style="background-color: #ccc;" >
			<th>ID</th>
			<th  >NO.</th>
			<th  >Occurrence</th>
			<th>Place/Location</th>
			<!-- <th><?php /* echo CHtml::link('Time', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'time')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Aircraft Registration', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'aircraft_registration')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Operator', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'operator')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Departure Point', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'departure_point')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Persons on Board', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'persons_on_board')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Date', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'date')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Type of Aircraft', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'type_of_aircraft')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Nationality', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'nationality')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Owner', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'owner')); */ ?></th> -->
			<!-- <th><?php /* echo CHtml::link('Destination', array('/incidents/index', 'status'=>$_GET['status'], 'category'=>$category, 'Incidents_sort'=>'destination')); */ ?></th> -->
			<th>Injuries</th>
			<th>Reported By</th>
			<th>Reported On</th>
			<th>Type</th>
			<th>Category</th>
			<th>Status</th>
		</tr>
		<!-- <tr class="filters" > -->
			<!-- <td><input name="Incidents[id]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[occurrence]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[place]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[time]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[aircraft_registration]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[operator]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[departure_point]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[persons_on_board]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[date]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[type_of_aircraft]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[nationality]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[owner]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[destination]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[injuries]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[reported_by]" value="" type="text"></input></td> -->
			<!-- <td><input name="Incidents[modified]" value="" type="text"></input></td>  -->
			<!-- <td></td>  -->
			<!-- <td></td>  -->
			<!-- <td></td>  -->
			<!-- <td></td>  -->
		<!-- </tr> -->
	
	<tbody>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</tbody>
</table>

</div>
