<?php
/* @var $this ExistingDefensesController */
/* @var $model ExistingDefenses */

$this->breadcrumbs=array(
	'Existing Defenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ExistingDefenses', 'url'=>array('index')),
	array('label'=>'Create ExistingDefenses', 'url'=>array('create')),
	array('label'=>'Update ExistingDefenses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExistingDefenses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExistingDefenses', 'url'=>array('admin')),
);
?>

<h1>View ExistingDefenses #<?php echo $model->id; ?></h1>

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
