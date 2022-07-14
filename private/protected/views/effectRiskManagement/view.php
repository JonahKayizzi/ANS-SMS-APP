<?php
/* @var $this EffectRiskManagementController */
/* @var $model EffectRiskManagement */

$this->breadcrumbs=array(
	'Effect Risk Managements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EffectRiskManagement', 'url'=>array('index')),
	array('label'=>'Create EffectRiskManagement', 'url'=>array('create')),
	array('label'=>'Update EffectRiskManagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EffectRiskManagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EffectRiskManagement', 'url'=>array('admin')),
);
?>

<h1>View EffectRiskManagement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'severity',
		'severity_rationale',
		'likelihood',
		'likelihood_rationale',
		'modified',
		'status',
		'effects_id',
		'reported_by',
	),
)); ?>
