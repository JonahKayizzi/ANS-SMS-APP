<?php

/**
 * This is the model class for table "safety_requirements".
 *
 * The followings are the available columns in table 'safety_requirements':
 * @property integer $id
 * @property string $mitigation
 * @property string $time_frame
 * @property string $modified
 * @property integer $status
 * @property integer $incident_id
 * @property integer $consequence
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SafetyRequirements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_requirements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mitigation, reported_by', 'required'),
			/* array('predicted_residual_risk', 'relate_Initial_Residual_Risk'), */
			
			array('status, incident_id, priority', 'numerical', 'integerOnly'=>true),
			array('mitigation, predicted_residual_risk', 'length', 'max'=>256),
			array('time_frame, reported_by', 'length', 'max'=>128),
			array('mitigation, reported_by', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mitigation, time_frame, modified, status, incident_id, predicted_residual_risk, reported_by, consequence, priority, officer', 'safe', 'on'=>'search'),
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
			/* 'consequence_relation' => array(self::BELONGS_TO, 'Consequences', 'consequence'), */
		);
	}
	/* public function relate_Initial_Residual_Risk($attribute){

		//check if has resdual risk
		if ($this->getInitailRisk()) {
	
			$this->compareRisks($this->getInitailRisk(),$this->predicted_residual_risk);
		}
		else{
			$this->addError($attribute, "Initail Risk Not Set $this->incident_id $this->consequence" );		

			}
		}
	public function compareRisks($initail,$residual){

		$initailModel=@RiskAssesmentValues::model()->find("name = '{$initail}'");
		$residualModel=@RiskAssesmentValues::model()->find("name = '{$residual}'");
		if(!$initailModel){
			$this->addError($attribute, 'Initail Value Does not Exist');
			return;
		}
		if(!$residualModel){
			$this->addError($attribute, 'Residual Value Does not Exist');
			return;
		}

		if($initailModel->value < $residualModel->value){
				$this->addError($attribute, 'Residual Value is greater than Initial Value');

		}
		return;
	}
	public function getInitailRisk(){
		$effects = @Effects::model()->with('effectRiskManagements')->findAll("hazard_id = '{$this->incident_id}' and consequence='{$this->consequence}'");
		

		if($effects){
			echo  $effects[0]->effectRiskManagements[0]->likelihood.$effects[0]->effectRiskManagements[0]->severity;
			return $effects[0]->effectRiskManagements[0]->likelihood.$effects[0]->effectRiskManagements[0]->severity; 
		}
		else{
			return null;
		}
	}	
 */
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mitigation' => 'Mitigation',
			'time_frame' => 'Time Frame',
			'modified' => 'Modified',
			'status' => 'Status',
			'incident_id' => 'Incident',
			'predicted_residual_risk' => 'Predicted Residual Risk',
			'consequence' => 'Consequence',
			'priority' => 'Priority',
			'officer' => 'Officer',
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
		$criteria->compare('mitigation',$this->mitigation,true);
		$criteria->compare('time_frame',$this->time_frame,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('incident_id',$this->incident_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function afterSave(){
		$incident=Incidents::model()->findByPk($this->incident_id);

		$model= new SafetyRecommendations();
		$model->details=$incident->occurrence;
		$model->causes=$incident->brief_notes;
		$model->reported_by=Yii::app()->user->id;
		$model->source="Hazard #".$this->incident_id;
		$model->brief=$this->mitigation;

		$model->save();


	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SafetyRequirements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getPosibleConsiquesOptions($incident_id){
		$titles = Consequences::model()->findAll('incident_id='.$incident_id);
		$data = array(null=>"Select Consequence");
		foreach($titles as $model){
			$data[$model->id] = $model->description;
		}
		return $data;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SafetyRequirements::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
