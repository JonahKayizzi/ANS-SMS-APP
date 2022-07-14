<?php
/* @var $this MonitoringActivitiesController */
/* @var $model MonitoringActivities */

$this->breadcrumbs=array(
	'Monitoring Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MonitoringActivities', 'url'=>array('index')),
	array('label'=>'Manage MonitoringActivities', 'url'=>array('admin')),
);
?>

<b>Monitoring activities</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>