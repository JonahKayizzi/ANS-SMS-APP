<?php
/* @var $this AuditPlanWorkFlowController */
/* @var $model AuditPlanWorkFlow */

$this->breadcrumbs=array(
	'Audit Plan Work Flows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditPlanWorkFlow', 'url'=>array('index')),
	array('label'=>'Manage AuditPlanWorkFlow', 'url'=>array('admin')),
);
?>

<h1>Create AuditPlanWorkFlow</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>