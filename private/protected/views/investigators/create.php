<?php
/* @var $this InvestigatorsController */
/* @var $model Investigators */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Investigators', 'url'=>array('index')),
	array('label'=>'Manage Investigators', 'url'=>array('admin')),
);
?>

<b>Investigator</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>