<?php
/* @var $this EffectRiskManagementController */
/* @var $model EffectRiskManagement */

$this->breadcrumbs=array(
	'Effect Risk Managements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EffectRiskManagement', 'url'=>array('index')),
	array('label'=>'Create EffectRiskManagement', 'url'=>array('create')),
	array('label'=>'View EffectRiskManagement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EffectRiskManagement', 'url'=>array('admin')),
);
?>

<h1>Update EffectRiskManagement <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>