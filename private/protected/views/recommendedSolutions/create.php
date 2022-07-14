<?php
/* @var $this RecommendedSolutionsController */
/* @var $model RecommendedSolutions */

$this->breadcrumbs=array(
	'Recommended Solutions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RecommendedSolutions', 'url'=>array('index')),
	array('label'=>'Manage RecommendedSolutions', 'url'=>array('admin')),
);
?>

<b>Recommended Solution</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>