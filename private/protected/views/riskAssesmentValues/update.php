<?php
/* @var $this RiskAssesmentValuesController */
/* @var $model RiskAssesmentValues */

$this->breadcrumbs=array(
	'Risk Assesment Values'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RiskAssesmentValues', 'url'=>array('index')),
	array('label'=>'Create RiskAssesmentValues', 'url'=>array('create')),
	array('label'=>'View RiskAssesmentValues', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RiskAssesmentValues', 'url'=>array('admin')),
);
?>

<h1>Update RiskAssesmentValues <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>