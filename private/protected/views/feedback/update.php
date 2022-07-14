<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feedback', 'url'=>array('index')),
	array('label'=>'Create Feedback', 'url'=>array('create')),
	array('label'=>'View Feedback', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Feedback', 'url'=>array('admin')),
);
?>

<b>Feedback on action taken <?php /* echo $model->id; */ ?></b>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>