<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Incidents', 'url'=>array('index')),
	array('label'=>'Create Incidents', 'url'=>array('create')),
	array('label'=>'Update Incidents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Incidents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Incidents', 'url'=>array('admin')),
);
?>

<h1>View Incidents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'occurrence',
		'place',
		'time',
		'aircraft_registration',
		'operator',
		'departure_point',
		'persons_on_board',
		'date',
		'type_of_aircraft',
		'nationality',
		'owner',
		'destination',
		'injuries',
		'reported_by',
		'status',
		'modified',
	),
)); ?>
