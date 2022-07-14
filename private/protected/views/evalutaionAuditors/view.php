<?php
/* @var $this EvalutaionAuditorsController */
/* @var $model EvalutaionAuditors */

$this->breadcrumbs=array(
	'Evalutaion Auditors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EvalutaionAuditors', 'url'=>array('index')),
	array('label'=>'Create EvalutaionAuditors', 'url'=>array('create')),
	array('label'=>'Update EvalutaionAuditors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EvalutaionAuditors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvalutaionAuditors', 'url'=>array('admin')),
);
?>

<h1>View EvalutaionAuditors #<?php echo $model->id; ?></h1>

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
