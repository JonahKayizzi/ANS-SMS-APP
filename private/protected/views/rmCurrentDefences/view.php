<?php
/* @var $this RmCurrentDefencesController */
/* @var $model RmCurrentDefences */

$this->breadcrumbs=array(
	'Rm Current Defences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RmCurrentDefences', 'url'=>array('index')),
	array('label'=>'Create RmCurrentDefences', 'url'=>array('create')),
	array('label'=>'Update RmCurrentDefences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RmCurrentDefences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RmCurrentDefences', 'url'=>array('admin')),
);
?>

<h1>View RmCurrentDefences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'details',
		'modified',
		'reported_by',
		'status',
		'risk_management_id',
	),
)); ?>
