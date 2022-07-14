<?php
/* @var $this AuditPlanFieldsController */
/* @var $model AuditPlanFields */

$this->breadcrumbs=array(
	'Audit Plan Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AuditPlanFields', 'url'=>array('index')),
	array('label'=>'Create AuditPlanFields', 'url'=>array('create')),
	array('label'=>'Update AuditPlanFields', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuditPlanFields', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditPlanFields', 'url'=>array('admin')),
);
?>

<h1>View AuditPlanFields #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'audit_plan_id',
		'date',
	),
)); ?>
