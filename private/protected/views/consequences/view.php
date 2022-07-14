<?php
/* @var $this ConsequencesController */
/* @var $model Consequences */

$this->breadcrumbs=array(
	'Consequences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Consequences', 'url'=>array('index')),
	array('label'=>'Create Consequences', 'url'=>array('create')),
	array('label'=>'Update Consequences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Consequences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Consequences', 'url'=>array('admin')),
);
?>

<h1>View Consequences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
