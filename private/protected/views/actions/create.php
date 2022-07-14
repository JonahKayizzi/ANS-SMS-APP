<?php
/* @var $this ActionsController */
/* @var $model Actions */

$this->breadcrumbs=array(
	'Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Actions', 'url'=>array('index')),
	array('label'=>'Manage Actions', 'url'=>array('admin')),
);
?>

<b>Action to be taken</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>