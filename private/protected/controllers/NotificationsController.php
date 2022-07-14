<?php

class NotificationsController extends Controller
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
				'actions'=>array('index','view','getUserOptions','markRead','sent'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','chatone'),
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
		Yii::app()->user->setState('m_1', 0);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		
		if(isset($_GET['acknowledge'])){
			@Notifications::model()->updateByPk($id, array('acknowledge'=>1));
		}
		//mark message as read
		@Notifications::model()->updateByPk($id, array('status'=>'read'));
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
		Yii::app()->user->setState('m_1', 0);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Notifications();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notifications']))
		{
			$model->attributes=$_POST['Notifications'];
			$model->user_from=Yii::app()->user->getId();
			if($_POST['Notifications']['urgent'] == 1){$model->subject = 'URGENT!! '.$model->subject;}
			if($_POST['Notifications']['type'] == 'GROUP'){
				//send notifications to group memebrs
				$group_users = @Users::model()->findAll("user_group_id = '{$_POST['Notifications']['user']}'");
				
				$this->sendGroupNotifications($group_users, $model->subject, $_POST['Notifications']['description'], $_POST['Notifications']['urgent']);
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionMarkRead(){
		if(isset($_POST['notification'])){
			echo $_POST['notification'];
			$model= Notifications::model()->findByPk($_POST['notification']);
			print_r($model);
			$model->status='read';
			$model->update();

			echo 'done';

		}
	}
	public function actionUpdate($id)
	{
		Yii::app()->user->setState('m_1', 0);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notifications']))
		{
			$model->attributes=$_POST['Notifications'];
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
	public function actionSent()
	{
		$notifications=Notifications::model()->with('user_from_relation')->findAll(array("condition"=>"user_from=".Yii::app()->user->getId(),"order"=>"t.id desc"));


		$this->render('sent',array('notifications'=>$notifications));
	}
	public function actionIndex()
	{
		/* $this->layout='//layouts/main';
		
		$notifications=Notifications::model()->with('user_from_relation')->findAll(array("condition"=>"user=".Yii::app()->user->getId()." and type='PRIVATE'","order"=>"t.id desc"));
		$usergroup=$this->getUserGroupId();
		if($usergroup){

			$groupNotifications=Notifications::model()->with('user_from_relation')->findAll(array("condition"=>"user=".$usergroup->id." and type='GROUP'","order"=>"t.id desc"));

		}

		$this->render('index',array('usersGroup'=>$usergroup,'notifications'=>$notifications,'groupNotifications'=>$groupNotifications)); */
		
		$this->redirect(array('admin'));
	}

	public function getUserGroupId(){

		$usergroup=UserGroups::model()->find("name='".Yii::app()->user->role."'");
		if($usergroup){
			return $usergroup ;
		}
		return null;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->user->setState('m_1', 0);
		Yii::app()->user->setState('m_2', 0);
		Yii::app()->user->setState('m_3', 0);
		
		$this->layout='//layouts/main';
		$model=new Notifications('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Notifications']))
			$model->attributes=$_GET['Notifications'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionChatone($id){
		$this->layout='//layouts/print';
		
		$notifications=Notifications::model()->with('user_from_relation')->findAll("user=".Yii::app()->user->getId()." or user_from=".$id);
		$this->render('chatone',array(
			'model'=>$notifications,
		));
	}
	public function actionGetUserOptions(){
		
		if(isset($_POST['Notifications'])){
		 
			if($_POST['Notifications']['type']=='PRIVATE'){
				 $data=Users::model()->findAll();
 				 
    			foreach($data as $value)
    			{
        			echo CHtml::tag('option',array('value'=>$value->id),CHtml::encode($value->name),true);
                                   
                                   
    			}

			}
			else{

				$data=UserGroups::model()->findAll();
 			
    			foreach($data as $value)
    			{
        			echo CHtml::tag('option',array('value'=>$value->id),CHtml::encode($value->name),true);
                                   
                                   
    			}
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Notifications the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Notifications::model()->with('user_to_relation')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Notifications $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='notifications-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}