<?php

/**
 * This is the model class for table "investigators".
 *
 * The followings are the available columns in table 'investigators':
 * @property integer $id
 * @property string $name
 * @property string $modified
 * @property integer $status
 * @property integer $incident_id
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class Investigators extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'investigators';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, reported_by', 'required'),
			array('status, incident_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, modified, status, incident_id, reported_by', 'safe', 'on'=>'search'),
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
			'user_relation' => array(self::BELONGS_TO, 'Users', 'name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'modified' => 'Modified',
			'status' => 'Status',
			'incident_id' => 'Incident',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('incident_id',$this->incident_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Investigators the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function afterSave() {
    parent::afterSave();
    if ($this->isNewRecord) {
  			$notification = new Notifications();
  			$notification->user=$this->name;
  			$notification->user_from=Yii::app()->user->id;
  			$notification->subject='Assigned New Icident';
  			$notification->description='You have Been Assigned A new Incident #'.$this->incident_id;
  			$notification->urgent=0;
  			$notification->save();
    }
}
}
