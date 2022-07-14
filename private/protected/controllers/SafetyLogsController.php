<?php

class SafetyLogsController extends Controller
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
				'users'=>array('@'), 'expression' => array('SafetyLogs','checkIfUserIsCurrentRecordViewer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'index'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','data','summary', 'summaryprint','graphs', 'graphsprint','cause','category'),
				'users'=>array('@'),
				'expression' => array('Users','checkIfUserIsAdmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('@'),
				'expression' => array('Users','checkIfUserIsAdmin'),
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
		$model=new SafetyLogs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SafetyLogs']))
		{
			$model->attributes=$_POST['SafetyLogs'];
			$model->user = Yii::app()->user->id;
			$model->date = date('Y-m-d');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	 public function actionGraphs(){
		 Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_option'])){$search_option = $_POST['search_option'];}else{$search_option = 'All';}
		if(isset($_POST['search_value'])){$search_value = $_POST['search_value'];}else{$search_value = '';}
		
		$this->layout='//layouts/main';
        $categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll();
		$this->render('graphs',array(
					'causes'=>$causes,
					'categories'=>$categories,
					'start_date'=>$start_date,
					'end_date'=>$end_date,
					'period_type'=>$period_type,
					'chart_type'=>$chart_type,
					'search_option'=>$search_option,
					'search_value'=>$search_value,
				));
       }
	   
	   public function actionGraphsPrint(){
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_GET['start_date'])){$start_date = $_GET['start_date'];}else{$start_date = $start_date;}
		if(isset($_GET['end_date'])){$end_date = $_GET['end_date'];}else{$end_date = date('Y-m-d');}
		
		if(isset($_GET['period_type'])){$period_type = $_GET['period_type'];}else{$period_type = 3;}
		if(isset($_GET['chart_type'])){$chart_type = $_GET['chart_type'];}else{$chart_type = 1;}
		if(isset($_GET['search_option'])){$search_option = $_GET['search_option'];}else{$search_option = 'All';}
		if(isset($_GET['search_value'])){$search_value = $_GET['search_value'];}else{$search_value = '';}
		
		$this->layout='//layouts/print';
        $categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll();
		$this->render('graphs_print',array(
					'causes'=>$causes,
					'categories'=>$categories,
					'start_date'=>$start_date,
					'end_date'=>$end_date,
					'period_type'=>$period_type,
					'chart_type'=>$chart_type,
					'search_option'=>$search_option,
					'search_value'=>$search_value,
				));
       }
	   
       public function actionSummary(){
		   Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = '1990-01-01';}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		
		$this->layout='//layouts/main';
        $categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll();
		$this->render('summary',array(
					'causes'=>$causes,
					'categories'=>$categories,
					'start_date'=>$start_date,
					'end_date'=>$end_date,
				));
       }
	   
	   public function actionSummaryPrint(){
		
		
		if(isset($_GET['start_date'])){$start_date = $_GET['start_date'];}else{$start_date = '1990-01-01';}
		if(isset($_GET['end_date'])){$end_date = $_GET['end_date'];}else{$end_date = date('Y-m-d');}
		
		$this->layout='//layouts/print';
        $categories=SafetyLogsCategories::model()->findAll();
        $causes=SafetyLogsCauses::model()->findAll();
		$this->render('summary_print',array(
					'causes'=>$causes,
					'categories'=>$categories,
					'start_date'=>$start_date,
					'end_date'=>$end_date,
				));
       }
       public function actionData(){
		   Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = '1990-01-01';}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['search_criteria1'])){$search_criteria1 = $_POST['search_criteria1'];}
		if(isset($_POST['search_criteria2'])){$search_criteria2 = $_POST['search_criteria2'];}
		if(isset($_POST['search_field2'])){$search_field2 = $_POST['search_field2'];}
		if(isset($_POST['search_field1'])){$search_field1 = $_POST['search_field1'];}
		
		if(isset($_POST['search_category'])){$search_category = $_POST['search_category'];}
		if(isset($_POST['search_cause'])){$search_cause = $_POST['search_cause'];}
		
		 $this->layout='//layouts/main';
