<?php

class SafetyLogsCausesController extends Controller
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
				'users'=>array('@'), 'expression' => array('SafetyLogsCauses','checkIfUserIsCurrentRecordViewer'),
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
				'actions'=>array('delete', 'totals'),
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
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
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
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new SafetyLogsCauses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SafetyLogsCauses']))
		{
			$model->attributes=$_POST['SafetyLogsCauses'];
			$model->user = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SafetyLogsCauses']))
		{
			$model->attributes=$_POST['SafetyLogsCauses'];
			$model->user = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$dataProvider=new CActiveDataProvider('SafetyLogsCauses');
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
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		 $this->layout='//layouts/main';
		$model=new SafetyLogsCauses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SafetyLogsCauses']))
			$model->attributes=$_GET['SafetyLogsCauses'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SafetyLogsCauses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SafetyLogsCauses::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SafetyLogsCauses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='safety-logs-causes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotals(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		$this->layout='//layouts/main';
		$causes = @SafetyLogsCauses::model()->findAll();
		
		$this->render('totals',array(
			'causes'=>$causes,
			'start_date'=>$start_date,
			'end_date'=>$end_date,
		));
	}
}
