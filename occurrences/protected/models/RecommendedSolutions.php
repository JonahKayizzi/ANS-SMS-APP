<?php

/**
 * This is the model class for table "recommended_solutions".
 *
 * The followings are the available columns in table 'recommended_solutions':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property integer $status
 * @property integer $incident_id
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class RecommendedSolutions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recommended_solutions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('details', 'required'),
			array('status, incident_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, modified, status, incident_id', 'safe', 'on'=>'search'),
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
			'details' => 'Details',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('incident_id',$this->incident_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RecommendedSolutions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
