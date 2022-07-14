<?php

class IncidentsController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionView($id)
	{
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
		$model=new Incidents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidents']))
		{
			$model->attributes=$_POST['Incidents'];
			$category = $_POST['Incidents']['main_category'];
			$sub_category = $_POST['Incidents']['category'];
			$incident_category = $_POST['Incidents']['incident_category'];
			$model->time = $_POST['Incidents']['time_hr'].':'.$_POST['Incidents']['time_min'];
			$model->date_reported = date("Y-m-d");
			$model->reported_by_id = @Yii::app()->user->id;
			
			$a = '';
			$b = '';
			$y = date('y', strtotime($model->date));
			$number = '';
			
			if($category == 'Incident'){
				$a = 'INC';
				if($incident_category == 'Workplace'){
					$b = 'W';
				}
				if($incident_category == 'Aircraft'){
					$b = 'A';
				}
				$number = $a.'/'.$b.'-'.$model->id.'/'.$y;
			}
			
			if($category == 'Issue'){
				$a = 'ISSUE';
				$number = $a.'-'.$model->id.'/'.$y;
			}
			
			if($category == 'Hazard'){
				$a = 'HZD';
				if($sub_category == 'OSHE'){
					$b = 'OSH';
				}
				if($sub_category == 'Aviation'){
					$b = 'AV';
				}
				$number = $a.'/'.$b.'-'.$model->id.'/'.$y;
			}
			
			$model->number = $number;
			
			if($model->save()){
				$this->redirect(array('create', 'category'=>$category, 'save'=>1));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidents']))
		{
			$model->attributes=$_POST['Incidents'];
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
		/* $dataProvider=new CActiveDataProvider('Incidents');
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
		$model=new Incidents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Incidents']))
			$model->attributes=$_GET['Incidents'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Incidents the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Incidents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Incidents $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='incidents-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function sendAutoMail($occurrence){
		$client_info = @Users::model()->findAll("category = 'sitrep' and status = 1");
		foreach($client_info as $row){
			$client_email_address = $row->email;
			$client_username = $row->username;
			$client_name = $row->name;
			
			$this->processAutoMail($client_name, $client_email_address, $client_username, $occurrence);
		}
	}
	
	public function processAutoMail($client_name, $client_email_address, $client_username, $occurrence){
		$from = "admin";
		$name=$client_name;
		
		$subject="SITREP REPORTED";
		$headers="From: SYSTEM <{$from}>\r\n".
			"MIME-Version: 1.0\r\n".
			"Content-Type: text/plain; charset=UTF-8";
		$body = "A new SITREP of ID: {$occurrence} has been reported. ";
			
		@mail("{$client_email_address}",$subject,$body,$headers);
	}
	
	
}
