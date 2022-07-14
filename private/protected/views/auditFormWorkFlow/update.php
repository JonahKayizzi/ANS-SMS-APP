<?php
/* @var $this AuditFormWorkFlowController */
/* @var $model AuditFormWorkFlow */

$this->breadcrumbs=array(
	'Audit Form Work Flows'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuditFormWorkFlow', 'url'=>array('index')),
	array('label'=>'Create AuditFormWorkFlow', 'url'=>array('create')),
	array('label'=>'View AuditFormWorkFlow', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AuditFormWorkFlow', 'url'=>array('admin')),
);
?>

<h1>Update AuditFormWorkFlow <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>