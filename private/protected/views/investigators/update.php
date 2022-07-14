<?php
/* @var $this InvestigatorsController */
/* @var $model Investigators */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Investigators', 'url'=>array('index')),
	array('label'=>'Create Investigators', 'url'=>array('create')),
	array('label'=>'View Investigators', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Investigators', 'url'=>array('admin')),
);
?>

<b>Investigator <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>