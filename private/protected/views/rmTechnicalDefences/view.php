<?php
/* @var $this RmTechnicalDefencesController */
/* @var $model RmTechnicalDefences */

$this->breadcrumbs=array(
	'Rm Technical Defences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RmTechnicalDefences', 'url'=>array('index')),
	array('label'=>'Create RmTechnicalDefences', 'url'=>array('create')),
	array('label'=>'Update RmTechnicalDefences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RmTechnicalDefences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RmTechnicalDefences', 'url'=>array('admin')),
);
?>

<h1>View RmTechnicalDefences #<?php echo $model->id; ?></h1>

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
