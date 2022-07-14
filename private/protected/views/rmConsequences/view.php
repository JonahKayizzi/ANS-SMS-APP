<?php
/* @var $this RmConsequencesController */
/* @var $model RmConsequences */

$this->breadcrumbs=array(
	'Rm Consequences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RmConsequences', 'url'=>array('index')),
	array('label'=>'Create RmConsequences', 'url'=>array('create')),
	array('label'=>'Update RmConsequences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RmConsequences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RmConsequences', 'url'=>array('admin')),
);
?>

<h1>View RmConsequences #<?php echo $model->id; ?></h1>

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
