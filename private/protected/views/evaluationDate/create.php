<?php
/* @var $this EvaluationDateController */
/* @var $model EvaluationDate */

$this->breadcrumbs=array(
	'Evaluation Dates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaluationDate', 'url'=>array('index')),
	array('label'=>'Manage EvaluationDate', 'url'=>array('admin')),
);
?>

<h1>Create EvaluationDate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>