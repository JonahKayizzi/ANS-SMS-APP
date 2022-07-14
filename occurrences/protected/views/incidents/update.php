<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Incidents', 'url'=>array('index')),
	array('label'=>'Create Incidents', 'url'=>array('create')),
	array('label'=>'View Incidents', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Incidents', 'url'=>array('admin')),
);
?>

<h1>Update Incidents <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>