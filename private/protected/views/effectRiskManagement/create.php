<?php
/* @var $this EffectRiskManagementController */
/* @var $model EffectRiskManagement */

$this->breadcrumbs=array(
	'Effect Risk Managements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EffectRiskManagement', 'url'=>array('index')),
	array('label'=>'Manage EffectRiskManagement', 'url'=>array('admin')),
);
?>

<h1>Create EffectRiskManagement</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>