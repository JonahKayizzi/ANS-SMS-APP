<?php
/* @var $this VerificationsController */
/* @var $model Verifications */

$this->breadcrumbs=array(
	'Verifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Verifications', 'url'=>array('index')),
	array('label'=>'Manage Verifications', 'url'=>array('admin')),
);
?>

<b>Verified by </b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>