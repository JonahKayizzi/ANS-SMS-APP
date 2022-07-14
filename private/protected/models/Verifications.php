<?php

/**
 * This is the model class for table "verifications".
 *
 * The followings are the available columns in table 'verifications':
 * @property integer $id
 * @property string $verified_by
 * @property string $note
 * @property string $modified
 * @property integer $status
 * @property integer $incident_id
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class Verifications extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'verifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('verified_by', 'required'),
			array('status, incident_id', 'numerical', 'integerOnly'=>true),
			array('verified_by', 'length', 'max'=>256),
			array('note', 'length', 'max'=>7000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, verified_by, note, modified, status, incident_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'verified_by' => 'Name',
			'note' => 'Note',
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
		$criteria->compare('verified_by',$this->verified_by,true);
		$criteria->compare('note',$this->note,true);
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
	 * @return Verifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Verifications::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}