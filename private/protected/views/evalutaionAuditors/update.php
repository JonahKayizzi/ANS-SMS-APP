<?php
/* @var $this EvalutaionAuditorsController */
/* @var $model EvalutaionAuditors */

$this->breadcrumbs=array(
	'Evalutaion Auditors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvalutaionAuditors', 'url'=>array('index')),
	array('label'=>'Create EvalutaionAuditors', 'url'=>array('create')),
	array('label'=>'View EvalutaionAuditors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EvalutaionAuditors', 'url'=>array('admin')),
);
?>

<h1>Update EvalutaionAuditors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>