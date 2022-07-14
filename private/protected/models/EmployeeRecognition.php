<?php

/**
 * This is the model class for table "employee_recognition".
 *
 * The followings are the available columns in table 'employee_recognition':
 * @property integer $id
 * @property string $nominator_name
 * @property string $nominator_department
 * @property string $date
 * @property string $nominee_name
 * @property string $nominee_department
 * @property string $nominee_supervisor_name
 * @property string $description_of_actions
 * @property string $date_observed
 * @property string $place_observed
 * @property string $date_received
 * @property string $date_reviewed
 * @property string $additional_information
 * @property string $nomination_accepted
 * @property string $accepted_date
 * @property string $accepted_comments
 * @property string $award_granted
 * @property string $award_level
 * @property string $award_granted_date
 * @property string $award_granted_comments
 * @property integer $chaiperson_approval
 * @property string $chaiperson_approval_date
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 */
class EmployeeRecognition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee_recognition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nominator_name, nominator_department, nominee_name, nominee_department, nominee_supervisor_name, description_of_actions, date_observed, place_observed, reported_by', 'required'),
			array('chaiperson_approval, status', 'numerical', 'integerOnly'=>true),
			array('nominator_name, nominator_department, nominee_name, nominee_department, nominee_supervisor_name, award_granted, award_level', 'length', 'max'=>128),
			array('description_of_actions,date, date_received,chaiperson_approval_date,date_reviewed,accepted_date,accepted_date,award_granted_date,place_observed, additional_information, accepted_comments, award_granted_comments', 'length', 'max'=>256),
			array('nomination_accepted', 'length', 'max'=>4),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nominator_name, nominator_department, date, nominee_name, nominee_department, nominee_supervisor_name, description_of_actions, date_observed, place_observed, date_received, date_reviewed, additional_information, nomination_accepted, accepted_date, accepted_comments, award_granted, award_level, award_granted_date, award_granted_comments, chaiperson_approval, chaiperson_approval_date, modified, status, reported_by', 'safe', 'on'=>'search'),
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
			'nominator_name' => 'Nominator Name',
			'nominator_department' => 'Nominator Department',
			'date' => 'Date',
			'nominee_name' => 'Nominee Name',
			'nominee_department' => 'Nominee Department',
			'nominee_supervisor_name' => 'Nominee Supervisor Name',
			'description_of_actions' => 'Description Of Actions',
			'date_observed' => 'Date Observed',
			'place_observed' => 'Place Observed',
			'date_received' => 'Date Received',
			'date_reviewed' => 'Date Reviewed',
			'additional_information' => 'Additional Information',
			'nomination_accepted' => 'Nomination Accepted',
			'accepted_date' => 'Accepted Date',
			'accepted_comments' => 'Accepted Comments',
			'award_granted' => 'Award Granted',
			'award_level' => 'Award Level',
			'award_granted_date' => 'Award Granted Date',
			'award_granted_comments' => 'Award Granted Comments',
			'chaiperson_approval' => 'Chaiperson Approval',
			'chaiperson_approval_date' => 'Chaiperson Approval Date',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
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
		$criteria->compare('nominator_name',$this->nominator_name,true);
		$criteria->compare('nominator_department',$this->nominator_department,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('nominee_name',$this->nominee_name,true);
		$criteria->compare('nominee_department',$this->nominee_department,true);
		$criteria->compare('nominee_supervisor_name',$this->nominee_supervisor_name,true);
		$criteria->compare('description_of_actions',$this->description_of_actions,true);
		$criteria->compare('date_observed',$this->date_observed,true);
		$criteria->compare('place_observed',$this->place_observed,true);
		$criteria->compare('date_received',$this->date_received,true);
		$criteria->compare('date_reviewed',$this->date_reviewed,true);
		$criteria->compare('additional_information',$this->additional_information,true);
		$criteria->compare('nomination_accepted',$this->nomination_accepted,true);
		$criteria->compare('accepted_date',$this->accepted_date,true);
		$criteria->compare('accepted_comments',$this->accepted_comments,true);
		$criteria->compare('award_granted',$this->award_granted,true);
		$criteria->compare('award_level',$this->award_level,true);
		$criteria->compare('award_granted_date',$this->award_granted_date,true);
		$criteria->compare('award_granted_comments',$this->award_granted_comments,true);
		$criteria->compare('chaiperson_approval',$this->chaiperson_approval);
		$criteria->compare('chaiperson_approval_date',$this->chaiperson_approval_date,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->order = "id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeeRecognition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = EmployeeRecognition::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
