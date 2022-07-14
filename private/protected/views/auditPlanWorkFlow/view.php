<?php
/* @var $this AuditPlanWorkFlowController */
/* @var $model AuditPlanWorkFlow */

$this->breadcrumbs=array(
	'Audit Plan Work Flows'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AuditPlanWorkFlow', 'url'=>array('index')),
	array('label'=>'Create AuditPlanWorkFlow', 'url'=>array('create')),
	array('label'=>'Update AuditPlanWorkFlow', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuditPlanWorkFlow', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditPlanWorkFlow', 'url'=>array('admin')),
);
?>

<h1>View AuditPlanWorkFlow #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'audit_plan',
		'user',
		'status',
		'date',
	),
)); ?>
