<?php
/* @var $this ExistingDefensesController */
/* @var $model ExistingDefenses */

$this->breadcrumbs=array(
	'Existing Defenses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExistingDefenses', 'url'=>array('index')),
	array('label'=>'Create ExistingDefenses', 'url'=>array('create')),
	array('label'=>'View ExistingDefenses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExistingDefenses', 'url'=>array('admin')),
);
?>

<b>Current/existing defences to control safety risks <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>