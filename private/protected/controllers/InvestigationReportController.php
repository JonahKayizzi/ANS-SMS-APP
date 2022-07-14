<?php

class InvestigationReportController extends Controller
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
				'users'=>array('@'), 'expression' => array('InvestigationReport','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('print'),
				'users'=>array('@'), 'expression' => array('InvestigationReport','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'expression' => array('Users','checkIfUserIsInvestigator'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('@'), 
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

		public function actionPrint($id)
	{
		$this->layout="//layouts/print";
		$this->render('report',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$msg = "";
		
		if(isset($_POST['safety_recommendation_details'])){
			$post = new SafetyRecommendations;
			$post->brief = $_POST['safety_recommendation_details'];
			$post->mitigation = $_POST['safety_recommendation_action_by'];
			$post->remarks = $_POST['safety_recommendation_remarks'];
			$post->reported_by = Yii::app()->user->name;
			$post->content_type = $_POST['safety_recommendation_content_type'];
			$post->content_id = $_POST['safety_recommendation_content_id'];
			
			if($post->save()){
				$msg = "Safety recommendation saved successfully.";
			}else{
				$msg = "Safety recommendation information was not saved, please provide mandatory fields (with *).";
			}
		}
		
		$this->layout='//layouts/main';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'msg'=>$msg,
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
		$model=new InvestigationReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InvestigationReport']))
		{
			$model->user=Yii::app()->user->getId();
			$model->attributes=$_POST['InvestigationReport'];
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
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InvestigationReport']))
		{
			
			$model->attributes=$_POST['InvestigationReport'];
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
		/* $dataProvider=new CActiveDataProvider('InvestigationReport');
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
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new InvestigationReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['InvestigationReport']))
			$model->attributes=$_GET['InvestigationReport'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return InvestigationReport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=InvestigationReport::model()->with('reportFields')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param InvestigationReport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='investigation-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
