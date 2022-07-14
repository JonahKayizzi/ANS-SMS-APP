<?php

class AuditFormWorkFlowController extends Controller
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
				'users'=>array('@'), 'expression' => array('AuditFormWorkFlow','checkIfUserIsCurrentRecordViewer'),
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
				'actions'=>array('create','update','print'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','print'),
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
	{     $success = $_GET['success'];

		$this->render('view',array(
			'model'=>$this->loadModel($id),'success'=>$success,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AuditFormWorkFlow;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AuditFormWorkFlow']))
		{
			$model->attributes=$_POST['AuditFormWorkFlow'];
$model->status = 1;
date_default_timezone_set('Africa/Nairobi');
$model->date = date('Y-m-d H:i:s');
			if($model->save()){
				$user = Users::model()->findByPk($model->user);
				$notification_model= new Notifications();
				$notification_model->user=$user->id;
				$notification_model->user_from=Yii::app()->user->getId();
				$notification_model->subject="Fowared Curf";
                               
				$notification_model->description= $user->name." Fowarded You a document. Issue No.".$model->audit_form."  <a href ='index.php?r=auditForm/print&issue_no=".$model->audit_form."'>view</a> or <a href ='index.php?r=auditForm/update&id=".$model->audit_form."'>edit</a>";
				$notification_model->status="sent";
				if($notification_model->save()){

				   $this->redirect(array('auditForm/view','id'=>$model->audit_form, 'success'=>'1'));
				
				}
				else{
				print_r($notification_model->getErrors());


				}
				//$this->redirect(array('view','id'=>$model->id));
				}
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
	public function actionUpdate($id )
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AuditFormWorkFlow']))
		{
			$model->attributes=$_POST['AuditFormWorkFlow'];
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
		/* $dataProvider=new CActiveDataProvider('AuditFormWorkFlow');
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
		$model=new AuditFormWorkFlow('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AuditFormWorkFlow']))
			$model->attributes=$_GET['AuditFormWorkFlow'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AuditFormWorkFlow the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AuditFormWorkFlow::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AuditFormWorkFlow $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='audit-form-work-flow-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}