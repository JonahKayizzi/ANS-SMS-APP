<?php
/* @var $this ActionsController */
/* @var $model Actions */

$this->breadcrumbs=array(
	'Actions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Actions', 'url'=>array('index')),
	array('label'=>'Create Actions', 'url'=>array('create')),
	array('label'=>'View Actions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Actions', 'url'=>array('admin')),
);
?>

<b>Action to be taken <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>