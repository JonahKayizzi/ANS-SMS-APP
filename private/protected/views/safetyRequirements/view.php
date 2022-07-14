<?php
/* @var $this SafetyRequirementsController */
/* @var $model SafetyRequirements */

$this->breadcrumbs=array(
	'Safety Requirements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SafetyRequirements', 'url'=>array('index')),
	array('label'=>'Create SafetyRequirements', 'url'=>array('create')),
	array('label'=>'Update SafetyRequirements', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SafetyRequirements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SafetyRequirements', 'url'=>array('admin')),
);
?>

<h1>View SafetyRequirements #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mitigation',
		'time_frame',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
