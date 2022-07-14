<?php
/* @var $this EvaluationDateController */
/* @var $model EvaluationDate */

$this->breadcrumbs=array(
	'Evaluation Dates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EvaluationDate', 'url'=>array('index')),
	array('label'=>'Create EvaluationDate', 'url'=>array('create')),
	array('label'=>'Update EvaluationDate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EvaluationDate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaluationDate', 'url'=>array('admin')),
);
?>

<h1>View EvaluationDate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'type',
		'date_created',
	),
)); ?>
