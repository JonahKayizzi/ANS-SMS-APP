<?php
/* @var $this PerformanceTargetsController */
/* @var $model PerformanceTargets */

$this->breadcrumbs=array(
	'Performance Targets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PerformanceTargets', 'url'=>array('index')),
	array('label'=>'Manage PerformanceTargets', 'url'=>array('admin')),
);
?>

<b>Performance Targets</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>