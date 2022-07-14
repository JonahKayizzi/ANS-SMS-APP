<?php
/* @var $this EvaluationAuditorsController */
/* @var $model EvaluationAuditors */

$this->breadcrumbs=array(
	'Evaluation Auditors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaluationAuditors', 'url'=>array('index')),
	array('label'=>'Manage EvaluationAuditors', 'url'=>array('admin')),
);
?>

<h1>Create EvaluationAuditors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>