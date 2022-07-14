<?php
/* @var $this QuestionnaireQuestionsController */
/* @var $model QuestionnaireQuestions */

$this->breadcrumbs=array(
	'Questionnaire Questions'=>array('index'),
	$model->question_id,
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestions', 'url'=>array('index')),
	array('label'=>'Create QuestionnaireQuestions', 'url'=>array('create')),
	array('label'=>'Update QuestionnaireQuestions', 'url'=>array('update', 'id'=>$model->question_id)),
	array('label'=>'Delete QuestionnaireQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->question_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionnaireQuestions', 'url'=>array('admin')),
);
?>

<h1>View QuestionnaireQuestions #<?php echo $model->question_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'question_id',
		'question',
		'section',
		'question_no',
	),
)); ?>
