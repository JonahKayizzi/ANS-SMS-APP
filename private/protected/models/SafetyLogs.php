<?php

/**
 * This is the model class for table "safety_logs".
 *
 * The followings are the available columns in table 'safety_logs':
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property string $aircraft
 * @property string $type
 * @property string $registrar
 * @property string $operator
 * @property string $route
 * @property string $event
 * @property string $remarks
 * @property string $action_taken
 * @property string $entered_into_summary
 * @property integer $cause
 * @property integer $category
 * @property integer $user
 */
class SafetyLogs extends CActiveRecord
{
	var $search_creteria1;
	var $search_field1;
	var $search_creteria2;
	var $search_field2;
	var $start_date;
	var $end_date;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time, cause, category, route, remarks, action_taken, entered_into_summary, date_occured', 'required'),
			array('cause, category, user', 'numerical', 'integerOnly'=>true),
			array('aircraft', 'length', 'max'=>256),
			array('type, registrar, operator, event', 'length', 'max'=>1000),
			array('time', 'type', 'type'=>'datetime', 'datetimeFormat'=>'hh:mm'),
			array('date_occured', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, time, aircraft, type, registrar, operator, route, event, remarks, action_taken, entered_into_summary, cause, category, user, date_occured', 'safe', 'on'=>'search'),
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
			'category0' => array(self::BELONGS_TO, 'SafetyLogsCategories', 'category'),
			'cause0' => array(self::BELONGS_TO, 'SafetyLogsCauses', 'cause'),
			'category' => array(self::BELONGS_TO, 'SafetyLogsCategories', 'category'),
			'cause' => array(self::BELONGS_TO, 'SafetyLogsCauses', 'cause'),
			'user0' => array(self::BELONGS_TO, 'Users', 'user'),
		);
	}
	public static function getFields(){
		return array(
			/* 'date' => 'Date', */
			'time' => 'Time',
			'aircraft' => 'Aircraft Call Sign',
			'type' => 'Aircraft Type',
			'registrar' => 'Aircraft Registration',
			'operator' => 'Operator',
			'route' => 'Route',
			'event' => 'Event',
			'remarks' => 'Remarks',
			'action_taken' => 'Action Taken',
			'entered_into_summary' => 'Entered Into Summary',
			/* 'cause' => 'Cause',
			'category' => 'Category', */
			/* 'date_occured' => 'Date Occured', */
	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'System Date',
			'date_occured' => 'Date',
			'time' => 'Time',
			'aircraft' => 'Aircraft Call Sign',
			'type' => 'Aircraft Type',
			'registrar' => 'Aircraft Registration',
			'operator' => 'Operator',
			'route' => 'Route',
			'event' => 'Event Description',
			'remarks' => 'Remarks',
			'action_taken' => 'Action Taken',
			'entered_into_summary' => 'Entered Into Summary',
			/* 'cause' => 'Cause',
			'category' => 'Category', */
			/* Causes and Categories where wrongly swapped */
			'cause' => 'Category',
			'category' => 'Cause',
			'user' => 'User',
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
		$criteria->with = array('cause0', 'category0');
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.date',$this->date,true);
		$criteria->compare('t.time',$this->time,true);
		$criteria->compare('t.aircraft',$this->aircraft,true);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.registrar',$this->registrar,true);
		$criteria->compare('t.operator',$this->operator,true);
		$criteria->compare('t.route',$this->route,true);
		$criteria->compare('t.event',$this->event,true);
		$criteria->compare('t.remarks',$this->remarks,true);
		$criteria->compare('t.action_taken',$this->action_taken,true);
		$criteria->compare('t.entered_into_summary',$this->entered_into_summary,true);
		$criteria->compare('t.cause',$this->cause);
		$criteria->compare('t.category',$this->category);
		$criteria->compare('t.user',$this->user);
		if($this->search_field1){
				$criteria->addBetweenCondition('t.date_occured', $this->start_date, $this->end_date);
				if($this->search_creteria1){
					if($this->search_field1 == 'cause'){
						$criteria->compare('cause0.name',$this->search_creteria1,true);
					}elseif($this->search_field1 == 'category'){
						$criteria->compare('category0.name',$this->search_creteria1,true);
					}else{
						$criteria->compare('t.'.$this->search_field1,$this->search_creteria1,true);
					}	
				}
				if($this->search_creteria2){
					if($this->search_field2 == 'cause'){
						$criteria->compare('cause0.name',$this->search_creteria2,true);
					}elseif($this->search_field2 == 'category'){
						$criteria->compare('category0.name',$this->search_creteria2,true);
					}else{
						$criteria->compare('t.'.$this->search_field2,$this->search_creteria2,true);
					}
				}
				
		}
		$criteria->order = 't.id DESC';
		
		//var_dump($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getCatCause($cause,$category, $start_date, $end_date){
		if($start_date == $end_date){
			$result=SafetyLogs::model()->findAll("cause=$cause and category=$category and date_occured = '{$end_date}'");
		}else{
			$result=SafetyLogs::model()->findAll("cause=$cause and category=$category and date_occured between '{$start_date}' and '{$end_date}'");
		}
		
		return count($result);
	}
	
	public static function getCauseCount($cause){
		$result=SafetyLogs::model()->findAll("cause=$cause");
		return count($result);
	}
	
	public static function getCauseCountInDates($cause, $date_1, $date_2){
		if($date_1 == $date_2){
			$result=SafetyLogs::model()->findAll("cause=$cause and date_occured = '{$date_2}'");
		}else{
			$result=SafetyLogs::model()->findAll("cause=$cause and date_occured between '{$date_1}' and '{$date_2}'");
		}
		
		return count($result);
	}
	
	public static function getCatCount($category, $start_date, $end_date){
		if($start_date == $end_date){
			$result=SafetyLogs::model()->findAll("category=$category and date_occured = '{$end_date}'");
		}else{
			$result=SafetyLogs::model()->findAll("category=$category and date_occured between '{$start_date}' and '{$end_date}'");
		}
		
		return count($result);
	}
	
	public static function getTotalCount($start_date, $end_date){
		if($start_date == $end_date){
			$result=SafetyLogs::model()->findAll("date_occured = '{$end_date}'");
		}else{
			$result=SafetyLogs::model()->findAll("date_occured between '{$start_date}' and '{$end_date}'");
		}
		
		return count($result);
	}
	
	public static function getTotalCount2($start_date, $end_date, $search_option, $search_value){
		if($start_date == $end_date){
			$result=SafetyLogs::model()->findAll("date_occured = '{$end_date}' and {$search_option} = '{$search_value}'");
		}else{
			$result=SafetyLogs::model()->findAll("date_occured between '{$start_date}' and '{$end_date}' and {$search_option} = '{$search_value}'");
		}
		
		return count($result);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SafetyLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SafetyLogs::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
