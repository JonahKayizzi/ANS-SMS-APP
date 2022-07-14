<?php
/* @var $this QuestionnaireQuestionsController */
/* @var $model QuestionnaireQuestions */

$this->breadcrumbs=array(
	'Questionnaire Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestions', 'url'=>array('index')),
	array('label'=>'Manage QuestionnaireQuestions', 'url'=>array('admin')),
);
?>

<h1>Create QuestionnaireQuestions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>