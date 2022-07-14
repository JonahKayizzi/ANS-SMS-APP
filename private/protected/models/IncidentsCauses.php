<?php

/**
 * This is the model class for table "incidents_causes".
 *
 * The followings are the available columns in table 'incidents_causes':
 * @property integer $id
 * @property integer $incident_id
 * @property integer $cause_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property IncidentCausesSub $cause
 * @property Incidents $incident
 */
class IncidentsCauses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'incidents_causes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incident_id, cause_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, cause_id, status', 'safe', 'on'=>'search'),
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
			'cause' => array(self::BELONGS_TO, 'IncidentCausesSub', 'cause_id'),
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
			'cause_id' => 'Cause',
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
		$criteria->compare('cause_id',$this->cause_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IncidentsCauses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getItemCount_6($start_date, $end_date, $main_category, $option){
		if($start_date == $end_date){
			$items = IncidentsCauses::model()->findAll("incident_id in (select id from incidents where date = '{$end_date}' and main_category = '{$main_category}') and cause_id = {$option} and status = 1");
		}else{
			$items = IncidentsCauses::model()->findAll("incident_id in (select id from incidents where date between '{$start_date}' and '{$end_date}' and main_category = '{$main_category}') and cause_id = {$option} and status = 1");
		}
		
		return count($items);
	}
	
	public function getCausesOfIncident($id){
		$causes = @IncidentsCauses::model()->findAll("incident_id = {$id} and status = 1");
		$list = "";
		if(!empty($causes)){
			$list = $list."<ol>";
			foreach($causes as $cause){
				$list = $list."<li>{$cause->cause->name}</li>";
			}
			$list = $list."</ol>";
		}
		return $list;
	}
}
