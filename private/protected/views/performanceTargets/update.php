<?php
/* @var $this PerformanceTargetsController */
/* @var $model PerformanceTargets */

$this->breadcrumbs=array(
	'Performance Targets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PerformanceTargets', 'url'=>array('index')),
	array('label'=>'Create PerformanceTargets', 'url'=>array('create')),
	array('label'=>'View PerformanceTargets', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PerformanceTargets', 'url'=>array('admin')),
);
?>

<b>Performance Targets</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>