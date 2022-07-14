<?php
/* @var $this RiskAssesmentValuesController */
/* @var $model RiskAssesmentValues */

$this->breadcrumbs=array(
	'Risk Assesment Values'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List RiskAssesmentValues', 'url'=>array('index')),
	array('label'=>'Create RiskAssesmentValues', 'url'=>array('create')),
	array('label'=>'Update RiskAssesmentValues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RiskAssesmentValues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RiskAssesmentValues', 'url'=>array('admin')),
);
?>

<h1>View RiskAssesmentValues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'value',
	),
)); ?>
