<?php
/* @var $this EvalutaionAuditorsController */
/* @var $model EvalutaionAuditors */

$this->breadcrumbs=array(
	'Evalutaion Auditors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EvalutaionAuditors', 'url'=>array('index')),
	array('label'=>'Create EvalutaionAuditors', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evalutaion-auditors-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Evalutaion Auditors</h1>

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
	'id'=>'evalutaion-auditors-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date_id',
		'station_id',
		'user_id',
		'date_created',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
