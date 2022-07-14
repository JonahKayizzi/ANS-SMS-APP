<?php

/**
 * This is the model class for table "sms_form_124_data".
 *
 * The followings are the available columns in table 'sms_form_124_data':
 * @property integer $id
 * @property integer $incident_id
 * @property string $type_of_incident
 * @property string $case_no
 * @property string $employee_name
 * @property string $employee_number
 * @property string $supervisor
 * @property string $department
 * @property string $location_of_incident
 * @property string $movement_area
 * @property string $hospital
 * @property string $date_of_incident
 * @property string $time_of_incident
 * @property string $date_reported
 * @property string $type_of_injury
 * @property string $body_part_injured
 * @property string $cause_of_incident
 * @property string $incident_site
 * @property string $type_of_equipment_involved
 * @property string $related_act
 * @property string $weather_conditions
 * @property string $incident_description
 * @property string $investigation
 * @property string $area_supervisor
 * @property string $analysis_date
 * @property string $completed_by
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SmsForm124Data extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_form_124_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incident_description, type_of_incident, location_of_incident, date_of_incident, time_of_incident, date_reported, completed_by, incident_id', 'required'),
			array('analysis_date, date_of_incident, date_reported', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('incident_id, status', 'numerical', 'integerOnly'=>true),
			array('type_of_incident, case_no, employee_name, employee_number, movement_area, time_of_incident, area_supervisor', 'length', 'max'=>128),
			array('supervisor, department, location_of_incident, hospital, type_of_injury, body_part_injured, cause_of_incident, incident_site, type_of_equipment_involved, related_act, weather_conditions', 'length', 'max'=>256),
			array('investigation', 'length', 'max'=>10000),
			array('completed_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, type_of_incident, case_no, employee_name, employee_number, supervisor, department, location_of_incident, movement_area, hospital, date_of_incident, time_of_incident, date_reported, type_of_injury, body_part_injured, cause_of_incident, incident_site, type_of_equipment_involved, related_act, weather_conditions, incident_description, investigation, area_supervisor, analysis_date, completed_by, modified, status', 'safe', 'on'=>'search'),
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
			'incident_id' => 'Incident',
			'type_of_incident' => 'Type Of Incident',
			'case_no' => 'Case #',
			'employee_name' => 'Employee Name',
			'employee_number' => 'Employee #',
			'supervisor' => 'Supervisor',
			'department' => 'Department',
			'location_of_incident' => 'Field Location Of Incident',
			'movement_area' => 'Movement Area Y/N',
			'hospital' => 'Hospital(if applicable)',
			'date_of_incident' => 'Date Of Incident',
			'time_of_incident' => 'Time Of Incident',
			'date_reported' => 'Date Reported',
			'type_of_injury' => 'Type Of Occupational Injury/Illness or Damage',
			'body_part_injured' => 'Part of Body Injured or Equipment Damaged',
			'cause_of_incident' => 'Probable Cause Of Incident',
			'incident_site' => 'Incident Site/Location of Occurrence',
			'type_of_equipment_involved' => 'Type Of Equipment Involved (if applicable)',
			'related_act' => 'Related Act/Condition',
			'weather_conditions' => 'Weather Conditions at Time of Incident',
			'incident_description' => 'Description of Incident ',
			'investigation' => 'Investigation',
			'area_supervisor' => 'Area Supervisor (name of person responsible for the area the incident occured in)',
			'analysis_date' => 'Date of Analysis',
			'completed_by' => 'Completed By',
			'modified' => 'Modified',
			'status' => 'Status',
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
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('type_of_incident',$this->type_of_incident,true);
		$criteria->compare('case_no',$this->case_no,true);
		$criteria->compare('employee_name',$this->employee_name,true);
		$criteria->compare('employee_number',$this->employee_number,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('location_of_incident',$this->location_of_incident,true);
		$criteria->compare('movement_area',$this->movement_area,true);
		$criteria->compare('hospital',$this->hospital,true);
		$criteria->compare('date_of_incident',$this->date_of_incident,true);
		$criteria->compare('time_of_incident',$this->time_of_incident,true);
		$criteria->compare('date_reported',$this->date_reported,true);
		$criteria->compare('type_of_injury',$this->type_of_injury,true);
		$criteria->compare('body_part_injured',$this->body_part_injured,true);
		$criteria->compare('cause_of_incident',$this->cause_of_incident,true);
		$criteria->compare('incident_site',$this->incident_site,true);
		$criteria->compare('type_of_equipment_involved',$this->type_of_equipment_involved,true);
		$criteria->compare('related_act',$this->related_act,true);
		$criteria->compare('weather_conditions',$this->weather_conditions,true);
		$criteria->compare('incident_description',$this->incident_description,true);
		$criteria->compare('investigation',$this->investigation,true);
		$criteria->compare('area_supervisor',$this->area_supervisor,true);
		$criteria->compare('analysis_date',$this->analysis_date,true);
		$criteria->compare('completed_by',$this->completed_by,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SmsForm124Data the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SmsForm124Data::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
