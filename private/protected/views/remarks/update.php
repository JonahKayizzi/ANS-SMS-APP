<?php
/* @var $this RemarksController */
/* @var $model Remarks */

$this->breadcrumbs=array(
	'Remarks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Remarks', 'url'=>array('index')),
	array('label'=>'Create Remarks', 'url'=>array('create')),
	array('label'=>'View Remarks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Remarks', 'url'=>array('admin')),
);
?>

<b>Remark <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>