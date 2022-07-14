<?php
/* @var $this InvestigationReportFieldsController */
/* @var $model InvestigationReportFields */

$this->breadcrumbs=array(
	'Investigation Report Fields'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InvestigationReportFields', 'url'=>array('index')),
	array('label'=>'Manage InvestigationReportFields', 'url'=>array('admin')),
);
?>

<h1>Create InvestigationReportFields</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>