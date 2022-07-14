<?php

/**
 * This is the model class for table "hazard_risk_management_register".
 *
 * The followings are the available columns in table 'hazard_risk_management_register':
 * @property integer $id
 * @property integer $task_step_hazard_id
 * @property string $consequences
 * @property string $current_defences
 * @property string $current_risk_index
 * @property string $tech_admin_defences
 * @property string $theoretical_risk_index
 * @property string $risk_owner
 * @property string $actual_risk_index
 * @property integer $created_by
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property TaskStepHazards $taskStepHazard
 */
class HazardRiskManagementRegister extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hazard_risk_management_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task_step_hazard_id, task_id', 'required'),
			array('task_step_hazard_id, created_by, task_id, status', 'numerical', 'integerOnly'=>true),
			array('consequences, current_defences, tech_admin_defences', 'length', 'max'=>256),
			array('current_risk_index', 'length', 'max'=>32),
			array('theoretical_risk_index, actual_risk_index', 'length', 'max'=>16),
			array('risk_owner', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, task_step_hazard_id, consequences, current_defences, current_risk_index, tech_admin_defences, theoretical_risk_index, risk_owner, actual_risk_index, created_by, modified, status, task_id', 'safe', 'on'=>'search'),
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
			'taskStepHazard' => array(self::BELONGS_TO, 'TaskStepHazards', 'task_step_hazard_id'),
			'tasks' => array(self::BELONGS_TO, 'Tasks', 'task_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'task_step_hazard_id' => 'Task Step Hazard',
			'consequences' => 'Consequences',
			'current_defences' => 'Current Defences',
			'current_risk_index' => 'Current Risk Index',
			'tech_admin_defences' => 'Tech Admin Defences',
			'theoretical_risk_index' => 'Theoretical Risk Index',
			'risk_owner' => 'Risk Owner',
			'actual_risk_index' => 'Actual Risk Index',
			'created_by' => 'Created By',
			'modified' => 'Modified',
			'status' => 'Status',
			'task_id' => 'Task',
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
		$criteria->compare('task_step_hazard_id',$this->task_step_hazard_id);
		$criteria->compare('consequences',$this->consequences,true);
		$criteria->compare('current_defences',$this->current_defences,true);
		$criteria->compare('current_risk_index',$this->current_risk_index,true);
		$criteria->compare('tech_admin_defences',$this->tech_admin_defences,true);
		$criteria->compare('theoretical_risk_index',$this->theoretical_risk_index,true);
		$criteria->compare('risk_owner',$this->risk_owner,true);
		$criteria->compare('actual_risk_index',$this->actual_risk_index,true);
		$criteria->compare('created_by',$this->created_by);
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
	 * @return HazardRiskManagementRegister the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = HazardRiskManagementRegister::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
