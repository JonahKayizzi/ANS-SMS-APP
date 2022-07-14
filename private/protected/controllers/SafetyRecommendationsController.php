<?php

class SafetyRecommendationsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='//layouts/popup';
	public $layout="//layouts/column2";

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
				'users'=>array('@'), 'expression' => array('SafetyRecommendations','checkIfUserIsCurrentRecordViewer'),
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
				'actions'=>array('create','update','form123create','report', 'reviewschedule'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$msg = "";
		$msg_error = "";
		
		$this->layout='//layouts/main';
		
		$model = $this->loadModel($id);
		
		if(isset($_GET['sr_close'])){
			if(@SafetyRecommendations::model()->updateByPk($_GET['sr_close'], array('open_close'=>1, 'date_closed'=>date('Y-m-d')))){
				
				$msg = "Safety Requirement #{$_GET['sr_close']} has been closed.";
			}		
		}
		
		$NextReviewDate = new SafetyRequirementsNextReviewDates;
		if(isset($_POST['SafetyRequirementsNextReviewDates']))
		{
			$NextReviewDate->attributes=$_POST['SafetyRequirementsNextReviewDates'];
			if($NextReviewDate->save()){
				$this->redirect(array('view', 'id'=>$id));
			}
		}
		
		$ReviewDate = new SafetyRequirementsReviewDates;
		if(isset($_POST['SafetyRequirementsReviewDates']))
		{
			$ReviewDate->attributes=$_POST['SafetyRequirementsReviewDates'];
			if($ReviewDate->save()){
				$this->redirect(array('view', 'id'=>$id));
			}
		}
		
		if(isset($_POST['action'])){
			if($_POST['action'] == ""){
				$msg_error = "Details cannot be empty.";
			}else{
				$post = new ActionsSafetyRecommendations;
				$post->details = $_POST['action'];
				//$post->deadline = $_POST['deadline'];
				$post->date_action_taken = $_POST['date_action_taken'];
				$post->accepted = 'NO';
				$post->comment = $_POST['comment'];
				$post->sr_id = $_POST['sr_id'];
				$post->reported_by = Yii::app()->user->name;
				
				$user_info = @Users::model()->findByPk($model->owner_id);
				$user_info_admin = "sms-dans@caa.co.ug";
				if($post->save()){
					
					$subject = "{$model->source_category} Implementation";
					$body = "An implementation #{$post->id} has been submitted on {$model->source_category} safety recommendation #{$model->id}";
					$notification_subject = $subject;
					$notification_description = "An implementation #{$post->id} has been submitted on {$model->source_category} safety recommendation #{$model->id}";
					@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
					@Notifications::model()->sendEmail($user_info_admin, $subject, $body);
					@Notifications::model()->sendNotification($notification_subject, $notification_description, $user_info->id, 'PRIVATE', 1);
					
					$msg = "Safety Recommendation Implementation successfully saved.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}
			
				
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'msg'=>$msg,
			'msg_error'=>$msg_error,
			'NextReviewDate'=>$NextReviewDate,
			'ReviewDate'=>$ReviewDate,
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
		$model=new SafetyRecommendations;
		
		if(isset($_POST['main_control'])){
			if(!empty($_POST['main_control'])){
				$main_control = new TypesOfControlsMain;
				$main_control->name = $_POST['main_control'];
				$main_control->save();
			}
			
		}
		
		if(isset($_POST['sub_control'])){
			if(!empty($_POST['sub_control'])){
				$main_control = new TypesOfControlsSub;
				$main_control->main_id = $_POST['main_control_id'];
				$main_control->name = $_POST['sub_control'];
				$main_control->save();
			}
			
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SafetyRecommendations']))
		{
			
			$model->attributes=$_POST['SafetyRecommendations'];
			$model->source_category = $_POST['SafetyRecommendations']['source'];
			$model->type_of_control = $_POST['SafetyRecommendations']['type_of_control'];
			$model->content_type = 7;
			$model->reported_by = Yii::app()->user->name;
			$model->current_user_id = $_POST['SafetyRecommendations']['action_by'];
			$model->owner_id = Yii::app()->user->id;
			$model->date_assigned = date('Y-m-d');
			$user_info = @Users::model()->findByPk($_POST['SafetyRecommendations']['action_by']);
			if($model->save()){
				$subject = "URGENT!! {$model->source_category} Safety Recommendation";
				$body = "You have been assigned to take action on {$model->source_category} safety recommendation #{$model->id}";
				$notification_subject = $subject;
				$notification_description = "You have been assigned to take action on {$model->source_category} safety recommendation #{$model->id}";
				@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
				@Notifications::model()->sendNotification($notification_subject, $notification_description, $user_info->id, 'PRIVATE', 1);
				
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionForm123create()
{
    $model=new SafetyRecommendations;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='safety-recommendations-form123create-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['SafetyRecommendations']))
    {
        $model->attributes=$_POST['SafetyRecommendations'];
        $model->reported_by=Yii::app()->user->id;
		
		
		
        if($model->validate())
        {

        	$model->save();
            
			
			
             $this->redirect(array('view','id'=>$model->id)); 
        }
    }
    $this->render('form123create',array('model'=>$model));
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

		if(isset($_POST['SafetyRecommendations']))
		{
			$model->attributes=$_POST['SafetyRecommendations'];
			$model->reported_by = Yii::app()->user->name;
			if($model->save())
				/* $this->redirect(array('view','id'=>$model->id)); */
				$this->redirect(array('view','id'=>$model->id));
		}

		/* $this->render('form123create',array(
			'model'=>$model,
		)); */
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
		/* $dataProvider=new CActiveDataProvider('SafetyRecommendations');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */
		$this->redirect(array('admin'));
	}
	public function actionReport()
	{
		$this->layout="//layouts/print-datatable3";
		/* $model=SafetyRecommendations::model()->with('user_relation')->findAll(); */
		$model=SafetyRecommendations::model()->findAll();
		$search_result = null;
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$st_dt = date('Y-m-d', strtotime($st_dt. ' - 1 days'));
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$priority = $_POST['priority'];
			$type_of_control = $_POST['type_of_control'];
			$officer = $_POST['officer'];
			$sr_category = $_POST['sr_category'];
			$search_status = $_POST['search_status'];
			
			$search_result = $_POST['search_result'];
			
			$user_department = $_POST['user_department'];
			
			if($priority == "All"){
				$priority_search = "";
			}else{
				$priority_search = "and priority = '{$priority}'";
			}
			
			if($type_of_control == "All"){
				$type_of_control_search = "";
			}else{
				$type_of_control_search = "and type_of_control = '{$type_of_control}'";
			}
			
			if($officer == 0){
				$officer_search = "";
			}else{
				$officer_search = "and action_by = {$officer}";
			}
			
			if($user_department == 0){
				$user_department_search = "";
			}else{
				$user_department_search = "and action_by in (select id from users where user_department_id = {$user_department})";
			}
			
			if($search_status == 2){
				$status_search = "";
			}else{
				$status_search = "and open_close = {$search_status}";
			}
			
			if($sr_category == "All"){
				$sr_category_search = "";
			}else{
				$sr_category_search = "and source_category = '{$sr_category}'";
			}
			
			$model=SafetyRecommendations::model()->findAll("modified between '{$st_dt}' and '{$end_dt}' {$priority_search} {$officer_search} {$sr_category_search} {$status_search} {$user_department_search} {$type_of_control_search}");
			
			$search = 1;
		}else{
			$year = date('Y');
			$month = date('m');
			$st_dt = $year.'-'.$month.'-'.'01';
			$end_dt = date('Y-m-d');
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$model=SafetyRecommendations::model()->findAll("modified between '{$st_dt}' and '{$end_dt}'");
			$search = 0;
		}
		
		$this->render('form123report',array(
			'model'=>$model,
			'search'=>$search,
			'st_dt'=>$st_dt,
			'end_dt'=>$end_dt,
			'search_result'=>$search_result,
		));
	}
	
	public function actionReviewSchedule()
	{
		$this->layout="//layouts/print-datatable2";
		/* $model=SafetyRecommendations::model()->with('user_relation')->findAll(); */
		$model=SafetyRecommendations::model()->findAll();
		$search_result = null;
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$st_dt = date('Y-m-d', strtotime($st_dt. ' - 1 days'));
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$priority = $_POST['priority'];
			$officer = $_POST['officer'];
			$sr_category = $_POST['sr_category'];
			
			$search_result = $_POST['search_result'];
			
			if($priority == "All"){
				$priority_search = "";
			}else{
				$priority_search = "and priority = '{$priority}'";
			}
			
			if($officer == 0){
				$officer_search = "";
			}else{
				$officer_search = "and action_by = {$officer}";
			}
			
			if($sr_category == "All"){
				$sr_category_search = "";
			}else{
				$sr_category_search = "and source_category = '{$sr_category}'";
			}
			
			$model=SafetyRecommendations::model()->findAll("modified between '{$st_dt}' and '{$end_dt}' {$priority_search} {$officer_search} {$sr_category_search}");
			
			$search = 1;
		}else{
			$year = date('Y');
			$month = date('m');
			$st_dt = $year.'-'.$month.'-'.'01';
			$end_dt = date('Y-m-d');
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));
			$model=SafetyRecommendations::model()->findAll("modified between '{$st_dt}' and '{$end_dt}'");
			$search = 0;
		}
		
		$this->render('review-schedule',array(
			'model'=>$model,
			'search'=>$search,
			'st_dt'=>$st_dt,
			'end_dt'=>$end_dt,
			'search_result'=>$search_result,
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
		$model=new SafetyRecommendations;
		// $model->reported_by=Yii:app()->user->id;
		
		if(isset($_GET['SafetyRecommendations'])){
			$model->unsetAttributes();  // clear any default values
			$model->attributes=$_GET['SafetyRecommendations'];
		}
			

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SafetyRecommendations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SafetyRecommendations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SafetyRecommendations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='safety-recommendations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}