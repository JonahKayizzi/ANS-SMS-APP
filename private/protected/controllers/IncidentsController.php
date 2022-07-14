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
				'actions'=>array('view'),
				'users'=>array('@'), 'expression' => array('Incidents','checkIfUserIsCurrentRecordViewer'), 
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'indexprint'),
				'users'=>array('@'), 
				/* 'expression' => array('Users','checkIfUserIsAdmin'), */
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('assignedtoofficer'),
				'users'=>array('@'), 
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','viewincident','riskanalysis','form122'),
				'users'=>array('@'), 
				'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete', 'note', 'print', 'activitytype', 'personresponsible', 'register', 'form124','riskanalysis','riskAnalysisCat', 'reoccuring', 'associated', 'riskindex', 'residuals', 'predictedriskindex', 'substituteriskindex', 'riskanalysestatus', 'riskanalysetype', 'riskanalysedepartment', 'riskanalysedivision', 'riskanalyseoperationtype', 'riskanalyserootcause', 'riskanalyserecurring', 'riskanalysehazardsource', 'riskanalysecause', 'riskanalyseincidentcategory', 'riskanalyseincidentsubcategory', 'riskanalysehazardcategory', 'assignToOfficer', 'assignedtoofficers', 'reviewSchedule', 'kpi', 'kpiplot', 'kpiplot2'),
				'users'=>array('@'), 
				'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}
	
	public function actionAssignedToOfficer(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		$this->render('assigned_to_officer');
	}
	
	public function actionAssignedToOfficers(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		$this->render('assigned_to_officers');
	}
	
	public function actionAssignToOfficer(){
		$incident = $_POST['incident'];
		$incident_number = $_POST['incident_number'];
		$administrator = Yii::app()->user->id;
		$administrator_name = Yii::app()->user->name;
		$officer = $_POST['officer'];
		$officer_info = @Users::model()->findByPk($officer);
		$message = $_POST['message'];
		
		//update incidents table
		@Incidents::model()->updateByPk($incident, array('assigned_to_officer'=>1, 'officer_assigned'=>$officer, 'administrator_assigned'=>$administrator, 'status'=>3));
		
		//send message
		$baseUrl = Yii::app()->request->baseUrl;
		$subject = "{$administrator_name} has assigned you {$incident_number}";
		@Notifications::model()->sendNotification($subject, $message, $officer, 'PRIVATE', 1);
		
		//send email
		@Notifications::model()->sendEmail(@$officer_info->email, $subject, $message);
		
		$this->redirect(array('incidents/view','id'=>$incident));
	}
	
	public function actionRiskAnalyseHazardCategory(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_hazard_category', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionRiskAnalyseIncidentSubCategory(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_incident_sub_category', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionRiskAnalyseIncidentCategory(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_incident_category', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionRiskAnalyseRecurring(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_recurring', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionRiskAnalyseRootCause(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_root_cause', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionRiskAnalyseHazardSource(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_hazard_source', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionRiskAnalyseCause(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		if(isset($_POST['incident_cause_main'])){$incident_cause_main = $_POST['incident_cause_main'];}else{$incident_cause_main = 0;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_cause', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category,'incident_cause_main'=>$incident_cause_main));
	}
	
	public function actionRiskAnalyseOperationType(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_operation_type', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionRiskAnalyseType(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_type', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionRiskAnalyseDepartment(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_department', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionRiskAnalyseDivision(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_division', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type));
	}
	
	public function actionKpiPlot(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		
		if(isset($_POST['kpi1'])){
			$kpi1 = $_POST['kpi1'];
			@Kpis::model()->updateByPk(1, array('target'=>$kpi1));
		}
		
		if(isset($_POST['kpi2'])){
			$kpi2 = $_POST['kpi2'];
			@Kpis::model()->updateByPk(2, array('target'=>$kpi2));
		}
		
		if(isset($_POST['kpi3'])){
			$kpi3 = $_POST['kpi3'];
			@Kpis::model()->updateByPk(3, array('target'=>$kpi3));
		}
		
		if(isset($_POST['kpi4'])){
			$kpi4 = $_POST['kpi4'];
			@Kpis::model()->updateByPk(4, array('target'=>$kpi4));
		}
		
		if(isset($_POST['safety_log_kpi_target'])){
			$safety_log_kpi_target = $_POST['safety_log_kpi_target'];
			$safety_log_id = $_POST['safety_log_id'];
			SafetyLogsCauses::model()->updateByPk($safety_log_id, array('target'=>$safety_log_kpi_target));
		}
		
		$categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll("display_kpi = 1");
		
		$this->layout='//layouts/main';
		
		$total_no_of_occurrences_reported = count(Incidents::model()->findAll("date_reported between '{$start_date}' and '{$end_date}'"));
		$total_no_of_occurrences_reported_target = @Kpis::model()->find("id = 1")->target;
		
		$no_of_days_in_selected_period = abs((strtotime($start_date) - strtotime($end_date))/(60*60*24));
		
		if($no_of_days_in_selected_period == 0){
			$no_of_days_in_selected_period = 1;
		}
		
		$no_of_months_in_selected_period = $no_of_days_in_selected_period/30;
		
		$average_no_of_occurrences_reported_month = number_format($total_no_of_occurrences_reported/$no_of_months_in_selected_period, 2);
		$average_no_of_occurrences_reported_month_target = @Kpis::model()->find("id = 3")->target;
		
		//averate no of days to close occurrence
		
		$closed_occurrences = Incidents::model()->findAll("status = 5");
		$no_of_days_to_close = 0;
		$no_of_closed_occurrences = 0;
		foreach($closed_occurrences as $closed_occurrence){
			if($closed_occurrence->date_closed == '0000-00-00'){
				$use_date = $closed_occurrence->modified;
			}else{
				$use_date = $closed_occurrence->date_closed;
			}
			
			$no_of_days_to_close_occurrence = abs((strtotime($use_date) - strtotime($closed_occurrence->date_reported))/(60*60*24));
			$no_of_days_to_close = $no_of_days_to_close + $no_of_days_to_close_occurrence;
			$no_of_closed_occurrences = $no_of_closed_occurrences + 1;	
			
		}
		if($no_of_closed_occurrences != 0){
			$average_no_days_to_close_occurrence = number_format(($no_of_days_to_close)/($no_of_closed_occurrences), 2);
		}else{
			$average_no_days_to_close_occurrence = 0;
		}
		
		$average_no_days_to_close_occurrence_target = @Kpis::model()->find("id = 2")->target;
		
		
		//average no of days to resolve safety  requirement
		
		$average_no_days_to_close_sr = $this->calculateKPI4();
		$average_no_days_to_close_sr_target = @Kpis::model()->find("id = 4")->target;
		
		$this->render('kpi_plot', array(
			'select_dt'=>$select_dt, 
			'start_date'=>$start_date,
			'end_date'=>$end_date,
			'causes'=>$causes,
			'categories'=>$categories,
			'total_no_of_occurrences_reported'=>$total_no_of_occurrences_reported,
			'total_no_of_occurrences_reported_target'=>$total_no_of_occurrences_reported_target,
			'average_no_days_to_close_occurrence'=>$average_no_days_to_close_occurrence,
			'average_no_days_to_close_occurrence_target'=>$average_no_days_to_close_occurrence_target,
			'average_no_of_occurrences_reported_month'=>$average_no_of_occurrences_reported_month,
			'average_no_of_occurrences_reported_month_target'=>$average_no_of_occurrences_reported_month_target,
			'average_no_days_to_close_sr'=>$average_no_days_to_close_sr,
			'average_no_days_to_close_sr_target'=>$average_no_days_to_close_sr_target,
			'no_of_months_in_selected_period'=>$no_of_months_in_selected_period,
			));
	}
	
	public function actionKpiPlot2(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		
		$array_green = array();
		$array_orange = array();
		$array_red = array();
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 1;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		
		if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 14)&&($period_type == 1)){
			$period_type = 2;
		}
		
		if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 31)&&($period_type == 2)){
			$period_type = 3;
		}
		
		$xaxis = array();
		
		$categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll("display_kpi = 1");
		
		$begin = $start_date;
		$day = $begin;
		$end = $end_date;
		
		$x = 0;
		$y = 1;
		while(strtotime($day) != strtotime($end)){
			if($period_type == 1){
				$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
				$kount = @Incidents::model()->kpi_compute($day, $day, $select_dt, $categories, $causes, $period_type);
				$xaxis[$x] = $day;
			}elseif($period_type == 2){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$kount = @Incidents::model()->kpi_compute($date_1, $date_2, $select_dt, $categories, $causes, $period_type);
				$xaxis[$x] = $date_1.'-'.$date_2;
			}elseif($period_type == 3){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$kount = @Incidents::model()->kpi_compute($date_1, $date_2, $select_dt, $categories, $causes, $period_type);
				$xaxis[$x] = $date_1.'-'.$date_2;
			}elseif($period_type == 4){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$kount = @Incidents::model()->kpi_compute($date_1, $date_2, $select_dt, $categories, $causes, $period_type);
				$xaxis[$x] = $date_1.'-'.$date_2;
			}	
			
			$array_green[$x]= $kount[0];
			$array_orange[$x]= $kount[1];
			$array_red[$x]= $kount[2];
			
			$x = $x + 1;
			$y = $x + 1;
		}
		
		$total_green = array_sum($array_green);
		$total_orange = array_sum($array_orange);
		$total_red = array_sum($array_red);
		
		
		$this->render('kpi_plot-2', array('start_date'=>$start_date, 'end_date'=>$end_date,'array_green'=>$array_green, 'array_orange'=>$array_orange, 'array_red'=>$array_red, 'xaxis'=>$xaxis, 'total_green'=>$total_green, 'total_orange'=>$total_orange, 'total_red'=>$total_red, 'chart_type'=>$chart_type));
	}
	
	public function actionKpi(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		
		$multiplier = (abs((strtotime($start_date) - strtotime($end_date))/(60*60*24)))/30;
		
		if(isset($_POST['kpi1'])){
			$kpi1 = $_POST['kpi1'];
			@Kpis::model()->updateByPk(1, array('target'=>$kpi1));
		}
		
		if(isset($_POST['kpi2'])){
			$kpi2 = $_POST['kpi2'];
			@Kpis::model()->updateByPk(2, array('target'=>$kpi2));
		}
		
		if(isset($_POST['kpi3'])){
			$kpi3 = $_POST['kpi3'];
			@Kpis::model()->updateByPk(3, array('target'=>$kpi3));
		}
		
		if(isset($_POST['kpi4'])){
			$kpi4 = $_POST['kpi4'];
			@Kpis::model()->updateByPk(4, array('target'=>$kpi4));
		}
		
		if(isset($_POST['safety_log_kpi_target'])){
			$safety_log_kpi_target = $_POST['safety_log_kpi_target'];
			$safety_log_id = $_POST['safety_log_id'];
			SafetyLogsCauses::model()->updateByPk($safety_log_id, array('target'=>$safety_log_kpi_target));
		}
		
		$categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll("display_kpi = 1");
		
		$this->layout='//layouts/main';
		
		$total_no_of_occurrences_reported = count(Incidents::model()->findAll("date_reported between '{$start_date}' and '{$end_date}'"));
		$total_no_of_occurrences_reported_target = (@Kpis::model()->find("id = 1")->target)*$multiplier;
		
		$no_of_days_in_selected_period = abs((strtotime($start_date) - strtotime($end_date))/(60*60*24));
		
		if($no_of_days_in_selected_period == 0){
			$no_of_days_in_selected_period = 1;
		}
		
		$no_of_months_in_selected_period = $no_of_days_in_selected_period/30;
		
		$average_no_of_occurrences_reported_month = number_format($total_no_of_occurrences_reported/$no_of_months_in_selected_period, 2);
		$average_no_of_occurrences_reported_month_target = (@Kpis::model()->find("id = 3")->target)*$multiplier;
		
		//averate no of days to close occurrence
		
		$closed_occurrences = Incidents::model()->findAll("status = 5");
		$no_of_days_to_close = 0;
		$no_of_closed_occurrences = 0;
		foreach($closed_occurrences as $closed_occurrence){
			if($closed_occurrence->date_closed == '0000-00-00'){
				$use_date = $closed_occurrence->modified;
			}else{
				$use_date = $closed_occurrence->date_closed;
			}
			
			$no_of_days_to_close_occurrence = abs((strtotime($use_date) - strtotime($closed_occurrence->date_reported))/(60*60*24));
			$no_of_days_to_close = $no_of_days_to_close + $no_of_days_to_close_occurrence;
			$no_of_closed_occurrences = $no_of_closed_occurrences + 1;	
			
		}
		if($no_of_closed_occurrences != 0){
			$average_no_days_to_close_occurrence = number_format(($no_of_days_to_close)/($no_of_closed_occurrences), 2);
		}else{
			$average_no_days_to_close_occurrence = 0;
		}
		
		$average_no_days_to_close_occurrence_target = (@Kpis::model()->find("id = 2")->target)*$multiplier;
		
		
		//average no of days to resolve safety  requirement
		
		$average_no_days_to_close_sr = $this->calculateKPI4();
		$average_no_days_to_close_sr_target = (@Kpis::model()->find("id = 4")->target)*$multiplier;
		
		$this->render('kpi', array(
			'select_dt'=>$select_dt, 
			'start_date'=>$start_date,
			'end_date'=>$end_date,
			'causes'=>$causes,
			'categories'=>$categories,
			'total_no_of_occurrences_reported'=>$total_no_of_occurrences_reported,
			'total_no_of_occurrences_reported_target'=>$total_no_of_occurrences_reported_target,
			'average_no_days_to_close_occurrence'=>$average_no_days_to_close_occurrence,
			'average_no_days_to_close_occurrence_target'=>$average_no_days_to_close_occurrence_target,
			'average_no_of_occurrences_reported_month'=>$average_no_of_occurrences_reported_month,
			'average_no_of_occurrences_reported_month_target'=>$average_no_of_occurrences_reported_month_target,
			'average_no_days_to_close_sr'=>$average_no_days_to_close_sr,
			'average_no_days_to_close_sr_target'=>$average_no_days_to_close_sr_target,
			'no_of_months_in_selected_period'=>$no_of_months_in_selected_period,
			'multiplier'=>$multiplier
			));
	}
	
	public function calculateKPI4(){
		$closed_occurrences = SafetyRecommendations::model()->findAll("open_close = 1");
		$no_of_days_to_close = 0;
		$no_of_closed_occurrences = 0;
		foreach($closed_occurrences as $closed_occurrence){
			if($closed_occurrence->date_closed == '0000-00-00'){
				$use_date = $closed_occurrence->modified;
			}else{
				$use_date = $closed_occurrence->date_closed;
			}
			
			if($closed_occurrence->date_assigned == '0000-00-00'){
				$use_date_assigned = $closed_occurrence->modified;
			}else{
				$use_date_assigned = $closed_occurrence->date_assigned;
			}
			
			$no_of_days_to_close_occurrence = abs((strtotime($use_date_assigned) - strtotime($use_date))/(60*60*24));
			$no_of_days_to_close = $no_of_days_to_close + $no_of_days_to_close_occurrence;
			$no_of_closed_occurrences = $no_of_closed_occurrences + 1;	
			
		}
		if($no_of_closed_occurrences != 0){
			$average_no_days_to_close_occurrence = number_format(($no_of_days_to_close)/($no_of_closed_occurrences), 2);
		}else{
			$average_no_days_to_close_occurrence = 0;
		}
		return $average_no_days_to_close_occurrence;
		
	}
	
	public function actionRiskAnalyseStatus(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 3);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['main_category'])){$main_category = $_POST['main_category'];}else{$main_category = 'Issue';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_analyse_status', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'main_category'=>$main_category));
	}
	
	public function actionReoccuring(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 8);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_dt = "{$y}-01-01";
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = $start_dt;}
		if(isset($_POST['start_dt'])){$start_dt = $_POST['start_dt'];}else{$select_dt = date('Y-m-d');}
		if(isset($_POST['end_dt'])){$end_dt = $_POST['end_dt'];}else{$end_dt = date('Y-m-d');}
		$this->render('reoccuring', array('select_dt'=>$select_dt, 'start_dt'=>$start_dt, 'end_dt'=>$end_dt));
	}
	
	public function actionResiduals(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 8);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('residuals', array('select_dt'=>$select_dt));
	}
	
	public function actionPredictedRiskIndex(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 1);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_for'])){$search_for = $_POST['search_for'];}else{$search_for = 'All';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('predicted_risk', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'search_for'=>$search_for));
	}
	
	public function actionSubstituteRiskIndex(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 1);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_for'])){$search_for = $_POST['search_for'];}else{$search_for = 'All';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('substitute_risk', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'search_for'=>$search_for));
	}
	
	public function actionAssociated(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_dt = "{$y}-01-01";
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = $start_dt;}
		if(isset($_POST['start_dt'])){$start_dt = $_POST['start_dt'];}else{$select_dt = date('Y-m-d');}
		if(isset($_POST['end_dt'])){$end_dt = $_POST['end_dt'];}else{$end_dt = date('Y-m-d');}
		$this->render('associated', array('select_dt'=>$select_dt, 'start_dt'=>$start_dt, 'end_dt'=>$end_dt));
	}
	
	public function actionRiskIndex(){
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 2);
		Yii::app()->user->setState('m_3', 1);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_for'])){$search_for = $_POST['search_for'];}else{$search_for = 'All';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('risk_index', array('select_dt'=>$select_dt, 'start_date'=>$start_date,'end_date'=>$end_date, 'period_type'=>$period_type,'chart_type'=>$chart_type,'search_for'=>$search_for));
	}
	
	public function actionGetSeverityRationaleOptions(){
		$data = @SeverityRationales::model()->findAll('severity_id=:a', array(':a'=>(int)$_POST['effect_severity']));
		
		$data=CHtml::listData($data,'id','name');
		foreach($data as $value=>$name){
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	
	public function actionView($id)
	{
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		
		$msg = "";
		$msg_error = "";
		
		$this->layout='//layouts/main';
		
		$model=$this->loadModel($id);
		
		if(isset($_GET['forward'])){
			
			@Incidents::model()->updateByPk($id, array('officer_done'=>1));
			
			$model = Incidents::model()->findByPk($id);
			
			$officer_info = @Users::model()->findByPk($model->officer_assigned);
			$officer_name = $officer_info->name;
			
			$administrator_info = @Users::model()->findByPk($model->administrator_assigned);
			
			$incident_number = $model->number;
			
			//send message
			$baseUrl = Yii::app()->request->baseUrl;
			$subject = "Officer ({$officer_name}) has forwarded {$incident_number}";
			$message = "Officer {$officer_name} is done with the work assigned to him and has forwarded back to you {$incident_number}.";
			@Notifications::model()->sendNotification($subject, $message, $model->administrator_assigned, 'PRIVATE', 1);
			
			//send email
			@Notifications::model()->sendEmail(@$administrator_info->email, $subject, $message);
			
			$this->redirect(array('/incidents/assignedToOfficer'));
		}
		
		if(isset($_GET['action'])){
			if($_GET['action'] == 'del'){
				if(isset($_GET['root_cause'])){
					if(@RootCauses::model()->updateByPk($_GET['root_cause'], array('status'=>0))){
						$msg = "The selected root cause has been successfully deleted.";
					}	
				}
				
				if(isset($_GET['activity_type'])){
					if(@OperationTypes::model()->updateByPk($_GET['activity_type'], array('status'=>0))){
						$msg = "The selected type of operation has been successfully deleted.";
					}	
				}
				
				if(isset($_GET['hazard_source'])){
					if(@HazardSources::model()->updateByPk($_GET['hazard_source'], array('status'=>0))){
						$msg = "The selected hazard source has been successfully deleted.";
					}	
				}
				
			}
		}
		
		if(isset($_POST['new_activity_type']))
		{
			$new_activity_type = $_POST['new_activity_type'];
			$id = Yii::app()->request->getParam('id');
			
			if($new_activity_type != ''){
				$NewOperationType = new OperationTypes;
				$NewOperationType->name = $new_activity_type;
				if($NewOperationType->save()){
					$msg = "A new type of operation ({$new_activity_type}) has been successfully saved.";
				}	
			}
		}
		
		if(isset($_POST['new_root_cause']))
		{
			$new_root_cause = $_POST['new_root_cause'];
			$id = Yii::app()->request->getParam('id');
			
			if($new_root_cause != ''){
				$NewRootCause = new RootCauses;
				$NewRootCause->name = $new_root_cause;
				if($NewRootCause->save()){
					$msg = "A new root cause ({$new_root_cause}) has been successfully saved.";
				}	
			}
		}
		
		if(isset($_POST['new_hazard_source']))
		{
			$new_hazard_source = $_POST['new_hazard_source'];
			$id = Yii::app()->request->getParam('id');
			
			if($new_hazard_source != ''){
				$NewHazardSource = new HazardSources;
				$NewHazardSource->name = $new_hazard_source;
				if($NewHazardSource->save()){
					$msg = "A new hazard source ({$new_hazard_source}) has been successfully saved.";
				}	
			}
		}
		
		if(isset($_POST['incident_main_cause']))
		{
			$incident_main_cause = $_POST['incident_main_cause'];
			
			if($incident_main_cause != ''){
				$NewIncidentCauseMainCategory = new IncidentCausesMain;
				$NewIncidentCauseMainCategory->name = $incident_main_cause;
				if($NewIncidentCauseMainCategory->save()){
					$msg = "A main category for incident causes has been successfully saved.";
				}	
			}
		}
		
		if(isset($_POST['form_of_notification']))
		{
			$aircraft_involved = $_POST['aircraft_involved'];
			$form_of_notification = $_POST['form_of_notification'];
			$level_of_investigation = $_POST['level_of_investigation'];
			$investigator = $_POST['investigator'];
			$incident_id = $_POST['incident_id'];
			$tor = $_POST['tor'];
			$deadline = $_POST['deadline'];
			
			$user_info = Users::model()->findByPk($investigator);
			
			if($aircraft_involved != ''){
				if(@Incidents::model()->updateByPk($incident_id, array('aircraft_involved'=>$aircraft_involved, 'form_of_notification'=>$form_of_notification, 'level_of_investigation'=>$level_of_investigation, 'investigator_id'=>$investigator, 'current_user_id'=>$investigator, 'status'=>3, 'investigation_deadline'=>$deadline, 'investigation_tor'=>$tor))){
					
					//send mail 
					$subject = "URGENT!! INCIDENT INVESTIGATION ".@$model->number;
					$body = "You have been assigned as investigator for INCIDENT #{$model->number}";
					@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
					
					//send notification
					@Notifications::model()->sendNotification($subject, $body, @$user_info->id, 'PRIVATE', 0);
				
					$msg = "Incident has been assigned an investigator.";
				}	
			}else{
				$msg_error = "Aircraft Involved cannot be empty. Please try again.";
			}
		}
		
		if(isset($_POST['incident_sub_cause']))
		{
			$incident_sub_cause = $_POST['incident_sub_cause'];
			$incident_main_cause = $_POST['incident_causes_main'];
			
			if($incident_sub_cause != ''){
				if($incident_main_cause != NULL){
					$NewIncidentCauseSubCategory = new IncidentCausesSub;
					$NewIncidentCauseSubCategory->name = $incident_sub_cause;
					$NewIncidentCauseSubCategory->main_id = $incident_main_cause;
					if($NewIncidentCauseSubCategory->save()){
						$msg = "A sub category for incident causes has been successfully saved.";
					}	
				}else{
					$msg_error = "Please make sure you have selected a main category from the dropdown list.";
				}
					
			}
		}
		
		if(isset($_POST['incident_causes_sub']))
		{
			$incident_causes_sub = $_POST['incident_causes_sub'];
			$incident_id = $_POST['incident_id'];
			
			$post = new IncidentsCauses;
			$post->incident_id = $incident_id;
			$post->cause_id = $incident_causes_sub;
			if($post->save()){
				$record = new MonitoringPerformance;
				$record->incident_id = $incident_id;
				$record->cause_id = $incident_causes_sub;
				$record->save();
				
				//generate alert if occurrence exists that has same cause_id and consequence_id
				//get all consequences of this occurrence
				$occurrence_consequences = @MonitoringPerformance::model()->findAll("incident_id = {$incident_id} and consequence_id IS NOT NULL");
				//get all incidents with same cause_id
				$same_cause_occurrences = @MonitoringPerformance::model()->findAll("cause_id = {$incident_causes_sub} and incident_id != {$incident_id}");
				//loop through all consequences of this occurrence and see whether there is any other occurrence with the same consequence
				foreach($occurrence_consequences as $occurrence_consequence){
					foreach($same_cause_occurrences as $same_cause_occurrence){
						
						//get corresponding consequences
						$same_cause_consequences = @MonitoringPerformance::model()->findAll("incident_id = {$same_cause_occurrence->incident_id} and consequence_id IS NOT NULL");
						
						foreach($same_cause_consequences as $same_cause_consequence){
							if(($same_cause_consequence->consequence_id == $occurrence_consequence->consequence_id)){
								//update monitoring effectiveness with status 1
								@MonitoringPerformance::model()->updateAll(array('reoccurring'=>1, 'date'=>date('Y-m-d')), "incident_id = {$same_cause_occurrence->incident_id}");
							}	
						}
							
					}
					
				}
				
				
				
				$msg = "The information was saved successfully.";
			}else{
				$msg_error = "Something went wrong, please try again.";
			}
		}
		
		if(isset($_POST['incident_consequences_sub']))
		{
			$incident_consequences_sub = $_POST['incident_consequences_sub'];
			$incident_id = $_POST['incident_id'];
			
			$post = new IncidentsConsequences;
			$post->incident_id = $incident_id;
			$post->consequence_id = $incident_consequences_sub;
			if($post->save()){
				$record = new MonitoringPerformance;
				$record->incident_id = $incident_id;
				$record->consequence_id = $incident_consequences_sub;
				$record->save();
				
				//generate alert if occurrence exists that has same cause_id and consequence_id
				//get all consequences of this occurrence
				$occurrence_causes = @MonitoringPerformance::model()->findAll("incident_id = {$incident_id} and cause_id IS NOT NULL");
				//get all incidents with same cause_id
				$same_consequence_occurrences = @MonitoringPerformance::model()->findAll("consequence_id = {$incident_consequences_sub} and incident_id != {$incident_id}");
				//loop through all consequences of this occurrence and see whether there is any other occurrence with the same consequence
				foreach($occurrence_causes as $occurrence_cause){
					foreach($same_consequence_occurrences as $same_consequence_occurrence){
						
						//get corresponding consequences
						$same_consequence_causes = @MonitoringPerformance::model()->findAll("incident_id = {$same_consequence_occurrence->incident_id} and cause_id IS NOT NULL");
						
						foreach($same_consequence_causes as $same_consequence_cause){
							if(($same_consequence_cause->cause_id == $occurrence_cause->cause_id)){
								//update monitoring effectiveness with status 1
								@MonitoringPerformance::model()->updateAll(array('reoccurring'=>1), "incident_id = {$same_consequence_occurrence->incident_id}");
							}	
						}
							
					}
					
				}
				
				$msg = "The information was saved successfully.";
			}else{
				$msg_error = "Something went wrong, please try again.";
			}
		}
		
		if(isset($_POST['root_cause']))
		{
			$root_cause = $_POST['root_cause'];
			$id = Yii::app()->request->getParam('id');
			
			@Incidents::model()->updateByPk($id, array('root_cause'=>$root_cause));
			
		}
		
		if(isset($_POST['hazard_source']))
		{
			$hazard_source = $_POST['hazard_source'];
			$id = Yii::app()->request->getParam('id');
			
			@Incidents::model()->updateByPk($id, array('hazard_source'=>$hazard_source));
			
		}
		
		if(isset($_POST['activity_type']))
		{
			$activity_type = $_POST['activity_type'];
			$id = Yii::app()->request->getParam('id');
			
			@Incidents::model()->updateByPk($id, array('type_of_operation'=>$activity_type));
			
		}
		
		if(isset($_POST['sitrep_cause'])){
			$sitrep_cause = $_POST['sitrep_cause'];
			$incident = $_POST['incident_id'];
			@Incidents::model()->updateByPk($incident, array('sitrep_cause'=>$sitrep_cause));
		}
		
		if(isset($_POST['sitrep_category'])){
			$sitrep_category = $_POST['sitrep_category'];
			$incident = $_POST['incident_id'];
			@Incidents::model()->updateByPk($incident, array('sitrep_category'=>$sitrep_category));
		}
		
		if(isset($_POST['consequence'])){
			$post = new Consequences;
			$post->description = $_POST['consequence'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				
				
				
				$msg = "Consequence successfully saved.";
			}
				
		}
		/* if(isset($_POST['srecommendation'])){
			$post = new SafetyRecommendations;
			$post->details = $_POST['srecommendation'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Safety recommendation successfully saved.";
			}
				
		} */
		if(isset($_POST['edefense'])){
			$post = new ExistingDefenses;
			$post->details = $_POST['edefense'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Existing defence successfully saved.";
			}
				
		}
		if(isset($_POST['cause'])){
			$post = new Causes;
			$post->details = $_POST['cause'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Cause successfully saved.";
			}
				
		}
		if(isset($_POST['action_taken'])){
			$post = new ActionsTaken;
			$post->description = $_POST['action_taken'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$incident = $_POST['incident_id'];
				$INCIDENT = @Incidents::model()->findByPk($incident);
				
				//@Incidents::model()->updateByPk($INCIDENT->id, array('status'=>4));
				
				$condition = "name=:u_name";
				$params = array(':u_name'=>@$INCIDENT->reported_by);
				$reported_by_info = @Users::model()->find($condition, $params);
				
				
				
				//send mail to sender
				$action_taken_description = $_POST['action_taken'];
				$subject = "ACTION TAKEN ON ".@$INCIDENT->number;
				$body = "The following action has been taken on occurrence #:".@$INCIDENT->id.", ".@$INCIDENT->number.", ".@$INCIDENT->occurrence." - ".$action_taken_description;
				@Notifications::model()->sendEmail(@$reported_by_info->email, $subject, $body);
				
				//send notification to sender
				@Notifications::model()->sendNotification($subject, $body, @$reported_by_info->id, 'PRIVATE', 0);
				$msg = "Action taken has been recorded and also sent to person who reported.";
			}
				
		}
		if(isset($_POST['sstate'])){
			$post = new SystemStates;
			$post->details = $_POST['sstate'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "System state successfully saved.";
			}
				
		}
		if(isset($_POST['evidence'])){
			$post = new Evidences;
			$post->details = $_POST['evidence'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Evidence successfully saved.";
			}
				
		}
		if(isset($_POST['severity'])){
			$post = new Severity;
			$post->severity = $_POST['severity'];
			$post->severity_rationale = $_POST['severity_rationale'];
			$post->likelihood = $_POST['likelihood'];
			$post->likelihood_rationale = $_POST['likelihood_rationale'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Severity successfully saved.";
			}
				
		}
		if(isset($_POST['effect_severity'])){
			$effect = new Effects;
			
			$effect->hazard_id = $_POST['hazard_id'];
			$effect->consequence = $_POST['consequence_id'];	
			$effect->reported_by = Yii::app()->user->name;
			$effect->severity_id = $_POST['effect_severity'];
			//$effect->severity_rational_id = $_POST['effect_severity_rationale'];
			$effect->likelihood_id = $_POST['effect_likelihood'];
			$effect->initial_risk_index = $effect->likelihood_id.$effect->severity->value;
			$effect->predicted_residual_risk_index = $_POST['predicted_residual_risk'];
			$effect->substitute_risk = $_POST['substitute_risk_index'];
			$effect->date = $this->loadModel($id)->date;
			if($effect->save()){
				$msg = "Effect successfully saved.";
			}
			
			foreach($_POST['effect_severity_rationale'] as $value){
				$esRationales = new EffectsSeverityRationales;
				$esRationales->effects_id = $effect->id;
				$esRationales->severity_rational_id = $value;
				$esRationales->save();
			}
			
		}
		//added by phillip
		/* if(isset($_POST['effect_severity'])){

			$effect = new Effects;
            $effect->hazard_id = $_POST['hazard_id'];
			$effect->consequence = $_POST['consequence_id'];	
			$effect->reported_by = Yii::app()->user->name;
			$effect->save();
			//print_r($effect->getErrors());

			if($effect->save()){
				$post = new EffectRiskManagement();
				$post->severity = $_POST['effect_severity'];
				$post->severity_rationale = $_POST['effect_severity_rationale'];
				$post->likelihood = $_POST['effect_likelihood'];
				$post->likelihood_rationale = $_POST['effect_likelihood_rationale'];
				$post->reported_by = Yii::app()->user->name;
				$post->effects_id = $effect->id;
				
				if($post->save()){
					//print_r($post->getErrors());
					$incident = $_POST['hazard_id'];
					$INCIDENT = @Incidents::model()->findByPk($incident);
					if($INCIDENT->status <= 3){@Incidents::model()->updateByPk($incident, array('status'=>3));}
				}
				else
					$error_model=$effect;	
			}
			else
				$error_model=$effect;
		} */
		if(isset($_POST['review_date'])){
			$review_date= new ReviewDates;
			$review_date->review_date=$_POST['review_date'];
			$review_date->remark=$_POST['remark'];
			$review_date->ocurrence = $_POST['incident_id'];
			if($review_date->save()){
				$msg = "Review date successfully saved.";
			}
		}
		if(isset($_POST['mitigation'])){
			
			$incident_info = @Incidents::model()->findByPk($_POST['incident_id']);
			
			$incident_number = $_POST['incident_number'];
			$administrator = Yii::app()->user->id;
			$administrator_name = Yii::app()->user->name;
			$officer = $_POST['officer'];
			$officer_info = @Users::model()->findByPk($officer);
			//$message = $_POST['message'];
			
			$incident = $_POST['incident_id'];
			
			
			//add to safety recommendations
			$sr = new SafetyRecommendations;
			$sr->source = $model->number;
			$sr->source_category = "HAZARD";
			$sr->details = @$incident_info->occurrence;
			$sr->brief = @$_POST['mitigation'];
			$sr->type_of_control = @$_POST['type_of_control'];
			$causes_of_incident = IncidentsCauses::model()->getCausesOfIncident($_POST['incident_id']);
			$sr->causes = $causes_of_incident;
			$sr->mitigation = @$_POST['mitigation'];
			$sr->reported_by = Yii::app()->user->name;
			$sr->content_type = 1;
			$sr->content_id = $_POST['incident_id'];
			$sr->priority = $_POST['priority'];
			$sr->deadline = $_POST['time_frame'];
			$sr->action_by = $officer;
			$sr->date_assigned = date('Y-m-d');
			
			if($sr->save()){
				@Incidents::model()->updateByPk($incident, array('current_user_id'=>$officer, 'status'=>3));
				//send message
				$baseUrl = Yii::app()->request->baseUrl;
				$subject = "{$administrator_name} has assigned as implementor of safety requirement/mitigation on occurrence #{$model->number}";
				@Notifications::model()->sendNotification($subject, $subject, $officer, 'PRIVATE', 1);
				
				//send email
				@Notifications::model()->sendEmail(@$officer_info->email, $subject, $subject);
				$msg="This hazard has been successfully assigned to {$officer_info->name} for implementation.";
			}
			else{
				$error_model=$post;	
			}
		}
		if(isset($_POST['ptarget'])){
			$post = new PerformanceTargets;
			$post->details = $_POST['ptarget'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Performance target successfully saved.";
			}
				
		}
		if(isset($_POST['rsolution'])){
			$post = new RecommendedSolutions;
			$post->details = $_POST['rsolution'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Recommendation solution successfully saved.";
			}
				
		}
		if(isset($_POST['investigator'])){
			$post = new Investigators;
			$post->name = $_POST['investigator'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$incident = $_POST['incident_id'];
				$INCIDENT = @Incidents::model()->findByPk($incident);
				//if($INCIDENT->status <= 3){@Incidents::model()->updateByPk($incident, array('status'=>3));}
				
				//send investigator email notification
				$investigator_info = @Users::model()->findByPk($_POST['investigator']);
				$subject = "Investigator Notification";
				$body = "You have been assigned as investigator for: \r\n\r\n".
						"{$INCIDENT->main_category} ID: {$INCIDENT->id}\r\n".
						"Details: {$INCIDENT->occurrence}";
				$this->sendEMail($investigator_info->email, $subject, $body);
				
				//send investigator system notification
				$notification_subject = 'URGENT!! '.$subject;
				$notification_description = "You have been assigned as investigator for: {$INCIDENT->main_category} ID: {$INCIDENT->id}. {$INCIDENT->main_category} details: {$INCIDENT->occurrence}";
				
				$this->sendNotification($notification_subject, $notification_description, $investigator_info->id, 'PRIVATE', 1);
				
			}
				
		}
		if(isset($_POST['remark'])){
			$post = new Remarks;
			$post->details = $_POST['remark'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Remark successfully saved.";
			}
				
		}
		if(isset($_POST['action'])){
			if($_POST['safety_recommendation_id'] != null){
				$post = new Actions;
				$post->details = $_POST['action'];
				//$post->deadline = $_POST['deadline'];
				$post->date_action_taken = $_POST['date_action_taken'];
				$post->accepted = 'NO';
				$post->comment = $_POST['comment'];
				$post->incident_id = $_POST['incident_id'];
				$post->safety_recommendation_id = $_POST['safety_recommendation_id'];
				$post->reported_by = Yii::app()->user->name;
				
				$user_info = @Users::model()->find("username = '{$model->reported_by}'");
				$user_info_admin = "sms-dans@caa.co.ug";
				if($post->save()){
					
					$subject = "Safety Requirement Implementation";
					$body = "A safety requirement implementation #{$post->id} has been submitted on {$model->number}";
					$notification_subject = $subject;
					$notification_description = "A safety requirement implementation #{$post->id} has been submitted on {$model->number}";
					@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
					@Notifications::model()->sendEmail($user_info_admin, $subject, $body);
					@Notifications::model()->sendNotification($notification_subject, $notification_description, $user_info->id, 'PRIVATE', 1);
					
					$msg = "Mitigation Implementation successfully saved.";
				}	
			}else{
				$msg = "Safety Requirement cannot be blank. Please select a safety requirement.";
			}
			
				
		}
		if(isset($_POST['feedback'])){
			$post = new Feedback;
			$post->details = $_POST['feedback'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Feedback successfully saved.";
			}
				
		}
		if(isset($_POST['faction'])){
			$post = new FurtherActions;
			$post->details = $_POST['faction'];
			$post->accepted = $_POST['accepted'];
			$post->comment = $_POST['comment'];
			$post->incident_id = $_POST['incident_id'];
			$post->reported_by = Yii::app()->user->name;
			if($post->save()){
				$msg = "Further action successfully saved.";
			}
				
		}
		
		if(isset($_POST['MonitoringActivities']))
		{
            $post=new MonitoringActivities;
			//$incident = Yii::app()->request->getParam('incident');
			
			$post->attributes=$_POST['MonitoringActivities'];
			$incident = $post->incident_id;
			$INCIDENT = @Incidents::model()->findByPk($incident);
			if($post->save()){
				$msg = "Monitoring activity successfully saved.";
			}
				
		}
		
		if(isset($_POST['action_investigate'])){
			if($_POST['safety_recommendation_id'] != NULL){
				$post = new ActionsInvestigation;
				$post->details = $_POST['action_investigate'];
				//$post->deadline = $_POST['deadline'];
				$post->date_action_taken = $_POST['date_action_taken'];
				$post->accepted = 'NO';
				$post->comment = $_POST['comment'];
				$post->investigation_id = $_POST['investigation_id'];
				$post->safety_recommendation_id = $_POST['safety_recommendation_id'];
				$post->reported_by = Yii::app()->user->name;
				
				$user_info = Users::model()->find("username = '{$model->reported_by}'");
				if($post->save()){
					
					$subject = "Safety Requirement Implementation";
					$body = "A safety requirement implementation #{$post->id} has been submitted on {$model->number}";
					$notification_subject = $subject;
					$notification_description = "A safety requirement implementation #{$post->id} has been submitted on {$model->number}";
					@Notifications::model()->sendEmail(@$user_info->email, $subject, $body);
					@Notifications::model()->sendNotification($notification_subject, $notification_description, $user_info->id, 'PRIVATE', 1);
					
					$msg = "Safety Recommendations Implementation successfully saved.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}	
			}else{
				$msg_error = "Safety Recommendation cannot be blank, please select a safety recommendation from the drop down list.";
			}
			
				
		}
		
		
		
		if(isset($_POST['safety_recommendation'])){
			if($_POST['officer'] != null){
				$sr = new SafetyRecommendations;
				$sr->source = $model->number;
				$sr->source_category = "SR";
				$sr->details = $model->occurrence;
				$sr->brief = $_POST['safety_recommendation'];
				$sr->type_of_control = $_POST['type_of_control'];
				$sr->causes = '';//PICK FROM INCIDENT CAUSES
				$sr->mitigation = $_POST['safety_recommendation'];
				$sr->reported_by = Yii::app()->user->name;
				$sr->content_type = 6;
				$sr->content_id = $_POST['investigation_id'];
				$sr->priority = $_POST['priority'];
				$sr->deadline = $_POST['time_frame'];
				$sr->action_by = $_POST['officer'];
				$sr->date_assigned = date('Y-m-d');
				
				$officer = $_POST['officer'];
				$officer_info = @Users::model()->findByPk($officer);
				$administrator = Yii::app()->user->id;
				$administrator_name = Yii::app()->user->name;
				
				if($sr->save()){
					
					@Incidents::model()->updateByPk($model->id, array('current_user_id'=>$officer, 'status'=>3));
					
					//send message
					$baseUrl = Yii::app()->request->baseUrl;
					$subject = "URGENT!! {$administrator_name} has assigned you as implementor for investigation on incident #{$model->number}";
					@Notifications::model()->sendNotification($subject, $subject, $officer, 'PRIVATE', 1);
					
					//send email
					@Notifications::model()->sendEmail(@$officer_info->email, $subject, $subject);
					
					$msg = "Safety Recommendations successfully saved. Incident has also been successfully assigned to {$officer_info->name} for implementation.";
				}else{
					$msg_error = "Something went wrong. Please try again.";
				}
			}else{
				$msg_error = "Please select an officer to assign to.";
			}
			
		}
		
		$NextReviewDate = new SafetyRequirementsNextReviewDates;
		if(isset($_POST['SafetyRequirementsNextReviewDates']))
		{
			$NextReviewDate->attributes=$_POST['SafetyRequirementsNextReviewDates'];
			if($NextReviewDate->save()){
				//$this->redirect(array('view', 'id'=>$id));
				$msg = "Next review date saved successfully.";
			}else{
				$msg_error = "Something went wrong. Please try again.";
			}
		}
		
		$ReviewDate = new SafetyRequirementsReviewDates;
		if(isset($_POST['SafetyRequirementsReviewDates']))
		{
			$ReviewDate->attributes=$_POST['SafetyRequirementsReviewDates'];
			if($ReviewDate->save()){
				//$this->redirect(array('view', 'id'=>$id));
				$msg = "Date reviewed saved successfully.";
			}else{
				$msg_error = "Something went wrong. Please try again.";
			}
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'error_model'=>@$error_model,
			'msg'=>$msg,
			'msg_error'=>$msg_error,
			'NextReviewDate'=>$NextReviewDate,
			'ReviewDate'=>$ReviewDate,
		));
	}
	
	public function sendGroupNotifications($users, $subject, $description, $urgent){
		$type='GROUP';
		foreach($users as $user){			
			$this->sendNotification($subject, $description, $user->id, $type, $urgent);
		}
		
	}
	
	public function sendNotification($subject, $description, $user_to, $type, $urgent){
		$user_from = @Yii::app()->user->id;
		$status = 'sent';
		$notification = new Notifications;
		$notification->subject = $subject;
		$notification->description = $description;
		$notification->status = $status;
		$notification->user = $user_to;
		$notification->user_from = $user_from;
		$notification->type = $type;
		$notification->urgent = $urgent;
		
		$notification->save();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='//layouts/main';
		$model=new Incidents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidents']))
		{
			$model->attributes=$_POST['Incidents'];
                        /* $model->date = date("Y-m-d",time()); */
						$model->date_reported = date("Y-m-d");
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
		/* $this->redirect(array('/incidents/index')); */
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout='//layouts/main';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidents']))
		{
			$model->attributes=$_POST['Incidents'];
			//$model->date_reported = date("Y-m-d");
			
			$category = $_POST['Incidents']['main_category'];
			$sub_category = $_POST['Incidents']['category'];
			$incident_category = $_POST['Incidents']['incident_category'];
			
			if($model->save()){
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
				
				@Incidents::model()->updateByPk($model->id, array('number'=>$number));
				
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
	
	public function actionReviewSchedule()
	{
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		
		$review_ids = ReviewDates::model()->findAll();
		
		$review_list = "(";
		
		$loop = 0;
		
		foreach($review_ids as $review_id){
			$review_list = $review_list."{$review_id->ocurrence}, ";
			$loop++;
		}
		$review_list = $review_list." 0)";
		
		$dataProvider=new CActiveDataProvider('Incidents');
		$param = Yii::app()->request->getParam('param');
		if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = 0;}
		if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = "Occurrence";}
		
		if(@Users::model()->checkIfUserCategoryInAdmin()){
			$extend = "";
		}else{
			$current_user_id = Yii::app()->user->id;
			$extend = "and current_user_id = {$current_user_id} or investigator_id = {$current_user_id}";
		}
		
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$status = $_POST['status'];
			$main_category = $_POST['main_category'];
			
			if($status == 0){
				$condition_1 = "id in {$review_list} and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "id in {$review_list} and main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	

			}else{
				$condition_1 = "id in {$review_list} and status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "id in {$review_list} and status=:s and main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	
			}
			
			
		}else{
			if($status == 0){
				$condition_1 = "id in {$review_list} and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "id in {$review_list} and main_category = :m {$extend} order by id desc";
			}else{
				$condition_1 = "id in {$review_list} and status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "id in {$review_list} and status=:s and main_category = :m {$extend} order by id desc";
			}
			
		}
		
		if($main_category == "Occurrence"){
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							/* 'params'=>array(':s'=>$status), */
						),
						'pagination' => array('pageSize' => 100000),
				));		
	
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							'params'=>array(':s'=>$status),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}else{
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':s'=>$status, ':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}
		
		
		
		$this->render('review-schedule',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$dataProvider=new CActiveDataProvider('Incidents');
		$param = Yii::app()->request->getParam('param');
		if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = 0;}
		if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = "Occurrence";}
		
		if(@Users::model()->checkIfUserCategoryInAdmin()){
			$extend = "";
		}else{
			$current_user_id = Yii::app()->user->id;
			$extend = "and current_user_id = {$current_user_id} or investigator_id = {$current_user_id}";
		}
		
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$status = $_POST['status'];
			$main_category = $_POST['main_category'];
			
			if($status == 0){
				$condition_1 = "main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	

			}else{
				$condition_1 = "status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "status=:s and main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	
			}
			
			
		}else{
			if($status == 0){
				$condition_1 = "main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "main_category = :m {$extend} order by id desc";
			}else{
				$condition_1 = "status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "status=:s and main_category = :m {$extend} order by id desc";
			}
			
		}
		
		if($main_category == "Occurrence"){
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							/* 'params'=>array(':s'=>$status), */
						),
						'pagination' => array('pageSize' => 100000),
				));		
	
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							'params'=>array(':s'=>$status),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}else{
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':s'=>$status, ':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}
		
		
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		// $this->redirect(array('admin'));
	}
	
	public function actionIndexPrint()
	{
		Yii::app()->user->setState('m_1', 1);
		Yii::app()->user->setState('m_2', 1);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/print-index';
		$dataProvider=new CActiveDataProvider('Incidents');
		$param = Yii::app()->request->getParam('param');
		if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = 0;}
		if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = "Occurrence";}
		
		if(@Users::model()->checkIfUserCategoryInAdmin()){
			$extend = "";
		}else{
			$current_user_id = Yii::app()->user->id;
			$extend = "and current_user_id = {$current_user_id} or investigator_id = {$current_user_id}";
		}
		
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$status = $_POST['status'];
			$main_category = $_POST['main_category'];
			
			if($status == 0){
				$condition_1 = "main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	

			}else{
				$condition_1 = "status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";
				
				$condition_2 = "status=:s and main_category = :m  and date between '{$st_dt}' and '{$end_dt}' {$extend} order by id desc";	
			}
			
			
		}else{
			if($status == 0){
				$condition_1 = "main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "main_category = :m {$extend} order by id desc";
			}else{
				$condition_1 = "status=:s and main_category in ('Issue', 'Incident', 'Hazard', 'SITREP') {$extend} order by id desc";
			
				$condition_2 = "status=:s and main_category = :m {$extend} order by id desc";
			}
			
		}
		
		if($main_category == "Occurrence"){
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							/* 'params'=>array(':s'=>$status), */
						),
						'pagination' => array('pageSize' => 100000),
				));		
	
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_1,
							'params'=>array(':s'=>$status),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}else{
			if($status == 0){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}else{
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'id DESC',
						), */
					'criteria'=>array(
							'condition'=>$condition_2,
							'params'=>array(':s'=>$status, ':m'=>$main_category),
						),
						'pagination' => array('pageSize' => 100000),
				));		
			}
			
		}
		
		
		
		$this->render('index-print',array(
			'dataProvider'=>$dataProvider,
		));
		// $this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionViewIncident($id){
		$model = $this->loadModel($id);

		//$model=Incidents::model()->findByPk($id);

		$newModel= IncidentInvestigation::model()->find('incident_id='.$id,array('limit'=>1));
		if(!$newModel){

			$newModel= new IncidentInvestigation;
		}
		if(isset($_POST['IncidentInvestigation'])){
			$newModel->attributes=$_POST['IncidentInvestigation'];
			$newModel->save();
		}
		
		$this->render('_viewIncident',array(
			'model'=>$model,
			'newModel'=>$newModel
		));
	}
	public function actionAdmin()
	{
        /* $model=new Incidents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Incidents']))
			$model->attributes=$_GET['Incidents'];

		$this->render('admin',array(
			'model'=>$model,
		)); */
		$this->redirect(array('incidents/index'));
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
	
	public function actionNote(){
		$this->layout='//layouts/popup';
		
		if(isset($_POST['note']))
		{
			$note = $_POST['note'];
			$id = Yii::app()->request->getParam('id');
			
			if(@Incidents::model()->updateByPk($id, array('brief_notes'=>$note))){
				echo "<div style='background-color: #ccc; padding: 2px; font-size: 13px; width: 100%;' >The information you provided has been saved.</div>";
			}else{
				echo "<div style='background-color: red; padding: 2px; font-size: 13px; width: 100%; color: #fff;' >The information you provided was not saved. Please try again.</div>";
			}
			
		}
		
		$this->render('note');
	}
	
	public function actionActivityType(){
		$this->layout='//layouts/popup';
		
		if(isset($_POST['activity_type']))
		{
			$activity_type = $_POST['activity_type'];
			$id = Yii::app()->request->getParam('id');
			
			if(@Incidents::model()->updateByPk($id, array('type_of_operation'=>$activity_type))){
				echo "<div style='background-color: #ccc; padding: 2px; font-size: 13px; width: 100%;' >The information you provided has been saved.</div>";
			}else{
				echo "<div style='background-color: red; padding: 2px; font-size: 13px; width: 100%; color: #fff;' >The information you provided was not saved. Please try again.</div>";
			}
			
		}
		
		$this->render('activity_type');
	}
	
	public function actionPersonResponsible(){
		$this->layout='//layouts/popup';
		
		if(isset($_POST['person_responsible']))
		{
			$person_responsible = $_POST['person_responsible'];
			$id = Yii::app()->request->getParam('id');
			
			if(@Incidents::model()->updateByPk($id, array('person_responsible'=>$person_responsible))){
				echo "<div style='background-color: #ccc; padding: 2px; font-size: 13px; width: 100%;' >The information you provided has been saved.</div>";
			}else{
				echo "<div style='background-color: red; padding: 2px; font-size: 13px; width: 100%; color: #fff;' >The information you provided was not saved. Please try again.</div>";
			}
			
		}
		
		$this->render('person_responsible');
	}
	
	public function actionPrint(){
		$this->layout='//layouts/print';
		$this->render('print');
	}
	public function actionForm122($incident){
		$this->layout='//layouts/print';
		 
		$model=Incidents::model()->findByPk($incident);

		$this->render('form122',array(
			'model'=>$model,
		));
	}

	
	public function actionRegister()
	{
		$this->layout='//layouts/print';
		$dataProvider=new CActiveDataProvider('Incidents');
		
		$category = Yii::app()->request->getParam('category');
		$main_category = Yii::app()->request->getParam('main_category');
		$status = Yii::app()->request->getParam('status');
		
		if($status == NULL){$status=1;}
		if($status != NULL){
			$dataProvider=new CActiveDataProvider('Incidents', array(
				/* 'sort'=>array(
					'defaultOrder'=>'modified DESC',
					), */
				'criteria'=>array(
						'condition'=>"status=:s",
						'params'=>array(':s'=>$status),
					),  
				'pagination' => array('pageSize' => 100),			
			));
			
			if($main_category != NULL){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'modified DESC',
						), */
					'criteria'=>array(
							'condition'=>"status=:s and main_category=:c",
							'params'=>array(':s'=>$status, ':c'=>"{$main_category}"),
						),  
					'pagination' => array('pageSize' => 100),
				));
			}

		}
		
		if($main_category != NULL){
			$dataProvider=new CActiveDataProvider('Incidents', array(
				/* 'sort'=>array(
					'defaultOrder'=>'modified DESC',
					), */
				'criteria'=>array(
							'condition'=>"main_category=:c",
							'params'=>array(':c'=>$main_category),
						),  
				'pagination' => array('pageSize' => 100),
			));
			
			if($status != NULL){
				$dataProvider=new CActiveDataProvider('Incidents', array(
					/* 'sort'=>array(
						'defaultOrder'=>'modified DESC',
						), */
					
					'criteria'=>array(
						'condition'=>"status=:s and main_category=:c",
						'params'=>array(':s'=>$status, ':c'=>"{$main_category}"),
					), 
					'pagination' => array('pageSize' => 100),			
				));
			}
		}
		
		$this->render('register',array(
			'dataProvider'=>$dataProvider,
		));
		// $this->redirect(array('admin'));
	}
	
	public function actionForm124($id)
	{
		$this->layout='//layouts/print-datatable';
		
		$this->render('form124',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionRiskAnalysis($year = null){
		if(isset($_GET['type'])){
		$type=$_GET['type'];
		}
		else{
		$type="none";
		}
		if($year == null){
			$year = date('Y');
		}
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}
		$hazard_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE main_category =  'Hazard' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$incident_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE main_category =  'Incident' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$sitrep_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE main_category =  'SITREP' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$issue_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE main_category =  'Issue' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		
		$hazards = Yii::app()->db->createCommand($hazard_sql)->queryAll();
		$incidents = Yii::app()->db->createCommand($incident_sql)->queryAll();
		$sitreps = Yii::app()->db->createCommand($sitrep_sql)->queryAll();
		$issues = Yii::app()->db->createCommand($issue_sql)->queryAll();
		
		$this->render('risk_analysis',array(
			'hazards'=>$this->calculateMonthRisks($hazards),
			'incidents'=>$this->calculateMonthRisks($incidents),
			'sitreps'=>$this->calculateMonthRisks($sitreps),
			'issues'=>$this->calculateMonthRisks($issues),
'type'=>$type

		));

	}

		public function actionRiskAnalysiscat($year = null){
		if(isset($_GET['type'])){

$type=$_GET['type'];
}
else{
$type="select";


}

	
		if($year == null){
			$year = date('Y');
		}
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}
		$oshe_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'OSHE' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$aviation_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'AVIATION' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$minor_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'MINOR' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$serious_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'SERIOUS' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$other_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'Other' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		$none_sql = "SELECT COUNT( * ) AS `count`, MONTH( DATE ) AS `month`  FROM  `incidents` WHERE category =  'None' and YEAR(date) = ".$year." GROUP BY MONTH( DATE )"; 
		
		$oshe = Yii::app()->db->createCommand($oshe_sql)->queryAll();
		$aviation = Yii::app()->db->createCommand($aviation_sql)->queryAll();
		$minor = Yii::app()->db->createCommand($minor_sql)->queryAll();
		$serious = Yii::app()->db->createCommand($serious_sql)->queryAll();
		$other = Yii::app()->db->createCommand($other_sql)->queryAll();
		$none = Yii::app()->db->createCommand($none_sql)->queryAll();
		

		$model= array('oshe' =>  $this->calculateMonthRisks($oshe),
					  'aviation'=>$this->calculateMonthRisks($aviation),
					  'minor'=>$this->calculateMonthRisks($minor),
					  'serious'=>$this->calculateMonthRisks($serious),
					  'other'=>$this->calculateMonthRisks($other),
					  'none'=>$this->calculateMonthRisks($none));
		if($type!='select'){
		
			$model=array($type => $model[$type]);
		}
		
		$this->render('risk_ana_cat',array('model'=>$model,'type'=>$type));

	}
	
	public function calculateMonthRisks($dates){
		$months;
		foreach($dates as $date){
			$months[$date['month']] = $date['count'];
		}
		for($i = 0; $i<12; $i++){
			if(!isset($months[$i+1])){
			$months[$i+1] = 0;
			}
		}
		return $months;
	}
	
	public function systemMailer($users, $subject, $body){
		foreach($users as $user){
			$this->sendEMail($user->email, $subject, $body);
		}
	}
	
	public function sendEMail($email, $subject, $body){
		$from = "smsdans@caa.co.ug";
		
		$headers="From: SMS System <{$from}>\r\n".
			"MIME-Version: 1.0\r\n".
			"Content-Type: text/plain; charset=UTF-8";
			
		@mail($email,$subject,$body,$headers);
	}
}