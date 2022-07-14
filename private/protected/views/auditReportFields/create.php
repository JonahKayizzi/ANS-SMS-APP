<?php
/* @var $this AuditReportFieldsController */
/* @var $model AuditReportFields */

$this->breadcrumbs=array(
	'Audit Report Fields'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditReportFields', 'url'=>array('index')),
	array('label'=>'Manage AuditReportFields', 'url'=>array('admin')),
);
?>

<h1>Create AuditReportFields</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>