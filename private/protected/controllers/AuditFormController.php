<?php

class AuditFormController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAuditor'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('@'), 'expression' => array('AuditForm','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','print'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAuditor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','print','print2'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAuditor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
	 
	 public function actionPrint2($id){
		$model = $this->loadModel($id); 
		$this->layout='//layouts/print';
		
         
		$this->render('print',array(
			'model'=>$this->loadModel($id)
		));
		
	 }

	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 3);
		Yii::app()->user->setState('m_3', 0);
		
		$msg = "";
		$msg_error = "";
		
		$model = $this->loadModel($id);
		
		if(isset($_GET['accept_action'])){
			if(@ActionsAuditForm::model()->updateByPk($_GET['accept_action'], array('accepted'=>'YES'))){
				
				$msg = "CAP implementaion #{$_GET['accept_action']} has been accepted.";
				
			}
		}
		if(isset($_GET['reject_action'])){
			if(@ActionsAuditForm::model()->updateByPk($_GET['reject_action'], array('accepted'=>'NO'))){
				$msg = "CAP implementaion #{$_GET['reject_action']} has been rejected.";
			}
		}
		if(isset($_GET['sr_close'])){
			if(@AuditForm::model()->updateByPk($_GET['sr_close'], array('open_close'=>1))){
				
				if(@SafetyRecommendations::model()->updateAll(array('open_close'=>1, 'date_closed'=>date('Y-m-d')), "content_type=5 and content_id = ".$_GET['sr_close'])){
					$msg = "CAP #{$_GET['sr_close']} has been closed.";
				}
			}		
		}
		
		$NextReviewDate = new SafetyRequirementsNextReviewDates;
		if(isset($_POST['SafetyRequirementsNextReviewDates']))
		{
			$NextReviewDate->attributes=$_POST['SafetyRequirementsNextReviewDates'];
			if($NextReviewDate->save()){
				//$this->redirect(array('view', 'id'=>$id));
				$msg = "Next review date saved successfully.";
			}
		}
		
		$ReviewDate = new SafetyRequirementsReviewDates;
		if(isset($_POST['SafetyRequirementsReviewDates']))
		{
			$ReviewDate->attributes=$_POST['SafetyRequirementsReviewDates'];
			if($ReviewDate->save()){
				//$this->redirect(array('view', 'id'=>$id));
				$msg = "Date reviewed saved successfully.";
			}
		}
		
		if(isset($_POST['action'])){
			$post = new ActionsAuditForm;
			$post->details = $_POST['action'];
			//$post->deadline = $_POST['deadline'];
			$post->date_action_taken = $_POST['date_action_taken'];
			$post->accepted = 'NO';
			$post->comment = $_POST['comment'];
			$post->audit_form_id = $_POST['audit_form_id'];
			$post->reported_by = Yii::app()->user->name;
			
			$user_info = @Users::model()->findByPk($model->user_id);
			$user_info_admin = "sms-dans@caa.co.ug";
			if($post->save()){
				
				$subject = "CAP Implementation";
				$body = "CAP implementation #{$post->id} has been submitted on CAP #{$model->issue_no}";
				$notification_subject = $subject;
				$notification_description = "CAP implementation #{$post->id} has been submitted on CAP #{$model->issue_no}";
				@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
				@Notifications::model()->sendEmail($user_info_admin, $subject, $body);
				@Notifications::model()->sendNotification($notification_subject, $notification_description, $user_info->id, 'PRIVATE', 1);
					
				$msg = "CAP Implementation successfully saved.";
			}else{
				$msg_error = "Something went wrong. Please try again.";
			}
				
		}
		if(isset($_POST['AuditForm']['root_cause_analysis_of_non_conformance'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['root_cause_analysis_of_non_conformance'];
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('root_cause_analysis_of_non_conformance'=>$root_cause))){
					//update safety recommendations info
					@SafetyRecommendations::model()->updateAll(array('causes'=>$root_cause), "content_type=5 and content_id = {$audit_form_id}");
					$msg = "Root cause analysis saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		if(isset($_POST['AuditForm']['suggested_corrective_action'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['suggested_corrective_action'];
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('suggested_corrective_action'=>$root_cause))){
					@SafetyRecommendations::model()->updateAll(array('mitigation'=>$root_cause, 'brief'=>$root_cause), "content_type=5 and content_id = {$audit_form_id}");
					$msg = "Suggested corrective action saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		if(isset($_POST['AuditForm']['proposed_date_of_realisation'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['proposed_date_of_realisation'];
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('proposed_date_of_realisation'=>$root_cause))){
					@SafetyRecommendations::model()->updateAll(array('deadline'=>$root_cause), "content_type=5 and content_id = {$audit_form_id}");
					$msg = "Proposed date of realisation saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		if(isset($_POST['AuditForm']['priority'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['priority'];
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('priority'=>$root_cause))){
					@SafetyRecommendations::model()->updateAll(array('priority'=>$root_cause), "content_type=5 and content_id = {$audit_form_id}");
					$msg = "Priority saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		if(isset($_POST['AuditForm']['verification_of_proof'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['verification_of_proof'];
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('verification_of_proof'=>$root_cause))){
					$msg = "Verification of proof saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		if(isset($_POST['AuditForm']['lead_auditors_comments'])){
			$audit_form_id = $_POST['AuditForm']['issue_no'];
			$root_cause = $_POST['AuditForm']['lead_auditors_comments'];
			$lead_auditor_comment_date = date('Y-m-d');
			if($root_cause != ''){
				if(@AuditForm::model()->updateByPk($audit_form_id, array('lead_auditors_comments'=>$root_cause, 'lead_auditors_comments_date'=>$lead_auditor_comment_date))){
					$msg = "Lead auditor's comments saved successfully.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "You submitted empty text.";
			}
			
		}
		
		$this->layout='//layouts/main';
         if(isset($_GET['success'])){$success = $_GET['success'];}else{$success = NULL;}
          $user = new Users();
          $users = $user::getUsersOptions();
		$this->render('view',array(
			'model'=>$this->loadModel($id),'users'=>$users ,'success'=>$success, 'msg'=>$msg, 'msg_error'=>$msg_error,'NextReviewDate'=>$NextReviewDate,
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
		Yii::app()->user->setState('m_2', 3);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new AuditForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AuditForm']))
		{
			$model->attributes=$_POST['AuditForm'];
			$model->issue_date = date('Y-m-d');
			$model->user_id = Yii::app()->user->id;
			$model->current_user_id = $_POST['AuditForm']['auditees_representative'];
			if($model->save()){
				$subject = "URGENT!! Audit Form Representative";
				$body = "You have been assigned as a representative on Audit Form #{$model->issue_no}";
				$notification_subject = $subject;
				$notification_description = "You have been assigned as a representative on Audit Form #{$model->issue_no}";
				@Notifications::model()->sendEmail(@$model->auditRepresentative->email, $subject, $body);
				@Notifications::model()->sendNotification($notification_subject, $notification_description, @$model->auditees_representative, 'PRIVATE', 1);
				
				
				//add to safety recommendations
				$sr = new SafetyRecommendations;
				$sr->source = "CAP #{$model->issue_no}";
				$sr->source_category = "CAP";
				$sr->details = @$model->auditPlan->title;
				$sr->brief = $model->suggested_corrective_action;
				$sr->causes = $model->root_cause_analysis_of_non_conformance;
				$sr->mitigation = $model->suggested_corrective_action;
				$sr->type_of_control = $model->type_of_control;
				$sr->reported_by = Yii::app()->user->name;
				$sr->content_type = 5;
				$sr->content_id = $model->issue_no;
				$sr->priority = $model->priority;
				$sr->deadline = $model->proposed_date_of_realisation;
				$sr->action_by = $model->auditees_representative;
				$sr->modified = date('Y-m-d');
				$sr->date_assigned = date('Y-m-d');
				
				$sr->save();
				
				$this->redirect(array('view','id'=>$model->issue_no));
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
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 3);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AuditForm']))
		{
			$model->attributes=$_POST['AuditForm'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->issue_no));
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
		/* $dataProvider=new CActiveDataProvider('AuditForm');
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
		Yii::app()->user->setState('m_2', 3);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new AuditForm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AuditForm']))
			$model->attributes=$_GET['AuditForm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AuditForm the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AuditForm::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AuditForm $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='audit-form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

 //Print View

        public function actionPrint($issue_no){
			$model=AuditForm::model()->findByPk($issue_no);
			if($model == null){
				throw new CHttpException(404,'The requested page does not exist.');
			}
			$this->layout='//layouts/print';
			$this->render('print',array('model' => $model));
		}
}