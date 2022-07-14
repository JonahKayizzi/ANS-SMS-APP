<?php
/* @var $this AuditReportFieldsController */
/* @var $model AuditReportFields */

$this->breadcrumbs=array(
	'Audit Report Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AuditReportFields', 'url'=>array('index')),
	array('label'=>'Create AuditReportFields', 'url'=>array('create')),
	array('label'=>'Update AuditReportFields', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuditReportFields', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditReportFields', 'url'=>array('admin')),
);
?>

<h1>View AuditReportFields #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'report_id',
		'date',
	),
)); ?>
