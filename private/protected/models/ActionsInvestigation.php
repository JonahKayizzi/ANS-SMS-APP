<?php

/**
 * This is the model class for table "actions_investigation".
 *
 * The followings are the available columns in table 'actions_investigation':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property string $deadline
 * @property string $date_action_taken
 * @property integer $status
 * @property integer $investigation_id
 * @property string $reported_by
 * @property string $accepted
 * @property string $comment
 * @property string $notification
 */
class ActionsInvestigation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actions_investigation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('details', 'required'),
			array('status, investigation_id', 'numerical', 'integerOnly'=>true),
			array('deadline, date_action_taken', 'length', 'max'=>128),
			array('reported_by', 'length', 'max'=>32),
			array('accepted', 'length', 'max'=>3),
			array('comment', 'length', 'max'=>256),
			array('notification', 'length', 'max'=>20),
			array('details', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, modified, deadline, date_action_taken, status, investigation_id, reported_by, accepted, comment, notification', 'safe', 'on'=>'search'),
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
			'investigation_id' => 'Investigation',
			'reported_by' => 'Reported By',
			'accepted' => 'Accepted',
			'comment' => 'Comment',
			'notification' => 'Notification',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('investigation_id',$this->investigation_id);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('accepted',$this->accepted,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('notification',$this->notification,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActionsInvestigation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = ActionsInvestigation::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
