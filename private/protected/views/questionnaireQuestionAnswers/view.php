<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $model QuestionnaireQuestionAnswers */

$this->breadcrumbs=array(
	'Questionnaire Question Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestionAnswers', 'url'=>array('index')),
	array('label'=>'Create QuestionnaireQuestionAnswers', 'url'=>array('create')),
	array('label'=>'Update QuestionnaireQuestionAnswers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuestionnaireQuestionAnswers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionnaireQuestionAnswers', 'url'=>array('admin')),
);
?>

<h1>View QuestionnaireQuestionAnswers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'questionnaire_id',
		'question_id',
		'status_of_implementation',
		'action_required',
		'id',
		'answer',
	),
)); ?>
