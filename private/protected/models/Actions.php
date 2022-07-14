<?php

/**
 * This is the model class for table "actions".
 *
 * The followings are the available columns in table 'actions':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property string $deadline
 * @property string $date_action_taken
 * @property string $notification
 * @property integer $status
 * @property integer $incident_id
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class Actions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('details, reported_by', 'required'),
			array('status, incident_id', 'numerical', 'integerOnly'=>true),
			array('deadline, date_action_taken', 'length', 'max'=>128),
			array('reported_by', 'length', 'max'=>32),
			array('accepted', 'length', 'max'=>3),
			array('comment,notification,', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, modified, deadline, notification,date_action_taken, status, incident_id, reported_by, accepted, comment', 'safe', 'on'=>'search'),
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
			'incident' => array(self::BELONGS_TO, 'Incidents', 'incident_id'),
			'sr' => array(self::BELONGS_TO, 'SafetyRecommendations', 'safety_recommendation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'details' => 'Details',
			'modified' => 'Modified',
			'deadline' => 'Deadline',
			'date_action_taken' => 'Date Action Taken',
			'status' => 'Status',
			'incident_id' => 'Incident',
			'accepted' => 'Accepted',
			'comment' => 'Comment',
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

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('id',$this->id);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('date_action_taken',$this->date_action_taken,true);
		$criteria->compare('status',1);
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('notification',$this->notification);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getActionsTwoDays() {
			$criteria=new CDbCriteria;
			$criteria->addCondition("deadline = DATE(NOW() + INTERVAL 2 DAY) and notification !='2 days Sent'");
			$model = Actions::model()->findAll($criteria);
			foreach ($model as $action) {
				$action->notification='2 days Sent';
				$action->save();
				# code...
			}
			return $model;
	}

	public static function getActionsToday() {
			$criteria=new CDbCriteria;
			$criteria->addCondition("deadline = DATE(NOW()) and notification !='Final Sent' ");
			
			$model = Actions::model()->findAll($criteria);
			foreach ($model as $action) {
				$action->notification='Final Sent';
				$action->save();
				# code...
			}
			return $model;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Actions::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
