<?php
/* @var $this IncidentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Incidents',
);

$this->menu=array(
	array('label'=>'Report Incident', 'url'=>array('create')),
	array('label'=>'Search for Incident', 'url'=>array('search')),
	array('label'=>'Show Incoming Incidents', 'url'=>array('index')),
	array('label'=>'Show Pending Incidents', 'url'=>array('index','status'=>2)),
	array('label'=>'Show Initiated Incidents', 'url'=>array('index','status'=>3)),
	array('label'=>'Show Monitored Incidents', 'url'=>array('index','status'=>4)),
	array('label'=>'Show Closed Incidents', 'url'=>array('index','status'=>5)),
	
);
?>

<h1>Search for Incident</h1>

<table width="100%">
	<tr>
		<td width="20%"><b>ID</b></td>
		<td></td>
	</tr>
</table>