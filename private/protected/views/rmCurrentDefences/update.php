<?php
/* @var $this RmCurrentDefencesController */
/* @var $model RmCurrentDefences */

$this->breadcrumbs=array(
	'Rm Current Defences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RmCurrentDefences', 'url'=>array('index')),
	array('label'=>'Create RmCurrentDefences', 'url'=>array('create')),
	array('label'=>'View RmCurrentDefences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RmCurrentDefences', 'url'=>array('admin')),
);
?>

<h1>Update RmCurrentDefences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>