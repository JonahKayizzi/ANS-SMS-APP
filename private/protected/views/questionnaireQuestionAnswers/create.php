<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $model QuestionnaireQuestionAnswers */

$this->breadcrumbs=array(
	'Questionnaire Question Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestionAnswers', 'url'=>array('index')),
	array('label'=>'Manage QuestionnaireQuestionAnswers', 'url'=>array('admin')),
);
?>

<h1>Create QuestionnaireQuestionAnswers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>