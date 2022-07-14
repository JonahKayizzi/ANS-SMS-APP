<?php

/**
 * This is the model class for table "monitoring_performance".
 *
 * The followings are the available columns in table 'monitoring_performance':
 * @property integer $id
 * @property integer $incident_id
 * @property integer $cause_id
 * @property integer $consequence_id
 *
 * The followings are the available model relations:
 * @property IncidentConsequencesSub $consequence
 * @property Incidents $incident
 * @property IncidentCausesSub $cause
 */
class MonitoringPerformance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'monitoring_performance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incident_id, cause_id, consequence_id, reoccurring', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, cause_id, consequence_id, reoccurring, date', 'safe', 'on'=>'search'),
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
			'consequence' => array(self::BELONGS_TO, 'IncidentConsequencesSub', 'consequence_id'),
			'incident' => array(self::BELONGS_TO, 'Incidents', 'incident_id'),
			'cause' => array(self::BELONGS_TO, 'IncidentCausesSub', 'cause_id'),
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
			'cause_id' => 'Cause',
			'consequence_id' => 'Consequence',
			'date' => 'Date Reoccured',
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
		$criteria->compare('cause_id',$this->cause_id);
		$criteria->compare('consequence_id',$this->consequence_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MonitoringPerformance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getItemCount_5($start_date, $end_date, $main_category){
		if($start_date == $end_date){
			
			$criteria = new CDbCriteria();
			$criteria->select= "DISTINCT incident_id";
			$criteria->condition = "reoccurring = 1 and date = '{$end_date}' and incident_id in (select id from incidents where main_category = '{$main_category}' )"; 
			
			$items = MonitoringPerformance::model()->findAll($criteria);
		}else{
			
			$criteria = new CDbCriteria();
			$criteria->select= "DISTINCT incident_id";
			$criteria->condition = "reoccurring = 1 and date between '{$start_date}' and '{$end_date}' and incident_id in (select id from incidents where main_category = '{$main_category}' )"; 
			
			$items = MonitoringPerformance::model()->findAll($criteria);
		}
		
		return count($items);
	}
}
