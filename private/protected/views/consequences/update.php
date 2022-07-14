<?php
/* @var $this ConsequencesController */
/* @var $model Consequences */

$this->breadcrumbs=array(
	'Consequences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Consequences', 'url'=>array('index')),
	array('label'=>'Create Consequences', 'url'=>array('create')),
	array('label'=>'View Consequences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Consequences', 'url'=>array('admin')),
);
?>

<b>Description of consequences  <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>