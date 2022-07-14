<?php
/* @var $this SeverityController */
/* @var $model Severity */

$this->breadcrumbs=array(
	'Severities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Severity', 'url'=>array('index')),
	array('label'=>'Create Severity', 'url'=>array('create')),
	array('label'=>'Update Severity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Severity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Severity', 'url'=>array('admin')),
);
?>

<h1>View Severity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'severity',
		'severity_rationale',
		'likelihood',
		'likelihood_rationale',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
