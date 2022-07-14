<?php
/* @var $this EvidencesController */
/* @var $model Evidences */

$this->breadcrumbs=array(
	'Evidences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Evidences', 'url'=>array('index')),
	array('label'=>'Create Evidences', 'url'=>array('create')),
	array('label'=>'Update Evidences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Evidences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evidences', 'url'=>array('admin')),
);
?>

<h1>View Evidences #<?php echo $model->id; ?></h1>

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
