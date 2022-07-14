<?php
/* @var $this FurtherActionsController */
/* @var $model FurtherActions */

$this->breadcrumbs=array(
	'Further Actions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FurtherActions', 'url'=>array('index')),
	array('label'=>'Create FurtherActions', 'url'=>array('create')),
	array('label'=>'Update FurtherActions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FurtherActions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FurtherActions', 'url'=>array('admin')),
);
?>

<h1>View FurtherActions #<?php echo $model->id; ?></h1>

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
