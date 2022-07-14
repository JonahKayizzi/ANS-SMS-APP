<?php
/* @var $this DutyControllersController */
/* @var $model DutyControllers */

$this->breadcrumbs=array(
	'Duty Controllers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DutyControllers', 'url'=>array('index')),
	array('label'=>'Create DutyControllers', 'url'=>array('create')),
	array('label'=>'Update DutyControllers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DutyControllers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DutyControllers', 'url'=>array('admin')),
);
?>

<h1>View DutyControllers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sod_id',
		'incident_id',
		'name',
		'place',
		'x',
		'y',
		'z',
		'modified',
		'status',
	),
)); ?>
