<?php

/**
 * This is the model class for table "duty_controllers".
 *
 * The followings are the available columns in table 'duty_controllers':
 * @property integer $id
 * @property integer $sod_id
 * @property integer $incident_id
 * @property string $name
 * @property string $place
 * @property integer $x
 * @property integer $y
 * @property integer $z
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 * @property SafetyOccurrenceData $sod
 */
class DutyControllers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'duty_controllers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, place', 'required'),
			array('sod_id, incident_id, CONTROLLING, CO0RDINATING, MONITORING, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('place', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sod_id, incident_id, name, place, CONTROLLING, CO0RDINATING, MONITORING, modified, status', 'safe', 'on'=>'search'),
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
			'sod' => array(self::BELONGS_TO, 'SafetyOccurrenceData', 'sod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sod_id' => 'Sod',
			'incident_id' => 'Incident',
			'name' => 'Name',
			'place' => 'Place',
			'CONTROLLING' => 'Controlling',
			'CO0RDINATING' => 'Coordinating',
			'MONITORING' => 'Monitoring',
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
		$criteria->compare('sod_id',$this->sod_id);
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('CONTROLLING',$this->CONTROLLING);
		$criteria->compare('CO0RDINATING',$this->CO0RDINATING);
		$criteria->compare('MONITORING',$this->MONITORING);
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
	 * @return DutyControllers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
