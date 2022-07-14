<?php

/**
 * This is the model class for table "evaluation_auditors".
 *
 * The followings are the available columns in table 'evaluation_auditors':
 * @property integer $id
 * @property integer $date_id
 * @property integer $station_id
 * @property integer $user_id
 * @property string $date_created
 */
class EvaluationAuditors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluation_auditors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_id, station_id, user_id', 'required'),
			array('date_id, station_id, user_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_id, station_id, user_id, date_created, status', 'safe', 'on'=>'search'),
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
					'user_relation' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_id' => 'Date',
			'station_id' => 'Station',
			'user_id' => 'User',
			'date_created' => 'Date Created',
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
		$criteria->compare('date_id',$this->date_id);
		$criteria->compare('station_id',$this->station_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvaluationAuditors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = EvaluationAuditors::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}