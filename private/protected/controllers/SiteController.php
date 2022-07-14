<?php

class SiteController extends Controller
{
	
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
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
			array('allow',  // allow all users to perform actions
				'actions'=>array('login', 'logout'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('index','dashboard'),
				'users'=>array('@'), 
			),
			array('allow', 
				'actions'=>array('hazardregister', 'sitrep', 'hazardreport', 'form123', 'incidentSummary', 'effectiveness', 'hazardworksheet', 'effectivenesscharts'),
				'users'=>array('@'), 'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionEffectiveness(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		$this->layout='//layouts/main';
		$this->render('effectiveness');
	}
	
	public function actionEffectivenessCharts(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		$this->layout='//layouts/main';
		$this->render('effectiveness_charts');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// $this->layout='//layouts/home';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->render('index');
		$this->redirect(array('/site/login'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='//layouts/login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
		//	$username = $_POST['LoginForm']['username'];
		//	$userinfo = @Users::model()->find("username = '{$username}' and status = 1");
		/*if(($userinfo->category == 'admin')||($userinfo->category == 'sitrep')){*/
				if($model->validate() && $model->login())
					/* $this->redirect(Yii::app()->user->returnUrl); */
					if(Yii::app()->user->role=='STREP Admin'){
						
						$this->redirect(array('incidents/index','main_category'=>'SITREP'));
					}
					else{
						$this->redirect(array('site/dashboard'));

					}

			/*}*/
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		/* $this->redirect(Yii::app()->homeUrl); */
		$this->redirect(array('/site/login'));
	}
	
	public function actionHazardRegister()
	{
		$this->layout='//layouts/print';
		$this->render('/site/hazard-register');
	}
    public function actionHazardWorksheet()
	{
		$this->layout='//layouts/print-tablesaw';
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['search_worksheet'])){$search_worksheet = 1;}else{$search_worksheet = 0;}
		if(isset($_POST['display_option'])){$display_option = $_POST['display_option'];}else{$display_option = "LINK";}
		
		$this->render('/site/hazard-worksheet-1',array(
					'start_date'=>$start_date,
					'end_date'=>$end_date,
					'search_worksheet'=>$search_worksheet,
					'display_option'=>$display_option,
				));
	}
	
	public function actionSitrep()
	{
		$this->layout='//layouts/print';
		$this->render('/site/sitrep');
	}
	
	public function actionOccurrence()
	{
		$this->render('/site/occurrence');
	}
	
	public function actionHazardReport()
	{
		$this->layout='//layouts/print';
		$this->render('/site/hazard-report');
	}
	
	public function actionForm123()
	{
		$this->layout='//layouts/print';
		$this->render('/site/form123');
	}
	
	public function actionDashBoard()
	{
		Yii::app()->user->setState('m_1', 0);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		/* $this->layout='//layouts/dashboard'; */
		$this->layout='//layouts/main';
		$this->render('/site/dashboard');
	}
	
	public function actionIncidentSummary()
	{
		$this->layout='//layouts/print';
		$this->render('/site/incident-summary');
	}
}