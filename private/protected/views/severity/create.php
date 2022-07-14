<?php
/* @var $this SeverityController */
/* @var $model Severity */

$this->breadcrumbs=array(
	'Severities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Severity', 'url'=>array('index')),
	array('label'=>'Manage Severity', 'url'=>array('admin')),
);
?>

<b>Severity</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>