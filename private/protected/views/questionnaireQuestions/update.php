<?php
/* @var $this QuestionnaireQuestionsController */
/* @var $model QuestionnaireQuestions */

$this->breadcrumbs=array(
	'Questionnaire Questions'=>array('index'),
	$model->question_id=>array('view','id'=>$model->question_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestions', 'url'=>array('index')),
	array('label'=>'Create QuestionnaireQuestions', 'url'=>array('create')),
	array('label'=>'View QuestionnaireQuestions', 'url'=>array('view', 'id'=>$model->question_id)),
	array('label'=>'Manage QuestionnaireQuestions', 'url'=>array('admin')),
);
?>

<h1>Update QuestionnaireQuestions <?php echo $model->question_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>