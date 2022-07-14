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
 * @property string $type_of_aircraft
 * @property string $date_from
 * @property string $date_to
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
	var $date_to;
	var $date_from;
	var $user_forward;
	var $search_creteria;
	var $search_field;
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
			array('occurrence, place, main_category, time', 'required'),
			array('status, parent_occurrence,cause_id, reoccuring, risk_index_category, sitrep_category, sitrep_cause, assigned_to_officer, officer_assigned, administrator_assigned, officer_done', 'numerical', 'integerOnly'=>true),
			array('number, date, reported_by, category, main_category, date_reported', 'length', 'max'=>32),
			array('occurrence, operator, type_of_operation, person_responsible, risk_index', 'length', 'max'=>256),
			array('brief_notes', 'length', 'max'=>456),
			array('investigation_tor', 'length', 'max'=>10000),
			array('date, date_reported', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('place, time, aircraft_registration, departure_point, persons_on_board, reported_by_name, reported_by_department, reported_by_tel, reported_by_email, other_cause_details, incident_category', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, number,occurrence, place, time, aircraft_registration, operator, departure_point, persons_on_board, date, reported_by, status, modified, category, brief_notes, recommendations, type_of_operation, person_responsible, main_category, reported_by_name, reported_by_department, reported_by_tel, reported_by_email, parent_occurrence, category_id, cause_id, other_cause_details, reoccuring, date_reported, risk_index, risk_index_category, sitrep_category, sitrep_cause, incident_category, assigned_to_officer, officer_assigned, administrator_assigned, officer_done', 'safe', 'on'=>'search'),
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
			'sitrepCategory' => array(self::BELONGS_TO, 'SitrepCategories', 'sitrep_category'),
			'sitrepCause' => array(self::BELONGS_TO, 'SitrepCauses', 'sitrep_cause'),
			'officer' => array(self::BELONGS_TO, 'Users', 'officer_assigned'),
			'investigator' => array(self::BELONGS_TO, 'Users', 'investigator_id'),
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
			'brief_notes' => 'Brief Notes',
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
			'risk_index' => 'Risk Index',
			'risk_index_category' => 'Risk Index Category',
			'other_cause_details' => 'Other Cause Details',
			'reoccuring' => 'Reoccuring',
			'date_reported' => 'Date Reported',
			'sitrep_category'=>'SITREP Category',
			'sitrep_cause'=>'SITREP Cause',
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

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.number',$this->number,true);
		$criteria->compare('t.occurrence',$this->occurrence,true);
		$criteria->compare('t.place',$this->place,true);
		$criteria->compare('t.time',$this->time,true);
		$criteria->compare('t.aircraft_registration',$this->aircraft_registration,true);
		$criteria->compare('t.operator',$this->operator,true);
		$criteria->compare('t.departure_point',$this->departure_point,true);
		$criteria->compare('t.persons_on_board',$this->persons_on_board,true);
		$criteria->compare('t.date',$this->date,true);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.modified',$this->modified,true);
		$criteria->compare('t.category',$this->category,true);
		$criteria->compare('t.brief_notes',$this->brief_notes,true);
		$criteria->compare('t.recommendations',$this->recommendations,true);
		$criteria->compare('t.type_of_operation',$this->type_of_operation,true);
		$criteria->compare('t.person_responsible',$this->person_responsible,true);
		$criteria->compare('t.main_category',$this->main_category,true);
		$criteria->compare('t.reported_by_name',$this->reported_by_name,true);
		$criteria->compare('t.reported_by_department',$this->reported_by_department,true);
		$criteria->compare('t.reported_by_tel',$this->reported_by_tel,true);
		$criteria->compare('t.reported_by_email',$this->reported_by_email,true);
		$criteria->compare('t.parent_occurrence',$this->parent_occurrence);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.cause_id',$this->cause_id);
		$criteria->compare('t.other_cause_details',$this->other_cause_details,true);
		
		$criteria->with=array('status0');
		if($this->date_from and $this->date_to){
			
			$criteria->addCondition("date_reported  between '$this->date_from ' and '$this->date_to'");
			}
		if($this->search_creteria){
			if($this->search_field=='status'){
				$criteria->compare('status0.name',$this->search_creteria,true);
			}
			else{
				$criteria->compare($this->search_field,$this->search_creteria,true);		
			}
		
		}	
		
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function forward(){
		
				$notification_model= new Notifications();
				$notification_model->user=$this->user_forward;
				$notification_model->user_from=Yii::app()->user->getId();
				$notification_model->subject="Fowarded Sitrep";
                               
				$notification_model->description= " Fowarded Strep .#".$this->id."";
				$notification_model->status="sent";
				$notification_model->save();
				


				$this->changeStatus(6);

	}

	public function changeStatus($status){
		$this->status=$status;
		$this->save();	
	}
	public static function getFields(){
		return array(
			
			'number' => 'Number',
			'occurrence' => 'Occurrence',
			'place' => 'Place',
			'time' => 'Time',
			'category' => 'Category',
			'status' => 'Status',
			'brief_notes' => 'Brief Notes',
			'recommendations' => 'Recommendations',
			'type_of_operation' => 'Type Of Operation',
			'reported_by_name' => 'Reported By Name',
			'reported_by_department' => 'Reported By Department',
			'reported_by_tel' => 'Reported By Tel',
			'reported_by_email' => 'Reported By Email',
			'category_id' => 'Category',
			'cause_id' => 'Cause',
			'other_cause_details' => 'Other Cause Details',
		);
	}
	public static function getUserResponsible($id){
		$model=Incidents::model()->with('investigators')->findByPk($id);

		return $model->investigators;

	}

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
	
	public function getItemCount_1($start_date, $end_date, $main_category, $status){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}' and status = '{$status}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}' and status = '{$status}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_2($start_date, $end_date, $main_category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_3($start_date, $end_date, $main_category, $operation_type){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}' and type_of_operation = '{$operation_type}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}' and type_of_operation = '{$operation_type}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_4($start_date, $end_date, $main_category, $root_cause){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}' and root_cause = '{$root_cause}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}' and root_cause = '{$root_cause}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_5($start_date, $end_date, $main_category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}' and reoccuring = '1'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}' and reoccuring = '1'");
		}
		
		return count($items);
	}
	
	public function getItemCount_6($start_date, $end_date, $main_category, $hazard_source){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = '{$main_category}' and hazard_source = '{$hazard_source}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}' and hazard_source = '{$hazard_source}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_7($start_date, $end_date, $category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and main_category = 'Incident' and category = '{$category}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and main_category = 'Incident' and category = '{$category}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_8($start_date, $end_date, $category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and incident_category = '{$category}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and incident_category = '{$category}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_8_1($start_date, $end_date, $category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and category = '{$category}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and category = '{$category}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_9($start_date, $end_date, $category){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date = '{$end_date}' and category = '{$category}'");
		}else{
			$items = Incidents::model()->findAll("date between '{$start_date}' and '{$end_date}' and category = '{$category}'");
		}
		
		return count($items);
	}
	
	public function getSafetyLogSummaryCount($category_id=null, $cause_id=null, $st_dt, $end_dt){
		$sql = "select count(*) as log_summary_count from incidents where category_id = {$category_id} and cause_id = {$cause_id} and status = 1 and date between '{$st_dt}' and '{$end_dt}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData;
	}
	
	public function get_total_daily_reoccuring_incidents($day){
		$sql = "select count(*) as total_incidents from incidents where reoccuring = 1 and date = '{$day}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData;
	}
	
	public function get_total_daily_associated_incidents($day){
		$sql = "select count(*) as total_incidents from incidents where parent_occurrence IS NOT NULL and date = '{$day}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData;
	}
	
	public function getRiskIndexCount($risk_index){
		$sql = "select count(*) as total_incidents from incidents where risk_index = '{$risk_index}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_incidents'];
	}
	
	public function getRiskIndexProbabilityCount($probability){
		$sql = "select count(*) as total_incidents from incidents where risk_index like {$probability}";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_incidents'];
	}
	
	public static function getOptions(){
		$cats = Incidents::model()->findAll();
		$data = array(null=>"Select Incident");
		foreach($cats as $model){
			$data[$model->id] = $model->id.':  '.$model->occurrence;
		}
		return $data;
	}
	
	public static function checkIfAssignedToOfficer($id){
		$incident_info = Incidents::model()->findByPk($id);
		if($incident_info->assigned_to_officer == 1){return true;}else{return false;}
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Incidents::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||($current_record->investigator_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
	
	public function getItemCount_21($start_date, $end_date, $form){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date_reported = '{$end_date}' and form_of_notification = '{$form}'");
		}else{
			$items = Incidents::model()->findAll("date_reported between '{$start_date}' and '{$end_date}' and form_of_notification = '{$form}'");
		}
		
		return count($items);
	}
	
	public function getItemCount_31($start_date, $end_date, $variable){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("date_reported = '{$end_date}' and level_of_investigation = '{$variable}'");
		}else{
			$items = Incidents::model()->findAll("date_reported between '{$start_date}' and '{$end_date}' and level_of_investigation = '{$variable}'");
		}
		
		return count($items);
	}
	
	public function getItemCountByDepartment($start_date, $end_date, $option){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("reported_by in (select username from users where user_department_id = '{$option}') and date_reported = '{$end_date}'");
		}else{
			$items = Incidents::model()->findAll("reported_by in (select username from users where user_department_id = '{$option}') and date_reported between '{$start_date}' and '{$end_date}'");
		}
		
		return count($items);
	}
	
	public function getItemCountByDivision($start_date, $end_date, $option){
		if($start_date == $end_date){
			$items = Incidents::model()->findAll("reported_by in (select username from users where user_division_id = '{$option}') and date_reported = '{$end_date}'");
		}else{
			$items = Incidents::model()->findAll("reported_by in (select username from users where user_division_id = '{$option}') and date_reported between '{$start_date}' and '{$end_date}'");
		}
		
		return count($items);
	}
	
	public function kpi_compute($start_date, $end_date, $select_dt, $categories, $causes, $period_type){
		
		$multiplier = (abs((strtotime($start_date) - strtotime($end_date))/(60*60*24)))/30;
		
		$return_array = array();
		
		if($start_date == $end_date){
			$total_no_of_occurrences_reported = count(Incidents::model()->findAll("date_reported = '{$start_date}'"));
		}else{
			$total_no_of_occurrences_reported = count(Incidents::model()->findAll("date_reported between '{$start_date}' and '{$end_date}'"));
		}
		
		$total_no_of_occurrences_reported_target = (@Kpis::model()->find("id = 1")->target)*$multiplier;
		
		$no_of_days_in_selected_period = abs((strtotime($start_date) - strtotime($end_date))/(60*60*24));
		
		if($no_of_days_in_selected_period == 0){
			$no_of_days_in_selected_period = 1;
		}
		
		$no_of_months_in_selected_period = $no_of_days_in_selected_period/30;
		
		$average_no_of_occurrences_reported_month = number_format($total_no_of_occurrences_reported/$no_of_months_in_selected_period, 2);
		$average_no_of_occurrences_reported_month_target = (@Kpis::model()->find("id = 3")->target)*$multiplier;
		
		//averate no of days to close occurrence
		
		$closed_occurrences = Incidents::model()->findAll("status = 5");
		$no_of_days_to_close = 0;
		$no_of_closed_occurrences = 0;
		foreach($closed_occurrences as $closed_occurrence){
			if($closed_occurrence->date_closed == '0000-00-00'){
				$use_date = $closed_occurrence->modified;
			}else{
				$use_date = $closed_occurrence->date_closed;
			}
			
			$no_of_days_to_close_occurrence = abs((strtotime($use_date) - strtotime($closed_occurrence->date_reported))/(60*60*24));
			$no_of_days_to_close = $no_of_days_to_close + $no_of_days_to_close_occurrence;
			$no_of_closed_occurrences = $no_of_closed_occurrences + 1;	
			
		}
		if($no_of_closed_occurrences != 0){
			$average_no_days_to_close_occurrence = number_format(($no_of_days_to_close)/($no_of_closed_occurrences), 2);
		}else{
			$average_no_days_to_close_occurrence = 0;
		}
		
		$average_no_days_to_close_occurrence_target = (@Kpis::model()->find("id = 2")->target)*$multiplier;
		
		
		//average no of days to resolve safety  requirement
		
		$average_no_days_to_close_sr = Incidents::model()->calculateKPI4();
		$average_no_days_to_close_sr_target = (@Kpis::model()->find("id = 4")->target)*$multiplier;
		
		$green = 0;
		$red = 0;
		$orange = 0;
		
		if($total_no_of_occurrences_reported > $total_no_of_occurrences_reported_target){$red = $red + 1;}elseif($total_no_of_occurrences_reported == $total_no_of_occurrences_reported_target){$orange = $orange + 1;}else{$green = $green + 1;}
		
		if($average_no_days_to_close_occurrence > $average_no_days_to_close_occurrence_target){$red = $red + 1;}elseif($average_no_days_to_close_occurrence == $average_no_days_to_close_occurrence_target){$orange = $orange + 1;}else{$green = $green + 1;}
		
		if($average_no_of_occurrences_reported_month > $average_no_of_occurrences_reported_month_target){$red = $red + 1;}elseif($average_no_of_occurrences_reported_month == $average_no_of_occurrences_reported_month_target){$orange = $orange + 1;}else{$green = $green + 1;}
		
		if($average_no_days_to_close_sr > $average_no_days_to_close_sr_target){$red = $red + 1;}elseif($average_no_days_to_close_sr == $average_no_days_to_close_sr_target){$orange = $orange + 1;}else{$green = $green + 1;}
		
		$i=5;
				$count_causes = array();
				foreach($causes as $cause_item){
					
					$count_categories = 0;
					
					$k = 0;
					foreach($categories as $category_item){
						$count=SafetyLogs::getCatCause($cause_item->id,$category_item->id, $start_date, $end_date);
						$count_categories = $count_categories + $count;
						$k++;
					}
					
					if($count_categories/$no_of_months_in_selected_period > ($cause_item->target)*$multiplier){$red = $red + 1;}elseif($count_categories == ($cause_item->target)*$multiplier){$orange = $orange + 1;}else{$green = $green + 1;}
					
					$i++;
				}
		
		$return_array[0]=$green;
		$return_array[1]=$orange;
		$return_array[2]=$red;
		
		return $return_array;
	}
	
	public function calculateKPI4(){
		$closed_occurrences = SafetyRecommendations::model()->findAll("open_close = 1");
		$no_of_days_to_close = 0;
		$no_of_closed_occurrences = 0;
		foreach($closed_occurrences as $closed_occurrence){
			if($closed_occurrence->date_closed == '0000-00-00'){
				$use_date = $closed_occurrence->modified;
			}else{
				$use_date = $closed_occurrence->date_closed;
			}
			
			if($closed_occurrence->date_assigned == '0000-00-00'){
				$use_date_assigned = $closed_occurrence->modified;
			}else{
				$use_date_assigned = $closed_occurrence->date_assigned;
			}
			
			$no_of_days_to_close_occurrence = abs((strtotime($use_date_assigned) - strtotime($use_date))/(60*60*24));
			$no_of_days_to_close = $no_of_days_to_close + $no_of_days_to_close_occurrence;
			$no_of_closed_occurrences = $no_of_closed_occurrences + 1;	
			
		}
		if($no_of_closed_occurrences != 0){
			$average_no_days_to_close_occurrence = number_format(($no_of_days_to_close)/($no_of_closed_occurrences), 2);
		}else{
			$average_no_days_to_close_occurrence = 0;
		}
		return $average_no_days_to_close_occurrence;
		
	}
}
