<?php

/**
 * This is the model class for table "incidents".
 *
 * The followings are the available columns in table 'incidents':
 * @property integer $id
 * @property string $number
 * @property string $occurrence
 * @property string $place
 * @property string $time
 * @property string $aircraft_registration
 * @property string $operator
 * @property string $departure_point
 * @property string $persons_on_board
 * @property string $date
 * @property string $reported_by
 * @property integer $status
 * @property string $modified
 * @property string $category
 * @property string $brief_notes
 * @property string $recommendations
 * @property string $type_of_operation
 * @property string $person_responsible
 * @property string $main_category
 * @property string $reported_by_name
 * @property string $reported_by_department
 * @property string $reported_by_tel
 * @property string $reported_by_email
 * @property integer $parent_occurrence
 * @property integer $category_id
 * @property integer $cause_id
 * @property string $other_cause_details
 *
 * The followings are the available model relations:
 * @property Actions[] $actions
 * @property Causes[] $causes
 * @property Consequences[] $consequences
 * @property DutyControllers[] $dutyControllers
 * @property Evidences[] $evidences
 * @property ExistingDefenses[] $existingDefenses
 * @property Feedback[] $feedbacks
 * @property FurtherActions[] $furtherActions
 * @property Status $status0
 * @property IncidentCause $cause
 * @property IncidentCategory $category0
 * @property Investigators[] $investigators
 * @property MonitoringActivities[] $monitoringActivities
 * @property PerformanceTargets[] $performanceTargets
 * @property RecommendedSolutions[] $recommendedSolutions
 * @property Remarks[] $remarks
 * @property SafetyOccurrenceData[] $safetyOccurrenceDatas
 * @property SafetyRecommendations[] $safetyRecommendations
 * @property SafetyRequirements[] $safetyRequirements
 * @property Severity[] $severities
 * @property SmsForm124Comments[] $smsForm124Comments
 * @property SmsForm124ContributingFactors[] $smsForm124ContributingFactors
 * @property SmsForm124CorrectiveActions[] $smsForm124CorrectiveActions
 * @property SmsForm124Data[] $smsForm124Datas
 * @property SmsForm124DataAnalysisChecklist[] $smsForm124DataAnalysisChecklists
 * @property SystemStates[] $systemStates
 * @property Verifications[] $verifications
 */
