<?php

/**
 * This is the model class for table "sms_form_124_corrective_actions".
 *
 * The followings are the available columns in table 'sms_form_124_corrective_actions':
 * @property integer $id
 * @property string $action
 * @property string $owner
 * @property string $completion_date
 * @property string $modified
 * @property integer $status
 * @property integer $incident_id
 * @property string $reported_by
 * @property integer $priority
 * @property string $completed_on
 * @property string $completion_status
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SmsForm124CorrectiveActions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_form_124_corrective_actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action, owner, completion_date, reported_by, priority, incident_id, completion_date', 'required'),
			array('completion_date', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('status, incident_id, priority', 'numerical', 'integerOnly'=>true),
			array('action', 'length', 'max'=>256),
			array('remark', 'length', 'max'=>1000),
			array('owner', 'length', 'max'=>128),
			array('reported_by, completed_on', 'length', 'max'=>32),
			array('completion_status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, action, owner, completion_date, modified, status, incident_id, reported_by, priority, completed_on, completion_status, remark', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'action' => 'Action',
			'remark' => 'Remark',
			'owner' => 'Owner',
			'completion_date' => 'Completion Date',
			'modified' => 'Modified',
			'status' => 'Status',
			'incident_id' => 'Incident',
			'reported_by' => 'Reported By',
			'priority' => 'Priority',
			'completed_on' => 'Completed On',
			'completion_status' => 'Completion Status',
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
		$criteria->compare('action',$this->action,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('completion_date',$this->completion_date,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('completed_on',$this->completed_on,true);
		$criteria->compare('completion_status',$this->completion_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SmsForm124CorrectiveActions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SmsForm124CorrectiveActions::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
