<?php
/* @var $this ReviewDatesController */
/* @var $model ReviewDates */

$this->breadcrumbs=array(
	'Review Dates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewDates', 'url'=>array('index')),
	array('label'=>'Create ReviewDates', 'url'=>array('create')),
	array('label'=>'View ReviewDates', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewDates', 'url'=>array('admin')),
);
?>

<b>Review Dates </b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>