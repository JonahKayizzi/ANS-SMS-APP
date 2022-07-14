<?php
class QuestionnaireController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('@'), 'expression' => array('Questionnaire','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','fill', 'print'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','fill'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}
	
	public function actionPrint($id)
	{
		$this->layout='//layouts/print';

		$sql = "SELECT COUNT(*) as `count` , answer  FROM questionnaire_question_answers where questionnaire_id ='{$id}' GROUP BY answer ";
		$command = Yii::app()->db->createCommand($sql);
		$summary = $command->queryAll();

	
	
	$questions = QuestionnaireQuestions::model()->findAll();
		$this->render('print',array(
			'model'=>$this->loadModel($id),
                        'questions' => $questions ,
                        'summary'=>$summary
                        

		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';

		$sql = "SELECT COUNT(*) as `count` , answer  FROM questionnaire_question_answers where questionnaire_id ='{$id}' GROUP BY answer ";
		$command = Yii::app()->db->createCommand($sql);
		$summary = $command->queryAll();

	
	
	$questions = QuestionnaireQuestions::model()->findAll();
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'questions' => $questions ,
                        'summary'=>$summary
                        

		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Questionnaire;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Questionnaire']))
		{
			$model->attributes=$_POST['Questionnaire'];
			$model->submitted_by=Yii::app()->user->getId();
			$model->date_created=date('Y-m-d');
			if($model->save())
				$this->redirect(array('fill','id'=>$model->questionnaire_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Questionnaire']))
		{
			$model->attributes=$_POST['Questionnaire'];
			$model->submitted_by=Yii::app()->user->getId();
			$model->date_created=date('Y-m-d');
			if($model->save())
				/* $this->redirect(array('view','id'=>$model->questionnaire_id)); */
				$this->redirect(array('fill','id'=>$model->questionnaire_id, 'form_status'=>'UPDATE'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$dataProvider=new CActiveDataProvider('Questionnaire');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Questionnaire('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Questionnaire']))
			$model->attributes=$_GET['Questionnaire'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Questionnaire the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Questionnaire::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Questionnaire $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='questionnaire-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function questionairreEditTrail($id, $action){
		$model = new QuestionnaireEditTrail;
		$model->questionnaire_id = $id;
		$model->action = $action;
		$model->user=Yii::app()->user->getId();
		$model->save();
	}

        public function actionFill($id){
			Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
            if(isset($_POST['Questionnaire'])){
				if(isset($_POST['Questionnaire']['form_status'])){
					if($_POST['Questionnaire']['form_status'] == 'UPDATE'){
						//update questionnnaire
						$i = 1;
						$question_answers = @QuestionnaireQuestionAnswers::model()->findAll("questionnaire_id = '{$id}'");
						
						if(!empty($question_answers)){
							foreach($question_answers as $question_answer){
								
								$qnAswer = @QuestionnaireQuestionAnswers::model()->find('questionnaire_id=:questionnaire_id and question_id=:question_id', array(':questionnaire_id'=>$id, ':question_id'=>$i));
								
								
								$qnAswer->status_of_implementation = $_POST[$i]['status_of_implementation'];
								/* $qnAswer->action_required = $_POST[$i]['action_required']; */
								$qnAswer->answer = $_POST[$i]['answer'];
								
								$qnAswer->save();
								
								$i++;
							}
							@$this->questionairreEditTrail($id, 'UPDATED');
							
						}else{
							$questions = QuestionnaireQuestions::model()->findAll();
							foreach($questions as $question){
								
								$qnAswer = new QuestionnaireQuestionAnswers();
								$answers = $_POST[$i];
								$answers['question_id'] = $i;
								$answers['questionnaire_id'] = $id;
								
								$qnAswer->attributes= $answers;
								$qnAswer->save();
								
								$i++;
							}		
							@$this->questionairreEditTrail($id, 'CREATED');
						}
							
					}
					
				}else{
					$k = 1;
					$i = 1;
					$questions = QuestionnaireQuestions::model()->findAll();
					foreach($questions as $question){
						$qnAswer = new QuestionnaireQuestionAnswers();
						$answers = $_POST[$i];
						$answers['question_id'] = $i;
						$answers['questionnaire_id'] = $id;
						
						$qnAswer->attributes= $answers;
						$qnAswer->save();
						
						$k++;
						$i++;
					}
					@$this->questionairreEditTrail($id, 'CREATED');					
				}
				
                
				$this->redirect(array('view','id'=>$id));
				
			}
		else{
	        $this->layout = '//layouts/print';
			$questions = @QuestionnaireQuestions::model()->findAll();
			$question_answers = @QuestionnaireQuestionAnswers::model()->findAll("questionnaire_id = '{$id}'");
			$this->render('fill',array(
				'questions'=>$questions,
				'question_answers'=>$question_answers,
				'questionnaire_id'=>$id,
			));
		}
		
	}
}