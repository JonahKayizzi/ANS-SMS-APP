<?php

class RiskAnalysisController extends Controller
{

	public $layout='//layouts/column2';


	public function actionIndex($year = null){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
		$this->layout='//layouts/main';
		if(isset($_GET['type']))
			$type=$_GET['type'];
		else
			$type="none";

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
		
		$this->render('index',array(
			'hazards'=>$this->calculateMonthRisks($hazards),
			'incidents'=>$this->calculateMonthRisks($incidents),
			'sitreps'=>$this->calculateMonthRisks($sitreps),
			'issues'=>$this->calculateMonthRisks($issues),
			'type'=>$type

		));

 	}

 	public function actionHazardCategory(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
		$this->layout='//layouts/main';
 		$model= new TrendAnalysis();

 		if(isset($_POST['TrendAnalysis'])){
			$model->attributes=$_POST['TrendAnalysis']; 
			$model->title='Hazard Categories';
						
 		}
 		else{
		$model->selectionType='year';
		$model->year=date('Y');
		$model->chatType='bar';
		$model->title='Hazard Categories';
 		}
	
		$trends=$model->getHazardCategories();
		$this->render('hazard_cat',array("model"=>$model,"trends"=>$trends));
		
		

	}

	public function actionIssueCategory(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
		$this->layout='//layouts/main';
 		$model= new TrendAnalysis();

 		if(isset($_POST['TrendAnalysis'])){
			$model->attributes=$_POST['TrendAnalysis']; 
			$model->title='Issue Categories';
						
 		}
 		else{
		$model->selectionType='year';
		$model->year=date('Y');
		$model->chatType='bar';
		$model->title='Issue Categories';
 		}
	
		$trends=$model->getIssueCategories();
		$this->render('hazard_cat',array("model"=>$model,"trends"=>$trends));
		
		

	}

	public function actionStatusCategory(){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
		$this->layout='//layouts/main';
 		$model= new TrendAnalysis();

 		if(isset($_POST['TrendAnalysis'])){
			$model->attributes=$_POST['TrendAnalysis']; 
			$model->title='Issue Categories';
						
 		}
 		else{
		$model->selectionType='year';
		$model->year=date('Y');
		$model->chatType='bar';
		$model->title='Issue Categories';
 		}
	
		$trends=$model->getStatusCategories();
		$this->render('hazard_cat',array("model"=>$model,"trends"=>$trends));
		
		

	}

public function actionReportCategory(){
	Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
	$this->layout='//layouts/main';
 		$model= new TrendAnalysis();

 		if(isset($_POST['TrendAnalysis'])){
			$model->attributes=$_POST['TrendAnalysis']; 
			$model->title='Issue Categories';
						
 		}
 		else{
		$model->selectionType='year';
		$model->year=date('Y');
		$model->chatType='bar';
		$model->title='Issue Categories';
 		}
	
		$trends=$model->getReportCategories();
		$this->render('hazard_cat',array("model"=>$model,"trends"=>$trends));
		
		

	}



 	public function calculateMonthRisks($dates){
		Yii::app()->user->setState('m_1', 2);
		Yii::app()->user->setState('m_2', 5);
		
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

}