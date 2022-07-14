<?php

/**
 * This is the model class for table "safety_occurrence_data".
 *
 * The followings are the available columns in table 'safety_occurrence_data':
 * @property integer $id
 * @property integer $incident_id
 * @property string $date_of_occurrence
 * @property string $time_of_occurrence
 * @property string $shift
 * @property string $duration_of_shift
 * @property string $time_dc_logged_on_duty
 * @property string $time_dc_logged_off_duty
 * @property string $time_dc_reported_on_duty
 * @property string $time_dc_reported_off_duty
 * @property integer $no_of_personnel_on_shift_roster
 * @property integer $no_of_personnel_on_shift_logbook
 * @property string $density_of_traffic
 * @property integer $no_of_trainees_on_shift
 * @property string $traffic_handled_by_trainee
 * @property string $controller_under_medication
 * @property string $date_from_last_annual_leave
 * @property string $last_training_attended
 * @property string $last_training_date
 * @property string $last_proficiency_date
 * @property string $weather_information
 * @property string $aerodrome_information
 * @property string $controllers_on_duty
 * @property string $completed_by
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SafetyOccurrenceData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_occurrence_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_of_occurrence, time_of_occurrence', 'required'),
			array('incident_id, no_of_personnel_on_shift_roster, no_of_personnel_on_shift_logbook, no_of_trainees_on_shift, status', 'numerical', 'integerOnly'=>true),
			array('time_of_occurrence, shift, duration_of_shift, time_dc_logged_on_duty, time_dc_logged_off_duty, time_dc_reported_on_duty, time_dc_reported_off_duty', 'length', 'max'=>128),
			array('density_of_traffic', 'length', 'max'=>32),
			array('weather_information, aerodrome_information, controllers_on_duty', 'length', 'max'=>1000),
			array('traffic_handled_by_trainee, controller_under_medication', 'length', 'max'=>16),
			array('last_training_attended, completed_by', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, date_of_occurrence, time_of_occurrence, shift, duration_of_shift, time_dc_logged_on_duty, time_dc_logged_off_duty, time_dc_reported_on_duty, time_dc_reported_off_duty, no_of_personnel_on_shift_roster, no_of_personnel_on_shift_logbook, density_of_traffic, no_of_trainees_on_shift, traffic_handled_by_trainee, controller_under_medication, date_from_last_annual_leave, last_training_attended, last_training_date, last_proficiency_date, weather_information, aerodrome_information, controllers_on_duty, completed_by, modified, status', 'safe', 'on'=>'search'),
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
			'date_of_occurrence' => 'Date of occurrence',
			'time_of_occurrence' => 'Time of occurrence',
			'shift' => 'Shift',
			'duration_of_shift' => 'Duration of shift',
			'time_dc_logged_on_duty' => 'Time DC logged on duty',
			'time_dc_logged_off_duty' => 'Time DC logged off duty',
			'time_dc_reported_on_duty' => 'Time/date DC reported on duty (previous shift worked)',
			'time_dc_reported_off_duty' => 'Time/date DC reported off duty (previous shift worked)',
			'no_of_personnel_on_shift_roster' => 'No. of personnel on shift as per roster',
			'no_of_personnel_on_shift_logbook' => 'No. of personnel on shift as per logbook entry',
			'density_of_traffic' => 'Density of traffic',
			'no_of_trainees_on_shift' => 'Number of trainees on shift',
			'traffic_handled_by_trainee' => 'Was the traffic handled by trainee at time of occurrence?',
			'controller_under_medication' => 'Was the controller under any medication?',
			'date_from_last_annual_leave' => 'Date reported back from the last annual leave taken',
			'last_training_attended' => 'Last training/course attended',
			'last_training_date' => 'Date/time of last training/course',
			'last_proficiency_date' => 'Date last proficiency undertaken',
			'weather_information' => 'Weather information (METAR, SPECI, etc)',
			'aerodrome_information' => 'Essential aerodrome information where applicable',
			'controllers_on_duty' => 'Names of all controllers on duty as per ATC logbook',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('date_of_occurrence',$this->date_of_occurrence,true);
		$criteria->compare('time_of_occurrence',$this->time_of_occurrence,true);
		$criteria->compare('shift',$this->shift,true);
		$criteria->compare('duration_of_shift',$this->duration_of_shift,true);
		$criteria->compare('time_dc_logged_on_duty',$this->time_dc_logged_on_duty,true);
		$criteria->compare('time_dc_logged_off_duty',$this->time_dc_logged_off_duty,true);
		$criteria->compare('time_dc_reported_on_duty',$this->time_dc_reported_on_duty,true);
		$criteria->compare('time_dc_reported_off_duty',$this->time_dc_reported_off_duty,true);
		$criteria->compare('no_of_personnel_on_shift_roster',$this->no_of_personnel_on_shift_roster);
		$criteria->compare('no_of_personnel_on_shift_logbook',$this->no_of_personnel_on_shift_logbook);
		$criteria->compare('density_of_traffic',$this->density_of_traffic,true);
		$criteria->compare('no_of_trainees_on_shift',$this->no_of_trainees_on_shift);
		$criteria->compare('traffic_handled_by_trainee',$this->traffic_handled_by_trainee,true);
		$criteria->compare('controller_under_medication',$this->controller_under_medication,true);
		$criteria->compare('date_from_last_annual_leave',$this->date_from_last_annual_leave,true);
		$criteria->compare('last_training_attended',$this->last_training_attended,true);
		$criteria->compare('last_training_date',$this->last_training_date,true);
		$criteria->compare('last_proficiency_date',$this->last_proficiency_date,true);
		$criteria->compare('weather_information',$this->weather_information,true);
		$criteria->compare('aerodrome_information',$this->aerodrome_information,true);
		$criteria->compare('controllers_on_duty',$this->controllers_on_duty,true);
		$criteria->compare('completed_by',$this->completed_by,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SafetyOccurrenceData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
