<?php
/* @var $this SafetyRequirementsController */
/* @var $model SafetyRequirements */

$this->breadcrumbs=array(
	'Safety Requirements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SafetyRequirements', 'url'=>array('index')),
	array('label'=>'Manage SafetyRequirements', 'url'=>array('admin')),
);
?>

<b>Safety Requirements</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>