<?php

/**
 * This is the model class for table "safety_occurrence_data".
 *
 * The followings are the available columns in table 'safety_occurrence_data':
 * @property integer $id
 * @property integer $incident_id
 * @property string $date_of_occurrence
 * @property string $date_of_occurrence_2
 * @property string $date_of_occurrence_3
 * @property string $time_of_occurrence
 * @property string $time_of_occurrence_2
 * @property string $time_of_occurrence_3
 * @property string $shift
 * @property string $shift_2
 * @property string $shift_3
 * @property string $duration_of_shift
 * @property string $duration_of_shift_2
 * @property string $duration_of_shift_3
 * @property string $time_dc_logged_on_duty
 * @property string $time_dc_logged_on_duty_2
 * @property string $time_dc_logged_on_duty_3
 * @property string $time_dc_logged_off_duty
 * @property string $time_dc_logged_off_duty_2
 * @property string $time_dc_logged_off_duty_3
 * @property string $time_dc_reported_on_duty
 * @property string $time_dc_reported_on_duty_2
 * @property string $time_dc_reported_on_duty_3
 * @property string $time_dc_reported_off_duty
 * @property string $time_dc_reported_off_duty_2
 * @property string $time_dc_reported_off_duty_3
 * @property integer $no_of_personnel_on_shift_roster
 * @property integer $no_of_personnel_on_shift_roster_2
 * @property integer $no_of_personnel_on_shift_roster_3
 * @property integer $no_of_personnel_on_shift_logbook
 * @property integer $no_of_personnel_on_shift_logbook_2
 * @property integer $no_of_personnel_on_shift_logbook_3
 * @property string $density_of_traffic
 * @property string $density_of_traffic_2
 * @property string $density_of_traffic_3
 * @property integer $no_of_trainees_on_shift
 * @property integer $no_of_trainees_on_shift_2
 * @property integer $no_of_trainees_on_shift_3
 * @property string $traffic_handled_by_trainee
 * @property string $traffic_handled_by_trainee_2
 * @property string $traffic_handled_by_trainee_3
 * @property string $controller_under_medication
 * @property string $controller_under_medication_2
 * @property string $controller_under_medication_3
 * @property string $date_from_last_annual_leave
 * @property string $date_from_last_annual_leave_2
 * @property string $date_from_last_annual_leave_3
 * @property string $last_training_attended
 * @property string $last_training_attended_2
 * @property string $last_training_attended_3
 * @property string $last_training_date
 * @property string $last_training_date_2
 * @property string $last_training_date_3
 * @property string $last_proficiency_date
 * @property string $last_proficiency_date_2
 * @property string $last_proficiency_date_3
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
			array('incident_id, no_of_personnel_on_shift_roster, no_of_personnel_on_shift_roster_2, no_of_personnel_on_shift_roster_3, no_of_personnel_on_shift_logbook, no_of_personnel_on_shift_logbook_2, no_of_personnel_on_shift_logbook_3, no_of_trainees_on_shift, no_of_trainees_on_shift_2, no_of_trainees_on_shift_3, status', 'numerical', 'integerOnly'=>true),
			array('time_of_occurrence, time_of_occurrence_2, time_of_occurrence_3, shift, shift_2, shift_3, duration_of_shift, duration_of_shift_2, duration_of_shift_3, time_dc_logged_on_duty, time_dc_logged_on_duty_2, time_dc_logged_on_duty_3, time_dc_logged_off_duty, time_dc_logged_off_duty_2, time_dc_logged_off_duty_3, time_dc_reported_on_duty, time_dc_reported_on_duty_2, time_dc_reported_on_duty_3, time_dc_reported_off_duty, time_dc_reported_off_duty_2, time_dc_reported_off_duty_3', 'length', 'max'=>128),
			array('density_of_traffic, density_of_traffic_2, density_of_traffic_3', 'length', 'max'=>32),
			array('traffic_handled_by_trainee, traffic_handled_by_trainee_2, traffic_handled_by_trainee_3, controller_under_medication, controller_under_medication_2, controller_under_medication_3', 'length', 'max'=>16),
			array('last_training_attended, last_training_attended_2, last_training_attended_3, completed_by', 'length', 'max'=>256),
			array('weather_information, aerodrome_information, controllers_on_duty', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, date_of_occurrence, date_of_occurrence_2, date_of_occurrence_3, time_of_occurrence, time_of_occurrence_2, time_of_occurrence_3, shift, shift_2, shift_3, duration_of_shift, duration_of_shift_2, duration_of_shift_3, time_dc_logged_on_duty, time_dc_logged_on_duty_2, time_dc_logged_on_duty_3, time_dc_logged_off_duty, time_dc_logged_off_duty_2, time_dc_logged_off_duty_3, time_dc_reported_on_duty, time_dc_reported_on_duty_2, time_dc_reported_on_duty_3, time_dc_reported_off_duty, time_dc_reported_off_duty_2, time_dc_reported_off_duty_3, no_of_personnel_on_shift_roster, no_of_personnel_on_shift_roster_2, no_of_personnel_on_shift_roster_3, no_of_personnel_on_shift_logbook, no_of_personnel_on_shift_logbook_2, no_of_personnel_on_shift_logbook_3, density_of_traffic, density_of_traffic_2, density_of_traffic_3, no_of_trainees_on_shift, no_of_trainees_on_shift_2, no_of_trainees_on_shift_3, traffic_handled_by_trainee, traffic_handled_by_trainee_2, traffic_handled_by_trainee_3, controller_under_medication, controller_under_medication_2, controller_under_medication_3, date_from_last_annual_leave, date_from_last_annual_leave_2, date_from_last_annual_leave_3, last_training_attended, last_training_attended_2, last_training_attended_3, last_training_date, last_training_date_2, last_training_date_3, last_proficiency_date, last_proficiency_date_2, last_proficiency_date_3, weather_information, aerodrome_information, controllers_on_duty, completed_by, modified, status', 'safe', 'on'=>'search'),
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
			'date_of_occurrence' => 'Date Of Occurrence',
			'date_of_occurrence_2' => 'Date Of Occurrence 2',
			'date_of_occurrence_3' => 'Date Of Occurrence 3',
			'time_of_occurrence' => 'Time Of Occurrence',
			'time_of_occurrence_2' => 'Time Of Occurrence 2',
			'time_of_occurrence_3' => 'Time Of Occurrence 3',
			'shift' => 'Shift',
			'shift_2' => 'Shift 2',
			'shift_3' => 'Shift 3',
			'duration_of_shift' => 'Duration Of Shift',
			'duration_of_shift_2' => 'Duration Of Shift 2',
			'duration_of_shift_3' => 'Duration Of Shift 3',
			'time_dc_logged_on_duty' => 'Time Dc Logged On Duty',
			'time_dc_logged_on_duty_2' => 'Time Dc Logged On Duty 2',
			'time_dc_logged_on_duty_3' => 'Time Dc Logged On Duty 3',
			'time_dc_logged_off_duty' => 'Time Dc Logged Off Duty',
			'time_dc_logged_off_duty_2' => 'Time Dc Logged Off Duty 2',
			'time_dc_logged_off_duty_3' => 'Time Dc Logged Off Duty 3',
			'time_dc_reported_on_duty' => 'Time Dc Reported On Duty',
			'time_dc_reported_on_duty_2' => 'Time Dc Reported On Duty 2',
			'time_dc_reported_on_duty_3' => 'Time Dc Reported On Duty 3',
			'time_dc_reported_off_duty' => 'Time Dc Reported Off Duty',
			'time_dc_reported_off_duty_2' => 'Time Dc Reported Off Duty 2',
			'time_dc_reported_off_duty_3' => 'Time Dc Reported Off Duty 3',
			'no_of_personnel_on_shift_roster' => 'No Of Personnel On Shift Roster',
			'no_of_personnel_on_shift_roster_2' => 'No Of Personnel On Shift Roster 2',
			'no_of_personnel_on_shift_roster_3' => 'No Of Personnel On Shift Roster 3',
			'no_of_personnel_on_shift_logbook' => 'No Of Personnel On Shift Logbook',
			'no_of_personnel_on_shift_logbook_2' => 'No Of Personnel On Shift Logbook 2',
			'no_of_personnel_on_shift_logbook_3' => 'No Of Personnel On Shift Logbook 3',
			'density_of_traffic' => 'Density Of Traffic',
			'density_of_traffic_2' => 'Density Of Traffic 2',
			'density_of_traffic_3' => 'Density Of Traffic 3',
			'no_of_trainees_on_shift' => 'No Of Trainees On Shift',
			'no_of_trainees_on_shift_2' => 'No Of Trainees On Shift 2',
			'no_of_trainees_on_shift_3' => 'No Of Trainees On Shift 3',
			'traffic_handled_by_trainee' => 'Traffic Handled By Trainee',
			'traffic_handled_by_trainee_2' => 'Traffic Handled By Trainee 2',
			'traffic_handled_by_trainee_3' => 'Traffic Handled By Trainee 3',
			'controller_under_medication' => 'Controller Under Medication',
			'controller_under_medication_2' => 'Controller Under Medication 2',
			'controller_under_medication_3' => 'Controller Under Medication 3',
			'date_from_last_annual_leave' => 'Date From Last Annual Leave',
			'date_from_last_annual_leave_2' => 'Date From Last Annual Leave 2',
			'date_from_last_annual_leave_3' => 'Date From Last Annual Leave 3',
			'last_training_attended' => 'Last Training Attended',
			'last_training_attended_2' => 'Last Training Attended 2',
			'last_training_attended_3' => 'Last Training Attended 3',
			'last_training_date' => 'Last Training Date',
			'last_training_date_2' => 'Last Training Date 2',
			'last_training_date_3' => 'Last Training Date 3',
			'last_proficiency_date' => 'Last Proficiency Date',
			'last_proficiency_date_2' => 'Last Proficiency Date 2',
			'last_proficiency_date_3' => 'Last Proficiency Date 3',
			'weather_information' => 'Weather Information',
			'aerodrome_information' => 'Aerodrome Information',
			'controllers_on_duty' => 'Controllers On Duty',
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
		$criteria->compare('date_of_occurrence',$this->date_of_occurrence,true);
		$criteria->compare('date_of_occurrence_2',$this->date_of_occurrence_2,true);
		$criteria->compare('date_of_occurrence_3',$this->date_of_occurrence_3,true);
		$criteria->compare('time_of_occurrence',$this->time_of_occurrence,true);
		$criteria->compare('time_of_occurrence_2',$this->time_of_occurrence_2,true);
		$criteria->compare('time_of_occurrence_3',$this->time_of_occurrence_3,true);
		$criteria->compare('shift',$this->shift,true);
		$criteria->compare('shift_2',$this->shift_2,true);
		$criteria->compare('shift_3',$this->shift_3,true);
		$criteria->compare('duration_of_shift',$this->duration_of_shift,true);
		$criteria->compare('duration_of_shift_2',$this->duration_of_shift_2,true);
		$criteria->compare('duration_of_shift_3',$this->duration_of_shift_3,true);
		$criteria->compare('time_dc_logged_on_duty',$this->time_dc_logged_on_duty,true);
		$criteria->compare('time_dc_logged_on_duty_2',$this->time_dc_logged_on_duty_2,true);
		$criteria->compare('time_dc_logged_on_duty_3',$this->time_dc_logged_on_duty_3,true);
		$criteria->compare('time_dc_logged_off_duty',$this->time_dc_logged_off_duty,true);
		$criteria->compare('time_dc_logged_off_duty_2',$this->time_dc_logged_off_duty_2,true);
		$criteria->compare('time_dc_logged_off_duty_3',$this->time_dc_logged_off_duty_3,true);
		$criteria->compare('time_dc_reported_on_duty',$this->time_dc_reported_on_duty,true);
		$criteria->compare('time_dc_reported_on_duty_2',$this->time_dc_reported_on_duty_2,true);
		$criteria->compare('time_dc_reported_on_duty_3',$this->time_dc_reported_on_duty_3,true);
		$criteria->compare('time_dc_reported_off_duty',$this->time_dc_reported_off_duty,true);
		$criteria->compare('time_dc_reported_off_duty_2',$this->time_dc_reported_off_duty_2,true);
		$criteria->compare('time_dc_reported_off_duty_3',$this->time_dc_reported_off_duty_3,true);
		$criteria->compare('no_of_personnel_on_shift_roster',$this->no_of_personnel_on_shift_roster);
		$criteria->compare('no_of_personnel_on_shift_roster_2',$this->no_of_personnel_on_shift_roster_2);
		$criteria->compare('no_of_personnel_on_shift_roster_3',$this->no_of_personnel_on_shift_roster_3);
		$criteria->compare('no_of_personnel_on_shift_logbook',$this->no_of_personnel_on_shift_logbook);
		$criteria->compare('no_of_personnel_on_shift_logbook_2',$this->no_of_personnel_on_shift_logbook_2);
		$criteria->compare('no_of_personnel_on_shift_logbook_3',$this->no_of_personnel_on_shift_logbook_3);
		$criteria->compare('density_of_traffic',$this->density_of_traffic,true);
		$criteria->compare('density_of_traffic_2',$this->density_of_traffic_2,true);
		$criteria->compare('density_of_traffic_3',$this->density_of_traffic_3,true);
		$criteria->compare('no_of_trainees_on_shift',$this->no_of_trainees_on_shift);
		$criteria->compare('no_of_trainees_on_shift_2',$this->no_of_trainees_on_shift_2);
		$criteria->compare('no_of_trainees_on_shift_3',$this->no_of_trainees_on_shift_3);
		$criteria->compare('traffic_handled_by_trainee',$this->traffic_handled_by_trainee,true);
		$criteria->compare('traffic_handled_by_trainee_2',$this->traffic_handled_by_trainee_2,true);
		$criteria->compare('traffic_handled_by_trainee_3',$this->traffic_handled_by_trainee_3,true);
		$criteria->compare('controller_under_medication',$this->controller_under_medication,true);
		$criteria->compare('controller_under_medication_2',$this->controller_under_medication_2,true);
		$criteria->compare('controller_under_medication_3',$this->controller_under_medication_3,true);
		$criteria->compare('date_from_last_annual_leave',$this->date_from_last_annual_leave,true);
		$criteria->compare('date_from_last_annual_leave_2',$this->date_from_last_annual_leave_2,true);
		$criteria->compare('date_from_last_annual_leave_3',$this->date_from_last_annual_leave_3,true);
		$criteria->compare('last_training_attended',$this->last_training_attended,true);
		$criteria->compare('last_training_attended_2',$this->last_training_attended_2,true);
		$criteria->compare('last_training_attended_3',$this->last_training_attended_3,true);
		$criteria->compare('last_training_date',$this->last_training_date,true);
		$criteria->compare('last_training_date_2',$this->last_training_date_2,true);
		$criteria->compare('last_training_date_3',$this->last_training_date_3,true);
		$criteria->compare('last_proficiency_date',$this->last_proficiency_date,true);
		$criteria->compare('last_proficiency_date_2',$this->last_proficiency_date_2,true);
		$criteria->compare('last_proficiency_date_3',$this->last_proficiency_date_3,true);
		$criteria->compare('weather_information',$this->weather_information,true);
		$criteria->compare('aerodrome_information',$this->aerodrome_information,true);
		$criteria->compare('controllers_on_duty',$this->controllers_on_duty,true);
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
	 * @return SafetyOccurrenceData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SafetyOccurrenceData::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
