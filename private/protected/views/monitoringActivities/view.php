<?php
/* @var $this MonitoringActivitiesController */
/* @var $model MonitoringActivities */

$this->breadcrumbs=array(
	'Monitoring Activities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MonitoringActivities', 'url'=>array('index')),
	array('label'=>'Create MonitoringActivities', 'url'=>array('create')),
	array('label'=>'Update MonitoringActivities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MonitoringActivities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MonitoringActivities', 'url'=>array('admin')),
);
?>

<h1>View MonitoringActivities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'monitoring_activity',
		'frequency',
		'duration',
		'substitute_risk',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
