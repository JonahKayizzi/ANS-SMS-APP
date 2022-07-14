<?php
/* @var $this EvaluationDateController */
/* @var $model EvaluationDate */

$this->breadcrumbs=array(
	'Evaluation Dates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluationDate', 'url'=>array('index')),
	array('label'=>'Create EvaluationDate', 'url'=>array('create')),
	array('label'=>'View EvaluationDate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EvaluationDate', 'url'=>array('admin')),
);
?>

<h1>Update EvaluationDate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>