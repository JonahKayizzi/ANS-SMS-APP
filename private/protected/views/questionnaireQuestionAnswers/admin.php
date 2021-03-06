<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $model QuestionnaireQuestionAnswers */

$this->breadcrumbs=array(
	'Questionnaire Question Answers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestionAnswers', 'url'=>array('index')),
	array('label'=>'Create QuestionnaireQuestionAnswers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#questionnaire-question-answers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Questionnaire Question Answers</h1>

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
	'id'=>'questionnaire-question-answers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'questionnaire_id',
		'question_id',
		'status_of_implementation',
		'action_required',
		'id',
		'answer',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
