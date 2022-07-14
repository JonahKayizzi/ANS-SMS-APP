<?php

/**
 * This is the model class for table "actions_safety_recommendations".
 *
 * The followings are the available columns in table 'actions_safety_recommendations':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property string $deadline
 * @property string $date_action_taken
 * @property integer $status
 * @property integer $sr_id
 * @property string $reported_by
 * @property string $accepted
 * @property string $comment
 * @property string $notification
 * @property integer $current_user
 * @property integer $current_user_id
 */
class ActionsSafetyRecommendations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actions_safety_recommendations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_action_taken, details', 'required'),
			array('status, sr_id, current_user, current_user_id', 'numerical', 'integerOnly'=>true),
			array('deadline, date_action_taken', 'length', 'max'=>128),
			array('reported_by', 'length', 'max'=>32),
			array('accepted', 'length', 'max'=>3),
			array('comment', 'length', 'max'=>256),
			array('notification', 'length', 'max'=>20),
			array('details', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, modified, deadline, date_action_taken, status, sr_id, reported_by, accepted, comment, notification, current_user, current_user_id', 'safe', 'on'=>'search'),
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
			'sr_id' => 'Sr',
			'reported_by' => 'Reported By',
			'accepted' => 'Accepted',
			'comment' => 'Comment',
			'notification' => 'Notification',
			'current_user' => 'Current User',
			'current_user_id' => 'Current User',
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
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('date_action_taken',$this->date_action_taken,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sr_id',$this->sr_id);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('accepted',$this->accepted,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('notification',$this->notification,true);
		$criteria->compare('current_user',$this->current_user);
		$criteria->compare('current_user_id',$this->current_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActionsSafetyRecommendations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