class Incidents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'incidents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
/*array('number, occurrence, place, time, aircraft_registration, operator, departure_point, persons_on_board, date, reported_by, modified, brief_notes, recommendations, type_of_operation, person_responsible, main_category, reported_by_name, reported_by_department, reported_by_tel, reported_by_email, other_cause_details', 'required'),*/
		return array(
			array('occurrence, place, reported_by, main_category,reported_by_email', 'required'),
			array('reported_by_email', 'email'),
			array('status, parent_occurrence, category_id, cause_id, reoccuring, msgs, reported_by_id', 'numerical', 'integerOnly'=>true),
			array('number, date, reported_by, category, main_category, date_reported, risk_index', 'length', 'max'=>32),
			array('occurrence, operator, type_of_operation, person_responsible', 'length', 'max'=>256),
			array('brief_notes, recommendations', 'length', 'max'=>10000),
			array('date, date_reported', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('place, time, aircraft_registration, departure_point, persons_on_board, reported_by_name, reported_by_department, reported_by_tel, reported_by_email, other_cause_details, incident_category', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, number, occurrence, place, time, aircraft_registration, operator, departure_point, persons_on_board, date, reported_by, status, modified, category, brief_notes, recommendations, type_of_operation, person_responsible, main_category, reported_by_name, reported_by_department, reported_by_tel, reported_by_email, parent_occurrence, category_id, cause_id, other_cause_details, reoccuring, date_reported, risk_index, incident_category, msgs, reported_by_id', 'safe', 'on'=>'search'),
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
			'actions' => array(self::HAS_MANY, 'Actions', 'incident_id'),
			'causes' => array(self::HAS_MANY, 'Causes', 'incident_id'),
			'consequences' => array(self::HAS_MANY, 'Consequences', 'incident_id'),
			'dutyControllers' => array(self::HAS_MANY, 'DutyControllers', 'incident_id'),
			'evidences' => array(self::HAS_MANY, 'Evidences', 'incident_id'),
			'existingDefenses' => array(self::HAS_MANY, 'ExistingDefenses', 'incident_id'),
			'feedbacks' => array(self::HAS_MANY, 'Feedback', 'incident_id'),
			'furtherActions' => array(self::HAS_MANY, 'FurtherActions', 'incident_id'),
			'status0' => array(self::BELONGS_TO, 'Status', 'status'),
			'cause' => array(self::BELONGS_TO, 'IncidentCause', 'cause_id'),
			'category0' => array(self::BELONGS_TO, 'IncidentCategory', 'category_id'),
			'investigators' => array(self::HAS_MANY, 'Investigators', 'incident_id'),
			'monitoringActivities' => array(self::HAS_MANY, 'MonitoringActivities', 'incident_id'),
			'performanceTargets' => array(self::HAS_MANY, 'PerformanceTargets', 'incident_id'),
			'recommendedSolutions' => array(self::HAS_MANY, 'RecommendedSolutions', 'incident_id'),
			'remarks' => array(self::HAS_MANY, 'Remarks', 'incident_id'),
			'safetyOccurrenceDatas' => array(self::HAS_MANY, 'SafetyOccurrenceData', 'incident_id'),
			'safetyRecommendations' => array(self::HAS_MANY, 'SafetyRecommendations', 'incident_id'),
			'safetyRequirements' => array(self::HAS_MANY, 'SafetyRequirements', 'incident_id'),
			'severities' => array(self::HAS_MANY, 'Severity', 'incident_id'),
			'smsForm124Comments' => array(self::HAS_MANY, 'SmsForm124Comments', 'incident_id'),
			'smsForm124ContributingFactors' => array(self::HAS_MANY, 'SmsForm124ContributingFactors', 'incident_id'),
			'smsForm124CorrectiveActions' => array(self::HAS_MANY, 'SmsForm124CorrectiveActions', 'incident_id'),
			'smsForm124Datas' => array(self::HAS_MANY, 'SmsForm124Data', 'incident_id'),
			'smsForm124DataAnalysisChecklists' => array(self::HAS_MANY, 'SmsForm124DataAnalysisChecklist', 'incident_id'),
			'systemStates' => array(self::HAS_MANY, 'SystemStates', 'incident_id'),
			'verifications' => array(self::HAS_MANY, 'Verifications', 'incident_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'number' => 'Number',
			'occurrence' => 'Occurrence',
			'place' => 'Place',
			'time' => 'Time',
			'aircraft_registration' => 'Aircraft Registration',
			'operator' => 'Operator',
			'departure_point' => 'Departure Point',
			'persons_on_board' => 'Persons On Board',
			'date' => 'Date',
			'reported_by' => 'Reported By',
			'status' => 'Status',
			'modified' => 'Modified',
			'category' => 'Category',
			'brief_notes' => 'Description',
			'recommendations' => 'Recommendations',
			'type_of_operation' => 'Type Of Operation',
			'person_responsible' => 'Person Responsible',
			'main_category' => 'Main Category',
			'reported_by_name' => 'Reported By Name',
			'reported_by_department' => 'Reported By Department',
			'reported_by_tel' => 'Reported By Tel',
			'reported_by_email' => 'Reported By Email',
			'parent_occurrence' => 'Parent Occurrence',
			'category_id' => 'Category',
			'cause_id' => 'Cause',
			'other_cause_details' => 'Other Cause Details',
			'reoccuring' => 'Reoccuring',
			'date_reported' => 'Date Reported',
			'incident_category'=>'Incident Category',
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
		$criteria->compare('number',$this->number,true);
		$criteria->compare('occurrence',$this->occurrence,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('aircraft_registration',$this->aircraft_registration,true);
		$criteria->compare('operator',$this->operator,true);
		$criteria->compare('departure_point',$this->departure_point,true);
		$criteria->compare('persons_on_board',$this->persons_on_board,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('brief_notes',$this->brief_notes,true);
		$criteria->compare('recommendations',$this->recommendations,true);
		$criteria->compare('type_of_operation',$this->type_of_operation,true);
		$criteria->compare('person_responsible',$this->person_responsible,true);
		$criteria->compare('main_category',$this->main_category,true);
		$criteria->compare('reported_by_name',$this->reported_by_name,true);
		$criteria->compare('reported_by_department',$this->reported_by_department,true);
		$criteria->compare('reported_by_tel',$this->reported_by_tel,true);
		$criteria->compare('reported_by_email',$this->reported_by_email,true);
		$criteria->compare('parent_occurrence',$this->parent_occurrence);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('cause_id',$this->cause_id);
		$criteria->compare('other_cause_details',$this->other_cause_details,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/* public function afterSave(){

		$msg="Hey ".$this->reported_by_name.",<br/>Your occurrence ".$this->occurrence."has been reported.";
		@mail($this->reported_by_email,"Occurrence Recieved",$msg);
	} */

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Incidents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
