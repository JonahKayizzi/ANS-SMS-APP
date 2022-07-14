<?php
/* @var $this FurtherActionsController */
/* @var $model FurtherActions */

$this->breadcrumbs=array(
	'Further Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FurtherActions', 'url'=>array('index')),
	array('label'=>'Manage FurtherActions', 'url'=>array('admin')),
);
?>

<b>Further actions to reduce the risks</b><br /><i>Technical, Administrative, Defences, Training etc.</i>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>