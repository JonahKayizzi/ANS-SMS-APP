<?php

/**
 * This is the model class for table "task_steps".
 *
 * The followings are the available columns in table 'task_steps':
 * @property integer $id
 * @property integer $task_id
 * @property string $description
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 *
 * The followings are the available model relations:
 * @property TaskStepComments[] $taskStepComments
 * @property TaskStepHazardControls[] $taskStepHazardControls
 * @property TaskStepHazards[] $taskStepHazards
 * @property Tasks $task
 */
class TaskSteps extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'task_steps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, reported_by', 'required'),
			array('task_id, status', 'numerical', 'integerOnly'=>true),
			array('description, details', 'length', 'max'=>256),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, task_id, description, modified, status, reported_by, details', 'safe', 'on'=>'search'),
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
			'taskStepComments' => array(self::HAS_MANY, 'TaskStepComments', 'task_step_id'),
			'taskStepHazardControls' => array(self::HAS_MANY, 'TaskStepHazardControls', 'task_step_id'),
			'taskStepHazards' => array(self::HAS_MANY, 'TaskStepHazards', 'task_step_id'),
			'task' => array(self::BELONGS_TO, 'Tasks', 'task_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'task_id' => 'Task',
			'description' => 'Description',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
			'details' => 'Details',
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
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TaskSteps the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = TaskSteps::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
