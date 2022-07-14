<?php
/* @var $this EvalutaionAuditorsController */
/* @var $model EvalutaionAuditors */

$this->breadcrumbs=array(
	'Evalutaion Auditors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvalutaionAuditors', 'url'=>array('index')),
	array('label'=>'Manage EvalutaionAuditors', 'url'=>array('admin')),
);
?>

<h1>Create EvalutaionAuditors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>