/*                 $model=new SafetyLogs('search');
                $search_model= new SearchForm();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SafetyLogs']))
			$model->attributes=$_GET['SafetyLogs'];

		if(isset($_POST['SearchForm'])){
			if($_POST['SearchForm']){
				$search_model->attributes=$_POST['SearchForm'];
				if($search_model->validate()){
					$model->start_date = $search_model->start_date;
					$model->end_date = $search_model->end_date;
					$model->search_creteria1=$search_model->search_criteria1;
					$model->search_field1=$search_model->search_field1;
					$model->search_creteria2=$search_model->search_criteria2;
					$model->search_field2=$search_model->search_field2;
				}

			}	
		} */
		
		if(@Users::model()->checkIfUserCategoryInAdmin()){
			$extension = "";
		}else{
			$current_user_id = Yii::app()->user->id;
			$extension = "and current_user_id = {$current_user_id}";
		}
		if(isset($_POST['start_date'])){
			
			if($_POST['search_criteria2'] != ''){
				$search_criteria2_search = "and {$search_field2} = '{$search_criteria2}'";
			}else{
				$search_criteria2_search = "";
			}
			if($_POST['search_criteria1'] != ''){
				$search_criteria1_search = "and {$search_field1} = '{$search_criteria1}'";
			}else{
				$search_criteria1_search = "";
			}
			
			if($_POST['search_category'] != null){
				$search_category_search = "and category = {$search_category}";
			}else{
				$search_category_search = "";
			}
			
			if($_POST['search_cause'] != null){
				$search_cause_search = "and cause = {$search_cause}";
			}else{
				$search_cause_search = "";
			}
			
			$safety_logs = @SafetyLogs::model()->findAll("date_occured between '{$start_date}' and '{$end_date}' {$extension} {$search_criteria1_search} {$search_criteria2_search} {$search_category_search} {$search_cause_search}  order by id desc limit 0,200");
		}else{
			$safety_logs = @SafetyLogs::model()->findAll("date_occured between '{$start_date}' and '{$end_date}' {$extension}  order by id desc limit 0,200");
		}
		
		
		$this->render('admin-2',array(
			/* 'model'=>$model, */
			'safety_logs'=>$safety_logs,
			'start_date'=>$start_date,
			'end_date'=>$end_date,
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

		if(isset($_POST['SafetyLogs']))
		{
			$model->attributes=$_POST['SafetyLogs'];
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
		
		$dataProvider=new CActiveDataProvider('SafetyLogs');
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
		$model=new SafetyLogs('search');
		$search_model= new SearchForm();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SafetyLogs']))
			$model->attributes=$_GET['SafetyLogs'];
		if(isset($_POST['SearchForm'])){
			$search_model->attributes=$_POST['SearchForm'];
			if($search_model->validate()){
			
				$model->search_creteria1=$search_model->search_criteria1;
				$model->search_field1=$search_model->search_field1;
				$model->search_creteria2=$search_model->search_criteria2;
				$model->search_field2=$search_model->search_field2;
			}

		}
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = '1990-01-01';}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}

		$this->render('admin',array(
			'model'=>$model,
			'search_model'=>$search_model,
			'start_date'=>$start_date,
			'end_date'=>$end_date,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SafetyLogs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SafetyLogs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SafetyLogs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='safety-logs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionCause(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_option'])){$search_option = $_POST['search_option'];}else{$search_option = 'All';}
		if(isset($_POST['search_value'])){$search_value = $_POST['search_value'];}else{$search_value = '';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('cause', array('select_dt'=>$select_dt, 'start_date'=>$start_date, 'end_date'=>$end_date, 'period_type'=>$period_type, 'chart_type'=>$chart_type, 'search_option'=>$search_option, 'search_value'=>$search_value,));
	}
	
	public function actionCategory(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 6);
		Yii::app()->user->setState('m_3', 0);
		
		$today = date('Y-m-d');
		$y = date('Y', strtotime($today));
		$start_date = "{$y}-01-01";
		
		if(isset($_POST['start_date'])){$start_date = $_POST['start_date'];}else{$start_date = $start_date;}
		if(isset($_POST['end_date'])){$end_date = $_POST['end_date'];}else{$end_date = date('Y-m-d');}
		if(isset($_POST['period_type'])){$period_type = $_POST['period_type'];}else{$period_type = 3;}
		if(isset($_POST['chart_type'])){$chart_type = $_POST['chart_type'];}else{$chart_type = 1;}
		if(isset($_POST['search_option'])){$search_option = $_POST['search_option'];}else{$search_option = 'All';}
		if(isset($_POST['search_value'])){$search_value = $_POST['search_value'];}else{$search_value = '';}
		
		$this->layout='//layouts/main';
		if(isset($_POST['datepicker'])){$select_dt = $_POST['datepicker'];}else{$select_dt = date('Y-m-d');}
		$this->render('category', array('select_dt'=>$select_dt, 'start_date'=>$start_date, 'end_date'=>$end_date, 'period_type'=>$period_type, 'chart_type'=>$chart_type, 'search_option'=>$search_option, 'search_value'=>$search_value,));
	}
}