<?php

/**
 * This is the model class for table "safety_requirements_review_dates".
 *
 * The followings are the available columns in table 'safety_requirements_review_dates':
 * @property integer $id
 * @property integer $safety_requirement_id
 * @property string $date_reviewed
 * @property string $comment
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SafetyRecommendations $safetyRequirement
 */
class SafetyRequirementsReviewDates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_requirements_review_dates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('safety_requirement_id, date_reviewed', 'required'),
			array('safety_requirement_id, status', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, safety_requirement_id, date_reviewed, comment, modified, status', 'safe', 'on'=>'search'),
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
			'safetyRequirement' => array(self::BELONGS_TO, 'SafetyRecommendations', 'safety_requirement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'safety_requirement_id' => 'Safety Requirement',
			'date_reviewed' => 'Date Reviewed',
			'comment' => 'Comment',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('safety_requirement_id',$this->safety_requirement_id);
		$criteria->compare('date_reviewed',$this->date_reviewed,true);
		$criteria->compare('comment',$this->comment,true);
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
	 * @return SafetyRequirementsReviewDates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
