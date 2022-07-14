<?php
/* @var $this DutyControllersController */
/* @var $model DutyControllers */

$this->breadcrumbs=array(
	'Duty Controllers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DutyControllers', 'url'=>array('index')),
	array('label'=>'Create DutyControllers', 'url'=>array('create')),
	array('label'=>'View DutyControllers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DutyControllers', 'url'=>array('admin')),
);
?>

<h1>Update DutyControllers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>