<?php
/* @var $this InvestigationReportFieldsController */
/* @var $model InvestigationReportFields */

$this->breadcrumbs=array(
	'Investigation Report Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List InvestigationReportFields', 'url'=>array('index')),
	array('label'=>'Create InvestigationReportFields', 'url'=>array('create')),
	array('label'=>'Update InvestigationReportFields', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InvestigationReportFields', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InvestigationReportFields', 'url'=>array('admin')),
);
?>

<h1>View InvestigationReportFields #<?php echo $model->id; ?></h1>

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
