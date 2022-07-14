<?php
/* @var $this RmConsequencesController */
/* @var $model RmConsequences */

$this->breadcrumbs=array(
	'Rm Consequences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RmConsequences', 'url'=>array('index')),
	array('label'=>'Create RmConsequences', 'url'=>array('create')),
	array('label'=>'View RmConsequences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RmConsequences', 'url'=>array('admin')),
);
?>

<h1>Update RmConsequences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>