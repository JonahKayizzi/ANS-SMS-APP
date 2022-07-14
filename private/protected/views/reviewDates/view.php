<?php
/* @var $this ReviewDatesController */
/* @var $model ReviewDates */

$this->breadcrumbs=array(
	'Review Dates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReviewDates', 'url'=>array('index')),
	array('label'=>'Create ReviewDates', 'url'=>array('create')),
	array('label'=>'Update ReviewDates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewDates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewDates', 'url'=>array('admin')),
);
?>

<h1>View ReviewDates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'review_date',
		'ocurrence',
	),
)); ?>
