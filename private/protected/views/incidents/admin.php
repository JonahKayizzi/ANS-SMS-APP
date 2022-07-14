<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	'Search for Incident',
);

$this->menu=array(
	array('label'=>'Report Incident', 'url'=>array('create')),
	array('label'=>'Search for Incident', 'url'=>array('admin')),
	array('label'=>'Show Incoming Incidents', 'url'=>array('index')),
	array('label'=>'Show Pending Incidents', 'url'=>array('index','status'=>2)),
	array('label'=>'Show Initiated Incidents', 'url'=>array('index','status'=>3)),
	array('label'=>'Show Monitored Incidents', 'url'=>array('index','status'=>4)),
	array('label'=>'Show Closed Incidents', 'url'=>array('index','status'=>5)),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#incidents-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search for Incident</h1>

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
	'id'=>'incidents-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'occurrence',
		'place',
		'date',
		'time',
		'reported_by',
		'modified',
		'main_category',
		'category',
		'status',
                array(
			'class'=>'CButtonColumn',
		),
	)
)); ?>
