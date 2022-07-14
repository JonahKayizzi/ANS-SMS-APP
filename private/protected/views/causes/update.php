<?php
/* @var $this CausesController */
/* @var $model Causes */

$this->breadcrumbs=array(
	'Causes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Causes', 'url'=>array('index')),
	array('label'=>'Create Causes', 'url'=>array('create')),
	array('label'=>'View Causes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Causes', 'url'=>array('admin')),
);
?>

<b>Causes</b><br /><i>The origin of the hazard</i>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>