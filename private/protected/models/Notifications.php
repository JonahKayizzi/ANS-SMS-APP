<?php

/**
 * This is the model class for table "notifications".
 *
 * The followings are the available columns in table 'notifications':
 * @property integer $id
 * @property string $description
 * @property string $status
 * @property integer $user
 * @property integer $user_from
 * @property string $date_created
 * @property string $type
 * @property string $subject
 * @property integer $urgent
 * 
 * 
 * 
 * The followings are the available model relations:
 * @property Users $user_to_relation
 * @property Users $user_from_relation
 */
class Notifications extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description,user,user_from,subject,urgent,type','required'),
			array('user, target_group, acknowledge', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>7),
			array('date_created,type,subject', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, status, type,subject, date_created,type,urgent, target_group, acknowledge', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user_to_relation' => array(self::BELONGS_TO, 'Users', 'user'),
			'user_from_relation' => array(self::BELONGS_TO, 'Users', 'user_from'),
			'targetGroup' => array(self::BELONGS_TO, 'Users', 'target_group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'status' => 'Status',
			'user' => 'User',
			'user_from' => 'From',
			'date_created' => 'Date',
			'type' => 'Type',
			'subject' => 'Subject',
			'urgent' => 'Urgent',
			'target_group' => 'Target Group',

		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria; 

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('urgent',$this->urgent,true);
		
		$criteria->order = "id DESC";
		$login_id = @Yii::app()->user->id;
		$criteria->addCondition('user = '.$login_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/* public static function sendEmail($email,$subject,$msg)
	{

		 return @mail($email,$subject,$msg);
		 
	} */
	public function afterSave(){

		$this->sendEmail($this->getUserEmail(),$this->subject,$this->description);
	}
	public function getUserEmail(){
		$model=Users::model()->findByPk($this->user);
		return $model->email;
	}
	
	public function getUserNotificationCount($user_id){
		$sql = "select count(*) as total_messages from notifications where user = '{$user_id}' and status = 'sent'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_messages']);
	}
	
	public function sendGroupEmails($users, $subject, $body){
		foreach($users as $user){
			$this->sendEmail($user->email, $subject, $body);
		}
	}
	
	public function sendEmail($email, $subject, $body){
		$from = "smsappcaa@gmail.com";
		
		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587'; 
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = 'smsappcaa@gmail.com';
		$mail->Password = 'U4*Rf:{SD*W9&kut';
		$mail->SetFrom('smsappcaa@gmail.com','SMS APP');
		$mail->Subject = $subject;
		$mail->AltBody = $body;
		$mail->MsgHTML($body); 
		$mail->AddAddress($email);
		$mail->Send();
	}
	
	public function sendGroupNotifications($users, $subject, $description, $urgent){
		$type='GROUP';
		foreach($users as $user){			
			$this->sendNotification($subject, $description, $user->id, $type, $urgent);
		}
		
	}
	
	public function sendGroupNotifications_Console($users, $subject, $description, $urgent){
		$type='GROUP';
		foreach($users as $user){			
			$this->sendNotification_Console($subject, $description, $user->id, $type, $urgent);
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
	
	public function sendNotification_Console($subject, $description, $user_to, $type, $urgent){
		$user_from = 0;
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
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Notifications::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
	
	public function statusStyler($value){
		if($value == 'read'){
			$return = "<div class='btn btn-xs btn-success'>Read</div>";
		}else{
			$return = "<div class='btn btn-xs btn-info'>Unread</div>";
		}
		return $return;
	}

}
