<?php

/**
 * This is the model class for table "aircraft_incident_investigations".
 *
 * The followings are the available columns in table 'aircraft_incident_investigations':
 * @property integer $id
 * @property string $date_of_occurence
 * @property string $aircraft_involved
 * @property string $description
 * @property string $form_of_notification
 * @property string $category
 * @property string $level_of_investigation
 * @property string $investigators
 * @property string $tor
 * @property string $date_of_assignment
 * @property string $deadline
 * @property string $transcript
 * @property string $preliminary_report
 * @property string $SAG_submission
 * @property string $SAG_reviewed
 * @property string $forwarded_to_DANS_and_Mgrs
 * @property string $final_report
 */
class AircraftIncidentInvestigations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aircraft_incident_investigations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('aircraft_involved, form_of_notification,  level_of_investigation, tor, incident_id, date_of_assignment, deadline', 'required'),
			
			array('tor', 'required'),
			
			array('date_of_assignment, deadline, transcript, SAG_submission, SAG_reviewed, forwarded_to_DANS_and_Mgrs, date_of_occurence', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			
			array('aircraft_involved, preliminary_report, final_report', 'length', 'max'=>256),
			array('tor', 'length', 'max'=>1000),
			array('status, incident_id, root_cause', 'numerical', 'integerOnly'=>true),
			array('form_of_notification, category, level_of_investigation, transcript_submitted, controller_report, controller_report_submitted, sodf, sodf_submitted, fps, fps_submitted, preliminary_report_submitted, SAG_submitted, SAG_reviewed_by, forwarded_to_DANS_and_Mgrs_sent', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_of_occurence, aircraft_involved, description, form_of_notification, category, level_of_investigation, investigators, tor, date_of_assignment, deadline, transcript, preliminary_report, SAG, forwarded_to_DANS_and_Mgrs, final_report, status, incident_id, root_cause, assigned_to_investigator, investigator_assigned, administrator_assigned', 'safe', 'on'=>'search'),
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
			'id' => 'No',
			'incident_id' => 'Incident ID',
			'date_of_occurence' => 'Date of Occurence',
			'aircraft_involved' => 'Aircraft Involved',
			'description' => 'Description',
			'form_of_notification' => 'Form of Notification',
			'category' => 'Category',
			'level_of_investigation' => 'Level of Investigation',
			'investigators' => 'Investigator(s)',
			'tor' => 'Terms of Reference',
			'date_of_assignment' => 'Date of Assignment',
			'deadline' => 'Deadline',
			'transcript' => 'Transcript Submission Date',
			'transcript_submitted' => 'Transcript Submitted',
			'controller_report' => 'Controller Report Submission Date',
			'controller_report_submitted' => 'Controller Report Submitted',
			'sodf' => 'Safety Occurrence Data Form Submission Date',
			'sodf_submitted' => 'Safety Occurrence Data Form Submitted',
			'fps' => 'Flight Progress Strip(FPS) Submission Date',
			'fps_submitted' => 'Flight Progress Strip(FPS) Submitted',
			'preliminary_report' => 'Preliminary Report Submission Date',
			'preliminary_report_submitted' => 'Preliminary Report Submitted',
			'SAG_submitted' => 'SAG Submitted',
			'SAG_reviewed' => 'SAG Review Date',
			'SAG_reviewed_by' => 'SAG Reviewed by',
			'forwarded_to_DANS_and_Mgrs' => 'SRC or forwarded to DANS and Mgrs',
			'forwarded_to_DANS_and_Mgrs_sent' => 'SRC or forwarded to DANS and Mgrs Status',
			'final_report' => 'Final report',
			'status' => 'Status',
			'SAG_submission' => 'SAG Submission Date',
			'root_cause' => 'Root Cause',
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
		$criteria->compare('date_of_occurence',$this->date_of_occurence,true);
		$criteria->compare('aircraft_involved',$this->aircraft_involved,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('form_of_notification',$this->form_of_notification,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('level_of_investigation',$this->level_of_investigation,true);
		$criteria->compare('investigators',$this->investigators,true);
		$criteria->compare('tor',$this->tor,true);
		$criteria->compare('date_of_assignment',$this->date_of_assignment,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('transcript',$this->transcript,true);
		$criteria->compare('preliminary_report',$this->preliminary_report,true);
		$criteria->compare('status',1);

		$criteria->compare('forwarded_to_DANS_and_Mgrs',$this->forwarded_to_DANS_and_Mgrs,true);
		$criteria->compare('final_report',$this->final_report,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AircraftIncidentInvestigations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getItemCount_2($start_date, $end_date, $form){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and form_of_notification = '{$form}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and form_of_notification = '{$form}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_3($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and level_of_investigation = '{$variable}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and level_of_investigation = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_4($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and transcript_submitted = '{$variable}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and transcript_submitted = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_5($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and preliminary_report_submitted = '{$variable}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and preliminary_report_submitted = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_6($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and final_report = '{$variable}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and final_report = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_7($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence = '{$end_date}' and root_cause = '{$variable}'");
		}else{
			$items = AircraftIncidentInvestigations::model()->findAll("date_of_occurence between '{$start_date}' and '{$end_date}' and root_cause = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function checkIfUnderInvestigation($id){
		$incident = AircraftIncidentInvestigations::model()->findByPk($id);
		if($incident->assigned_to_investigator == 1){return true;}else{return false;}
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = AircraftIncidentInvestigations::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
