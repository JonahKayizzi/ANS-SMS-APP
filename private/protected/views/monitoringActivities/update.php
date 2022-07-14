<?php
/* @var $this MonitoringActivitiesController */
/* @var $model MonitoringActivities */

$this->breadcrumbs=array(
	'Monitoring Activities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MonitoringActivities', 'url'=>array('index')),
	array('label'=>'Create MonitoringActivities', 'url'=>array('create')),
	array('label'=>'View MonitoringActivities', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MonitoringActivities', 'url'=>array('admin')),
);
?>

<b>Monitoring activities</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>