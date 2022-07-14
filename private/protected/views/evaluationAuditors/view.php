<?php
/* @var $this EvaluationAuditorsController */
/* @var $model EvaluationAuditors */

$this->breadcrumbs=array(
	'Evaluation Auditors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EvaluationAuditors', 'url'=>array('index')),
	array('label'=>'Create EvaluationAuditors', 'url'=>array('create')),
	array('label'=>'Update EvaluationAuditors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EvaluationAuditors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaluationAuditors', 'url'=>array('admin')),
);
?>

<h1>View EvaluationAuditors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_id',
		'station_id',
		'user_id',
		'date_created',
	),
)); ?>
