<?php
/* @var $this VerificationsController */
/* @var $model Verifications */

$this->breadcrumbs=array(
	'Verifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Verifications', 'url'=>array('index')),
	array('label'=>'Create Verifications', 'url'=>array('create')),
	array('label'=>'Update Verifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Verifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Verifications', 'url'=>array('admin')),
);
?>

<h1>View Verifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'verified_by',
		'note',
		'modified',
		'status',
		'incident_id',
	),
)); ?>
