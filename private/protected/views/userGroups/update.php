<?php
/* @var $this UserGroupsController */
/* @var $model UserGroups */

$this->breadcrumbs=array(
	'User Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserGroups', 'url'=>array('index')),
	array('label'=>'Create UserGroups', 'url'=>array('create')),
	array('label'=>'View UserGroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserGroups', 'url'=>array('admin')),
);
?>

<h1>Update UserGroups <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>