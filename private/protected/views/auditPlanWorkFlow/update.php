<?php
/* @var $this AuditPlanWorkFlowController */
/* @var $model AuditPlanWorkFlow */

$this->breadcrumbs=array(
	'Audit Plan Work Flows'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuditPlanWorkFlow', 'url'=>array('index')),
	array('label'=>'Create AuditPlanWorkFlow', 'url'=>array('create')),
	array('label'=>'View AuditPlanWorkFlow', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AuditPlanWorkFlow', 'url'=>array('admin')),
);
?>

<h1>Update AuditPlanWorkFlow <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>