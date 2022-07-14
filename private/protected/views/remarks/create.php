<?php
/* @var $this RemarksController */
/* @var $model Remarks */

$this->breadcrumbs=array(
	'Remarks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Remarks', 'url'=>array('index')),
	array('label'=>'Manage Remarks', 'url'=>array('admin')),
);
?>

<b>Remark</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>