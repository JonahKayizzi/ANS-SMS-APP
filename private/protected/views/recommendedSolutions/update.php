<?php
/* @var $this RecommendedSolutionsController */
/* @var $model RecommendedSolutions */

$this->breadcrumbs=array(
	'Recommended Solutions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecommendedSolutions', 'url'=>array('index')),
	array('label'=>'Create RecommendedSolutions', 'url'=>array('create')),
	array('label'=>'View RecommendedSolutions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RecommendedSolutions', 'url'=>array('admin')),
);
?>

<b>Recommended Solution <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>