<?php

class StrepController extends Controller
{
	public $layout='//layouts/main';
	public function actionIndex()
	{
		$status = Yii::app()->request->getParam('status');

		$model = new Incidents('search');
		$search_model= new SearchForm();
	
		if(isset($_POST['datepicker-showButtonPanel'])){
			$st_dt = $_POST['datepicker-showButtonPanel'];
			$st_dt = date('Y-m-d', strtotime($st_dt. ' - 1 days'));
			$end_dt = $_POST['datepicker-showButtonPanel2'];
			$end_dt = date('Y-m-d', strtotime($end_dt. ' + 1 days'));

			$model->date_from=$st_dt;
			$model->date_to=$end_dt;

		}
		$model->main_category='SITREP';
		if($status){
			$model->status = $status;   // any filtering value that you want to apply
		}
		else{
			

		}
		
		if(isset($_POST['SearchForm'])){
			if($_POST['SearchForm']){
				$search_model->attributes=$_POST['SearchForm'];
				if($search_model->validate()){
				
					$model->search_creteria=$search_model->search_criteria;
					$model->search_field=$search_model->search_field;
				}
			}	
		}
		
		$dataProvider = $model->search();

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'search_model'=>$search_model,
		));
	}
	public function actionBulk(){
		if(isset($_POST['action'])){
			if(isset($_POST['id'])){
				$ids = $_POST['id'];
  				if(empty($ids)) 
  				{
    				echo("You didn't select any buildings.");
  				} 
  				else
  				{
    				$N = count($ids);
 

    		
    				for($i=0; $i < $N; $i++)
    				{

    					$model=Incidents::model()->findByPk($ids[$i]);
    					
    					//change status
    					if($_POST['action']=='forward'){
    						
    						$model->user_forward=$_POST['userSelect'];
    						$model->forward();


    					}
    					else{

    						$model->changeStatus($_POST['action']);

    					}

    					  
      					
   					}

   					 $this->redirect(array('strep/index&m=success'));
  				}
			}

		}
		else{


		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}