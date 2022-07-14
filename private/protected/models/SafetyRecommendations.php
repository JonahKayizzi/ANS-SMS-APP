<?php

/**
 * This is the model class for table "safety_recommendations".
 *
 * The followings are the available columns in table 'safety_recommendations':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property string $source
 * @property string $causes
 * @property string $remarks
 * @property string $brief
 * @property integer $status
 * @property integer $incident_id
 * @property string $reported_by
 * 
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SafetyRecommendations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_recommendations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('content_id, content_type, status, action_by, priority, type_of_control', 'numerical', 'integerOnly'=>true),
			array('details, source_detail', 'length', 'max'=>256),
			array('reported_by, source_category, deadline', 'length', 'max'=>32),
			array('mitigation, causes, details, remarks, brief', 'length', 'max'=>10000),
			array('source,causes,remarks,brief', 'customRule'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, mitigation,modified, status,  reported_by, content_id, content_type, priority, deadline, action_by, source_category, type_of_control', 'safe', 'on'=>'search'),
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

			'user_relation' => array(self::BELONGS_TO, 'Users', 'reported_by'),
			'actionBy' => array(self::BELONGS_TO, 'Users', 'action_by'),
			'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
			'control' => array(self::BELONGS_TO, 'TypesOfControlsSub', 'type_of_control'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'priority' => 'Priority',
			'deadline' => 'Deadline',
			'details' => 'Safety Concern',
			'modified' => 'Reported On',
			'status' => 'Status',
			'source' => 'Source Type',
			'source_detail' => 'Source Detail',
			'source_category' => 'Source Category',
			'causes' => 'Causes',
			'remarks' => 'Remarks',
			'brief' => 'Safety Recommendation',
			'mitigation' => 'Mitigation',
			'reported_by' => 'Reported By',
			'content_type' => 'Content Type',
			'content_id' => 'Content ID',
			'action_by' => 'Action By',
			
			'modified' => 'Modified',
			'date_closed' => 'Date Closed',
			'date_assigned' => 'Date Assigned',
			'owner_id' => 'Owner',
			'type_of_control' => 'Type of Control',
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
	public function customRule($attribute,$params)
	{
    
	}
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('id',$this->id);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('source',$this->source);
		$criteria->compare('causes',$this->causes);
		$criteria->compare('remarks',$this->remarks);
		$criteria->compare('brief',$this->brief);
		$criteria->compare('reported_by',$this->reported_by,true);
		
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SafetyRecommendations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SafetyRecommendations::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
	
	public static function getOptionsForContent($content_type, $content_id){
		$titles = SafetyRecommendations::model()->findAll("content_type = {$content_type} and content_id = {$content_id}");
		$data = array(null=>"Select Safety Requirement");
		foreach($titles as $model){
			$data[$model->id] = $model->mitigation;
		}
		return $data;
	}
	
	public static function getOptionsForImplementation($content_type, $content_id){
		$titles = @SafetyRecommendations::model()->findAll("content_id = '{$content_id}' and content_type = '{$content_type}' and status = 1");
		$data = array(null=>"Select Safety Requirement");
		foreach($titles as $model){
			$data[$model->id] = $model->mitigation;
		}
		return $data;
	}
	
	public function getItemCountByDepartment($start_date, $end_date, $option){
		if($start_date == $end_date){
			$items = SafetyRecommendations::model()->findAll("action_by in (select id from users where user_department_id = '{$option}') and modified = '{$end_date}'");
		}else{
			$items = SafetyRecommendations::model()->findAll("action_by in (select id from users where user_department_id = '{$option}') and modified between '{$start_date}' and '{$end_date}'");
		}
		
		return count($items);
	}
	
	public function getItemCountByDivision($start_date, $end_date, $option){
		if($start_date == $end_date){
			$items = SafetyRecommendations::model()->findAll("action_by in (select id from users where user_division_id = '{$option}') and modified = '{$end_date}'");
		}else{
			$items = SafetyRecommendations::model()->findAll("action_by in (select id from users where user_division_id = '{$option}') and modified between '{$start_date}' and '{$end_date}'");
		}
		
		return count($items);
	}
}
