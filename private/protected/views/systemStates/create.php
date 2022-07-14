<?php
/* @var $this SystemStatesController */
/* @var $model SystemStates */

$this->breadcrumbs=array(
	'System States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SystemStates', 'url'=>array('index')),
	array('label'=>'Manage SystemStates', 'url'=>array('admin')),
);
?>

<b>System State</b><br /><i>An expression of the various conditions characterised by quantities or qualities in which the system can exist</i>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>