<?php
/* @var $this EffectRiskManagementController */
/* @var $model EffectRiskManagement */

$this->breadcrumbs=array(
	'Effect Risk Managements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EffectRiskManagement', 'url'=>array('index')),
	array('label'=>'Create EffectRiskManagement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#effect-risk-management-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Effect Risk Managements</h1>

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
	'id'=>'effect-risk-management-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'severity',
		'severity_rationale',
		'likelihood',
		'likelihood_rationale',
		'modified',
		/*
		'status',
		'effects_id',
		'reported_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
