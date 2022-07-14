<?php
/* @var $this SafetyOccurrenceDataController */
/* @var $model SafetyOccurrenceData */

$this->breadcrumbs=array(
	'Safety Occurrence Datas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SafetyOccurrenceData', 'url'=>array('index')),
	array('label'=>'Create SafetyOccurrenceData', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#safety-occurrence-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Safety Occurrence Datas</h1>

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
	'id'=>'safety-occurrence-data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'incident_id',
		'date_of_occurrence',
		'time_of_occurrence',
		'shift',
		'duration_of_shift',
		/*
		'time_dc_logged_on_duty',
		'time_dc_logged_off_duty',
		'time_dc_reported_on_duty',
		'time_dc_reported_off_duty',
		'no_of_personnel_on_shift_roster',
		'no_of_personnel_on_shift_logbook',
		'density_of_traffic',
		'no_of_trainees_on_shift',
		'traffic_handled_by_trainee',
		'controller_under_medication',
		'date_from_last_annual_leave',
		'last_training_attended',
		'last_training_date',
		'last_proficiency_date',
		'weather_information',
		'aerodrome_information',
		'controllers_on_duty',
		'completed_by',
		'modified',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
