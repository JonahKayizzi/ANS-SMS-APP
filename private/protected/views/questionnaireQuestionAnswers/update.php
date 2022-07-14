<?php
/* @var $this QuestionnaireQuestionAnswersController */
/* @var $model QuestionnaireQuestionAnswers */

$this->breadcrumbs=array(
	'Questionnaire Question Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionnaireQuestionAnswers', 'url'=>array('index')),
	array('label'=>'Create QuestionnaireQuestionAnswers', 'url'=>array('create')),
	array('label'=>'View QuestionnaireQuestionAnswers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuestionnaireQuestionAnswers', 'url'=>array('admin')),
);
?>

<h1>Update QuestionnaireQuestionAnswers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>