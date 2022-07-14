<?php

class LessonsLearntController extends Controller
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
				'actions'=>array('view','report'),
				'users'=>array('@'), 
				/* 'expression' => array('LessonsLearnt','checkIfUserIsCurrentRecordViewer'), */
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
				'actions'=>array('delete'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}
	
	public function actionReport()
	{
		$this->layout="//layouts/print-datatable3";
		/* $model=LessonsLearnt::model()->with('user_relation')->findAll(); */
		$model=LessonsLearnt::model()->findAll();
		$search_result = null;
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$st_dt = date('Y-m-d', strtotime($st_dt. ' - 1 days'));
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$directorate = $_POST['directorate'];
			$category = $_POST['category'];
			$sr_category = $_POST['sr_category'];
			
			$search_result = $_POST['search_result'];
			
			if($directorate == "All"){
				$directorate_search = "";
			}else{
				$directorate_search = "and Divission = '{$directorate}'";
			}
			
			if($category == "All"){
				$category_search = "";
			}else{
				$category_search = "and category = '{$category}'";
			}
			
			if($sr_category == "All"){
				$sr_category_search = "";
			}else{
				$sr_category_search = "and source_type = '{$sr_category}'";
			}
			
			$model=LessonsLearnt::model()->findAll("date_reported between '{$st_dt}' and '{$end_dt}' {$directorate_search} {$category_search} {$sr_category_search}");
			
			$search = 1;
		}else{
			$year = date('Y');
			$month = date('m');
			$st_dt = $year.'-'.$month.'-'.'01';
			$end_dt = date('Y-m-d');
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$model=LessonsLearnt::model()->findAll("date_reported between '{$st_dt}' and '{$end_dt}'");
			$search = 0;
		}
		
		$this->render('report',array(
			'model'=>$model,
			'search'=>$search,
			'st_dt'=>$st_dt,
			'end_dt'=>$end_dt,
			'search_result'=>$search_result,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 4);
		Yii::app()->user->setState('m_2', 0);
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
		Yii::app()->user->setState('m_1', 4);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new LessonsLearnt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LessonsLearnt']))
		{
			$model->attributes=$_POST['LessonsLearnt'];
			if($model->save()){
				$department = $_POST['LessonsLearnt']['sent_to'];
				
				$subject="MSMS LESSON LEARNT";
				$body = "LESSON LEARNT: <P>{$model->Description}</P> SOURCE TYPE: <P>{$model->source_type}</P> SOURCE DETAIL: <P>{$model->source_detail}</P> SAFETY CONCERN: <P>{$model->safety_concern}</P> DIRECTORATE: <P>{$model->Divission}</P> CATEGORY: <P>{$model->category}</P> SUB CATEGORY: <P>{$model->sub_category}</P> COST IMPLICATION: <P>{$model->cost}</P>";
				
				$send_list = @Users::model()->findAll("user_department_id = '{$department}' and status = 1");
				
				@Notifications::model()->sendGroupEmails($send_list, $subject, $body);
				
				if($_POST['LessonsLearnt']['send_to_individual'] != ""){
					$emails = explode(",",$_POST['LessonsLearnt']['send_to_individual']);
					foreach($emails as $email){
						@Notifications::model()->sendEmail($email, $subject, $body);
					}
				}
				$this->redirect(array('view','id'=>$model->id));
			}
				
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function sendAutoMail($department, $lesson_learnt, $source_type, $source_detail, $safety_concern, $Divission, $category, $sub_category, $cost){
		$client_info = @Users::model()->findAll("user_department_id = '{$department}' and status = 1");
		foreach($client_info as $row){
			$client_email_address = $row->email;
			$client_username = $row->username;
			$client_name = $row->name;
			
			$this->processAutoMail($client_name, $client_email_address, $client_username, $lesson_learnt, $source_type, $source_detail, $safety_concern, $Divission, $category, $sub_category, $cost);
		}
	}
	
	public function processAutoMail($client_name, $client_email_address, $client_username, $lesson_learnt, $source_type, $source_detail, $safety_concern, $Divission, $category, $sub_category, $cost){
		$from = "smsdans@caa.co.ug";
		$name=$client_name;
		
		$subject="MSMS LESSON LEARNT";
		$headers="From: MSMS <{$from}>\r\n".
			"MIME-Version: 1.0\r\n".
			"Content-Type: text/plain; charset=UTF-8";
		$body = "LESSON LEARNT: {$lesson_learnt} \r\n SOURCE TYPE: {$source_type} \r\n SOURCE DETAIL: {$source_detail} \r\n SAFETY CONCERN: {$safety_concern} \r\n DIVISION: {$Divission} \r\n CATEGORY: {$category} \r\n SUB CATEGORY: {$sub_category} \r\n COST IMPLICATION: {$cost} \r\n";
			
		@mail("{$client_email_address}",$subject,$body,$headers);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::app()->user->setState('m_1', 4);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LessonsLearnt']))
		{
			$model->attributes=$_POST['LessonsLearnt'];
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
		Yii::app()->user->setState('m_1', 4);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$dataProvider=new CActiveDataProvider('LessonsLearnt');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->user->setState('m_1', 4);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new LessonsLearnt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LessonsLearnt']))
			$model->attributes=$_GET['LessonsLearnt'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LessonsLearnt the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LessonsLearnt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LessonsLearnt $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lessons-learnt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
