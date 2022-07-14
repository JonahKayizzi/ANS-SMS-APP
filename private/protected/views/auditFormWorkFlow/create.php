<?php
/* @var $this AuditFormWorkFlowController */
/* @var $model AuditFormWorkFlow */

$this->breadcrumbs=array(
	'Audit Form Work Flows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditFormWorkFlow', 'url'=>array('index')),
	array('label'=>'Manage AuditFormWorkFlow', 'url'=>array('admin')),
);
?>

<h1>Create AuditFormWorkFlow</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>