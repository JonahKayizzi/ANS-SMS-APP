<?php
/* @var $this RecommendedSolutionsController */
/* @var $model RecommendedSolutions */

$this->breadcrumbs=array(
	'Recommended Solutions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RecommendedSolutions', 'url'=>array('index')),
	array('label'=>'Create RecommendedSolutions', 'url'=>array('create')),
	array('label'=>'Update RecommendedSolutions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RecommendedSolutions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecommendedSolutions', 'url'=>array('admin')),
);
?>

<h1>View RecommendedSolutions #<?php echo $model->id; ?></h1>

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
