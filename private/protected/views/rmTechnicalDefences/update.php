<?php
/* @var $this RmTechnicalDefencesController */
/* @var $model RmTechnicalDefences */

$this->breadcrumbs=array(
	'Rm Technical Defences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RmTechnicalDefences', 'url'=>array('index')),
	array('label'=>'Create RmTechnicalDefences', 'url'=>array('create')),
	array('label'=>'View RmTechnicalDefences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RmTechnicalDefences', 'url'=>array('admin')),
);
?>

<h1>Update RmTechnicalDefences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>