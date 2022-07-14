<?php
/* @var $this EffectsController */
/* @var $model Effects */

$this->breadcrumbs=array(
	'Effects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Effects', 'url'=>array('index')),
	array('label'=>'Create Effects', 'url'=>array('create')),
	array('label'=>'View Effects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Effects', 'url'=>array('admin')),
);
?>

<b>Effects</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>