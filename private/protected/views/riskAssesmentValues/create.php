<?php
/* @var $this RiskAssesmentValuesController */
/* @var $model RiskAssesmentValues */

$this->breadcrumbs=array(
	'Risk Assesment Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RiskAssesmentValues', 'url'=>array('index')),
	array('label'=>'Manage RiskAssesmentValues', 'url'=>array('admin')),
);
?>

<h1>Create RiskAssesmentValues</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>