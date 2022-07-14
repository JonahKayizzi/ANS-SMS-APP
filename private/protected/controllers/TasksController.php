<?php

class TasksController extends Controller
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
				'users'=>array('@'), 'expression' => array('Tasks','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete', 'form121', 'form122'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 3);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		if(isset($_POST['task-step-description'])){
			$post = new TaskSteps;
			$post->description = $_POST['task-step-description'];
			$post->details = $_POST['task-step-details'];
			$post->task_id = $_POST['task_id'];
			$post->reported_by = Yii::app()->user->name;
			if(!$post->save())
				echo "<div style='padding: 4px; color: #fff; background-color: red;' >The submitted information was not saved. Please try again.</div>";
		}
		
		 if(isset($_POST['task-step-hazard-details'])){
			
			if($_POST['task-step-hazard-details'] != ""){
				$post_a = new TaskStepHazards;
				$post_a->details = $_POST['task-step-hazard-details'];	
				$post_a->task_step_id = $_POST['task_step_id'];
				$post_a->reported_by = Yii::app()->user->name;
				if($post_a->save());
			}
			
			
			
			if($_POST['task-step-hazard-control-details'] != ""){
				$post_b = new TaskStepHazardControls;
				$post_b->details = $_POST['task-step-hazard-control-details'];	
				$post_b->task_step_id = $_POST['task_step_id'];
				$post_b->reported_by = Yii::app()->user->name;
				if($post_b->save());
			}
			
			
			
			if($_POST['task-step-comment-details'] != ""){
				$post_c = new TaskStepComments;
				$post_c->details = $_POST['task-step-comment-details'];
				$post_c->task_step_id = $_POST['task_step_id'];
				$post_c->reported_by = Yii::app()->user->name;	
				if($post_c->save());				
			}
			
		}
		
		
		/* if(isset($_POST['task-step-hazard-details'])){
			$post = new TaskStepHazards;
			$post->details = $_POST['task-step-hazard-details'];
			$post->task_step_id = $_POST['task_step_id'];
			$post->reported_by = Yii::app()->user->name;
			if(!$post->save())
				echo "<div style='padding: 4px; color: #fff; background-color: red;' >The submitted information was not saved. Please try again.</div>";
		}
		
		if(isset($_POST['task-step-hazard-control-details'])){
			$post = new TaskStepHazardControls;
			$post->details = $_POST['task-step-hazard-control-details'];
			$post->task_step_id = $_POST['task_step_id'];
			$post->reported_by = Yii::app()->user->name;
			if(!$post->save())
				echo "<div style='padding: 4px; color: #fff; background-color: red;' >The submitted information was not saved. Please try again.</div>";
		}
		
		if(isset($_POST['task-step-comment-details'])){
			$post = new TaskStepComments;
			$post->details = $_POST['task-step-comment-details'];
			$post->task_step_id = $_POST['task_step_id'];
			$post->reported_by = Yii::app()->user->name;
			if(!$post->save())
				echo "<div style='padding: 4px; color: #fff; background-color: red;' >The submitted information was not saved. Please try again.</div>";
		} */
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->user->setState('m_1', 3);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Tasks;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		/* $this->render('create',array(
			'model'=>$model,
		)); */
		
		//redirect to change management form to follow procedure
		$this->redirect(array('/changeManagement/create', 'from_tasks'=>'1'));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::app()->user->setState('m_1', 3);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		/* $this->render('update',array(
			'model'=>$model,
		)); */
		
		//redirect to change management form to follow procedure
		$this->redirect(array('/changeManagement/update', 'id'=>$model->change_management_id, 'from_tasks'=>'1'));
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
		/* $dataProvider=new CActiveDataProvider('Tasks');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */
		
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->user->setState('m_1', 3);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Tasks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tasks']))
			$model->attributes=$_GET['Tasks'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tasks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tasks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tasks $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tasks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionForm121($id)
	{
		$this->layout='//layouts/print';
		
		$this->render('form121',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionForm122($id)
	{
		$this->layout='//layouts/print';
		
		$this->render('form122',array(
			'model'=>$this->loadModel($id),
		));
	}
}
