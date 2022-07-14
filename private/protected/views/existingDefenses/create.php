<?php
/* @var $this ExistingDefensesController */
/* @var $model ExistingDefenses */

$this->breadcrumbs=array(
	'Existing Defenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExistingDefenses', 'url'=>array('index')),
	array('label'=>'Manage ExistingDefenses', 'url'=>array('admin')),
);
?>

<b>Current/existing defences to control safety risks</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>