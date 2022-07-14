<?php
/* @var $this UserGroupsController */
/* @var $model UserGroups */

$this->breadcrumbs=array(
	'User Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserGroups', 'url'=>array('index')),
	array('label'=>'Manage UserGroups', 'url'=>array('admin')),
);
?>

<h1>Create UserGroups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>