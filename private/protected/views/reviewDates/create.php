<?php
/* @var $this ReviewDatesController */
/* @var $model ReviewDates */

$this->breadcrumbs=array(
	'Review Dates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewDates', 'url'=>array('index')),
	array('label'=>'Manage ReviewDates', 'url'=>array('admin')),
);
?>

<h1>Create ReviewDates</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>