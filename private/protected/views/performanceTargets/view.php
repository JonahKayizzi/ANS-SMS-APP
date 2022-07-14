<?php
/* @var $this PerformanceTargetsController */
/* @var $model PerformanceTargets */

$this->breadcrumbs=array(
	'Performance Targets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PerformanceTargets', 'url'=>array('index')),
	array('label'=>'Create PerformanceTargets', 'url'=>array('create')),
	array('label'=>'Update PerformanceTargets', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PerformanceTargets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PerformanceTargets', 'url'=>array('admin')),
);
?>

<h1>View PerformanceTargets #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'details',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
