<?php
/* @var $this EvaluationAuditorsController */
/* @var $model EvaluationAuditors */

$this->breadcrumbs=array(
	'Evaluation Auditors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluationAuditors', 'url'=>array('index')),
	array('label'=>'Create EvaluationAuditors', 'url'=>array('create')),
	array('label'=>'View EvaluationAuditors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EvaluationAuditors', 'url'=>array('admin')),
);
?>

<h1>Update EvaluationAuditors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>