<?php

class AircraftIncidentInvestigationsController extends Controller
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
				'users'=>array('@'), 'expression' => array('AircraftIncidentInvestigations','checkIfUserIsCurrentRecordViewer'),
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
				'actions'=>array('delete', 'trendsnotificationform', 'trendsinvestigationlevel', 'trendstranscriptsubmitted', 'trendspreliminaryreportsubmitted', 'trendsfinalreport', 'trendsrootcause', 'assigntoinvestigator', 'assignedtoofficers'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('assignedtoinvestigator', 'assignedtoofficer'),
				'users'=>array('@'), 
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('formdetails'),
				'users'=>array('@'), 
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}
	
	public function actionAssignedToOfficers(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		$this->render('assigned_to_officers');
	}
	
	public function actionAssignedToOfficer(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		$this->render('assigned_to_officer');
	}
	
	public function actionFormDetails(){
		if(isset($_POST['submit'])){
			$incident = $_POST['incident'];
			$transcript_submitted = $_POST['transcript_submitted'];
			$transcript_submission_date = $_POST['transcript_submission_date'];
			$SAG_submitted = $_POST['SAG_submitted'];
			$SAG_submission_date = $_POST['SAG_submission_date'];
			$SAG_reviewed_by = $_POST['SAG_reviewed_by'];
			$SAG_reviewed_date = $_POST['SAG_reviewed_date'];
			$preliminary_report_submitted = $_POST['preliminary_report_submitted'];
			$preliminary_report_submission_date = $_POST['preliminary_report_submission_date'];
			$controller_report_submitted = $_POST['controller_report_submitted'];
			$controller_report_date = $_POST['controller_report_date'];
			$sodf_submitted = $_POST['sodf_submitted'];
			$sodf_date = $_POST['sodf_date'];
			$fps_submitted = $_POST['fps_submitted'];
			$fps_date = $_POST['fps_date'];
			$forwarded_to_DANS_and_Mgrs_sent = $_POST['forwarded_to_DANS_and_Mgrs_sent'];
			$forwarded_to_DANS_and_Mgrs_date = $_POST['forwarded_to_DANS_and_Mgrs_date'];
			
			@AircraftIncidentInvestigations::model()->updateByPk($incident, array('transcript_submitted'=>$transcript_submitted, 
			'transcript'=>$transcript_submission_date, 
			'SAG_submitted'=>$SAG_submitted, 
			'SAG_submission'=>$SAG_submission_date, 
			'SAG_reviewed_by'=>$SAG_reviewed_by, 
			'SAG_reviewed'=>$SAG_reviewed_date, 
			'preliminary_report_submitted'=>$preliminary_report_submitted, 
			'preliminary_report'=>$preliminary_report_submission_date, 
			'controller_report_submitted'=>$controller_report_submitted, 
			'controller_report'=>$controller_report_date, 
			'sodf_submitted'=>$sodf_submitted, 
			'sodf'=>$sodf_date, 
			'fps_submitted'=>$fps_submitted, 
			'fps'=>$fps_date, 
			'forwarded_to_DANS_and_Mgrs_sent'=>$forwarded_to_DANS_and_Mgrs_sent, 
			'forwarded_to_DANS_and_Mgrs'=>$forwarded_to_DANS_and_Mgrs_date));
			
			$this->redirect(array('/aircraftIncidentInvestigations/view', 'id'=>$incident));
		}
	}
	
	public function actionAssignedToInvestigator(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		$this->render('assigned_to_investigator');
	}
	
	public function actionAssignToInvestigator(){
		$msg = '';
		$incident = $_POST['incident'];
		$administrator = Yii::app()->user->id;
		$administrator_name = Yii::app()->user->name;
		$investigator = $_POST['investigator'];
		$investigator_info = @Users::model()->findByPk($investigator);
		$investigator_name = $investigator_info->name;
		$message = $_POST['message'];
		
		//update incidents table
		@AircraftIncidentInvestigations::model()->updateByPk($incident, array('assigned_to_investigator'=>1, 'investigator_assigned'=>$investigator, 'administrator_assigned'=>$administrator));
		
		//send message
		$baseUrl = Yii::app()->request->baseUrl;
		$subject = "{$administrator_name} has assigned you to investigate aircraft incident #{$incident}";
		@Notifications::model()->sendNotification($subject, $message, $investigator, 'PRIVATE', 1);
		
		//send email
		@Notifications::model()->sendEmail(@$investigator_info->email, $subject, $message);
		
		$msg = "You have assigned this aircraft incident to {$investigator_name} for investigation.";
		
		$this->redirect(array('aircraftIncidentInvestigations/view','id'=>$incident, 'msg'=>$msg));
	}
	
	public function actionTrendsRootCause(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_root_cause', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionTrendsFinalReport(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_final_report', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionTrendsPreliminaryReportSubmitted(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_preliminary_report_submitted', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionTrendsTranscriptSubmitted(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_transcript_submitted', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionTrendsInvestigationLevel(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_investigation_level', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionTrendsNotificationForm(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 4);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('trends_notification_form', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		
		$msg = "";
		$msg_error = "";
		
		$model = $this->loadModel($id);
		
		if(isset($_POST['action'])){
			$post = new ActionsInvestigation;
			$post->details = $_POST['action'];
			//$post->deadline = $_POST['deadline'];
			$post->date_action_taken = $_POST['date_action_taken'];
			$post->accepted = 'NO';
			$post->comment = $_POST['comment'];
			$post->investigation_id = $_POST['investigation_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Safety Recommendations Implementation successfully saved.";
			}else{
				$msg_error = "Something went wrong. Please try again.";
			}
				
		}
		
		if(isset($_POST['safety_recommendation'])){
			if($_POST['officer'] != null){
					$sr = new SafetyRecommendations;
				$sr->source = "AIRCRAFT INVESTIGATION #{$_POST['investigation_id']}";
				$sr->source_category = "SR";
				$sr->details = $model->description;
				$sr->brief = $_POST['safety_recommendation'];
				$sr->causes = '';//PICK FROM INCIDENT CAUSES
				$sr->mitigation = $_POST['safety_recommendation'];
				$sr->reported_by = Yii::app()->user->name;
				$sr->content_type = 6;
				$sr->content_id = $_POST['investigation_id'];
				$sr->priority = $_POST['priority'];
				$sr->deadline = $_POST['time_frame'];
				$sr->action_by = $_POST['officer'];
				
				$officer = $_POST['officer'];
				$officer_info = @Users::model()->findByPk($officer);
				$administrator = Yii::app()->user->id;
				$administrator_name = Yii::app()->user->name;
				
				if($sr->save()){
					
					$investigation_id = $_POST['investigation_id'];
					@AircraftIncidentInvestigations::model()->updateByPk($investigation_id, array('assigned_to_officer'=>1, 'officer_assigned'=>$officer, 'administrator_assigned'=>$administrator));
					
					//send message
					$baseUrl = Yii::app()->request->baseUrl;
					$subject = "{$administrator_name} has assigned you aircraft incident investigation #{$investigation_id}";
					@Notifications::model()->sendNotification($subject, $subject, $officer, 'PRIVATE', 1);
					
					//send email
					@Notifications::model()->sendEmail(@$officer_info->email, $subject, $subject);
					
					$msg = "Safety Recommendations successfully saved.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}
			}else{
				$msg_error = "Please select an officer to assign to.";
			}
			
		}
		
		if(isset($_GET['forward'])){
			
			@AircraftIncidentInvestigations::model()->updateByPk($id, array('officer_done'=>1));
			
			$model = AircraftIncidentInvestigations::model()->findByPk($id);
			
			$investigator_info = @Users::model()->findByPk($model->officer_assigned);
			$investigator_name = $investigator_info->name;
			
			$administrator_info = @Users::model()->findByPk($model->administrator_assigned);
			
			$incident_number = $model->id;
			$incident_no = @$model->incident->number;
			
			//send message
			$baseUrl = Yii::app()->request->baseUrl;
			$subject = "Investigator ({$investigator_name}) has forwarded Aircraft Incident Investigation #{$incident_number}";
			$message = "Investigator {$investigator_name} is done with the work assigned to him and has forwarded back to you Aircraft Incident Investigation #{$incident_number} for {$incident_no}.";
			@Notifications::model()->sendNotification($subject, $message, $model->administrator_assigned, 'PRIVATE', 1);
			
			//send email
			@Notifications::model()->sendEmail(@$administrator_info->email, $subject, $message);
			
			$this->redirect(array('/aircraftIncidentInvestigations/assignedToOfficer'));
		}
		
		$this->layout='//layouts/main';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'msg'=>$msg,
			'msg_error'=>$msg_error,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new AircraftIncidentInvestigations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AircraftIncidentInvestigations']))
		{
			$incident_id = $_POST['AircraftIncidentInvestigations']['incident_id'];
			$incident_info = @Incidents::model()->findByPk($incident_id);
			
			$model->attributes=$_POST['AircraftIncidentInvestigations'];
			$model->date_of_occurence = $incident_info->date;
			$model->description = $incident_info->occurrence;
			/* if($model->save()){
				$report = new InvestigationReport;
				$report->title = "Aircraft Incident Investigation #{$model->id}, {$model->aircraft_involved}";
				$report->user = Yii::app()->user->getId();
				$report->aircraft_incident_investigation_id = $model->id;
				if($report->save()){
					$this->redirect(array('/investigationReport/view', 'id'=>$report->id));
				}
			} */
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
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
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AircraftIncidentInvestigations']))
		{
			$model->attributes=$_POST['AircraftIncidentInvestigations'];
			if($model->save()){
				
				/* $r = @InvestigationReport::model()->findByAttributes(array('aircraft_incident_investigation_id'=>$model->id));
				if(!empty($r)){
					$this->redirect(array('/investigationReport/view', 'id'=>$r->id)); 
				}else{
					$this->redirect(array('view','id'=>$model->id));
				} */
				$this->redirect(array('view','id'=>$model->id));
			}
				
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
		$dataProvider=new CActiveDataProvider('AircraftIncidentInvestigations');
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
		Yii::app()->user->setState('m_2', 4);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new AircraftIncidentInvestigations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AircraftIncidentInvestigations']))
			$model->attributes=$_GET['AircraftIncidentInvestigations'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AircraftIncidentInvestigations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AircraftIncidentInvestigations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AircraftIncidentInvestigations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aircraft-incident-investigations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
