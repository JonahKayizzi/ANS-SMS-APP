<?php
/* @var $this ConsequencesController */
/* @var $model Consequences */

$this->breadcrumbs=array(
	'Consequences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Consequences', 'url'=>array('index')),
	array('label'=>'Manage Consequences', 'url'=>array('admin')),
);
?>

<b>Description of consequences</b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>