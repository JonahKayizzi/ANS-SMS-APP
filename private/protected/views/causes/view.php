<?php
/* @var $this CausesController */
/* @var $model Causes */

$this->breadcrumbs=array(
	'Causes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Causes', 'url'=>array('index')),
	array('label'=>'Create Causes', 'url'=>array('create')),
	array('label'=>'Update Causes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Causes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Causes', 'url'=>array('admin')),
);
?>

<h1>View Causes #<?php echo $model->id; ?></h1>

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
