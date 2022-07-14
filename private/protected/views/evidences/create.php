<?php
/* @var $this EvidencesController */
/* @var $model Evidences */

$this->breadcrumbs=array(
	'Evidences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Evidences', 'url'=>array('index')),
	array('label'=>'Manage Evidences', 'url'=>array('admin')),
);
?>

<b>Evidence of Existing Control</b><br /><i>The explanation of how existing controls were validated and verified</i>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>