<?php
/* @var $this SeverityController */
/* @var $model Severity */

$this->breadcrumbs=array(
	'Severities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Severity', 'url'=>array('index')),
	array('label'=>'Create Severity', 'url'=>array('create')),
	array('label'=>'View Severity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Severity', 'url'=>array('admin')),
);
?>

<b>Severity</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>