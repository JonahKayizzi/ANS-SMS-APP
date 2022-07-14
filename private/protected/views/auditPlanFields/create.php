<?php
/* @var $this AuditPlanFieldsController */
/* @var $model AuditPlanFields */

$this->breadcrumbs=array(
	'Audit Plan Fields'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditPlanFields', 'url'=>array('index')),
	array('label'=>'Manage AuditPlanFields', 'url'=>array('admin')),
);
?>

<h1>Create AuditPlanFields</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>