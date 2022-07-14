<?php
/* @var $this CmAffectedAreasController */
/* @var $model CmAffectedAreas */

$this->breadcrumbs=array(
	'Cm Affected Areases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CmAffectedAreas', 'url'=>array('index')),
	array('label'=>'Create CmAffectedAreas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cm-affected-areas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Change Management Affected Areas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cm-affected-areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'change_management_id',
		'details',
		'modified',
		'status',
		'reported_by',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
