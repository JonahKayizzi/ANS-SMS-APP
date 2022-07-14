<?php
/* @var $this SafetyRequirementsController */
/* @var $model SafetyRequirements */

$this->breadcrumbs=array(
	'Safety Requirements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SafetyRequirements', 'url'=>array('index')),
	array('label'=>'Create SafetyRequirements', 'url'=>array('create')),
	array('label'=>'View SafetyRequirements', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SafetyRequirements', 'url'=>array('admin')),
);
?>
<b>Safety Requirements</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>