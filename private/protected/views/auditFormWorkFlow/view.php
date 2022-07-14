<?php
/* @var $this AuditFormWorkFlowController */
/* @var $model AuditFormWorkFlow */

$this->breadcrumbs=array(
	'Audit Form Work Flows'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AuditFormWorkFlow', 'url'=>array('index')),
	array('label'=>'Create AuditFormWorkFlow', 'url'=>array('create')),
	array('label'=>'Update AuditFormWorkFlow', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuditFormWorkFlow', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditFormWorkFlow', 'url'=>array('admin')),
);
?>

<h1>View AuditFormWorkFlow #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'audit_form',
		'user',
		'status',
		'date',
	),
)); ?>
