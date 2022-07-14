<?php
/* @var $this SystemStatesController */
/* @var $model SystemStates */

$this->breadcrumbs=array(
	'System States'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SystemStates', 'url'=>array('index')),
	array('label'=>'Create SystemStates', 'url'=>array('create')),
	array('label'=>'Update SystemStates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SystemStates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SystemStates', 'url'=>array('admin')),
);
?>

<h1>View SystemStates #<?php echo $model->id; ?></h1>

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
