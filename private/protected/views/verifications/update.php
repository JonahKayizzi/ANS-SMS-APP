<?php
/* @var $this VerificationsController */
/* @var $model Verifications */

$this->breadcrumbs=array(
	'Verifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Verifications', 'url'=>array('index')),
	array('label'=>'Create Verifications', 'url'=>array('create')),
	array('label'=>'View Verifications', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Verifications', 'url'=>array('admin')),
);
?>

<b>Verified by  <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>