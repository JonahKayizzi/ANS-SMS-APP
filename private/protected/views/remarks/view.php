<?php
/* @var $this RemarksController */
/* @var $model Remarks */

$this->breadcrumbs=array(
	'Remarks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Remarks', 'url'=>array('index')),
	array('label'=>'Create Remarks', 'url'=>array('create')),
	array('label'=>'Update Remarks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Remarks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Remarks', 'url'=>array('admin')),
);
?>

<h1>View Remarks #<?php echo $model->id; ?></h1>

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
