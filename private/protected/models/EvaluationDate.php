<?php

/**
 * This is the model class for table "evaluation_date".
 *
 * The followings are the available columns in table 'evaluation_date':
 * @property integer $id
 * @property integer $station_id
 * @property string $date
 * @property string $type
 * @property string $date_created
 */
class EvaluationDate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluation_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, station_id, type, venue, activities', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('type, notification, venue', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, type, station_id,date_created, status, venue, activities', 'safe', 'on'=>'search'),
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
			 'auditors'=>array(self::HAS_MANY, 'EvaluationAuditors', 'date_id','with'=>'user_relation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'type' => 'Time',
			'station_id' => 'Station',
			'date_created' => 'Date Created',
			'status' => 'Status',
			'venue' => 'Venue',
			'activities' => 'Activities',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('station_id',$this->station_id,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getAuditorsTwoDays() {
			$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }
			$criteria->addCondition("date = DATE(NOW() + INTERVAL 2 DAY) and notification !='2 days Sent'");
			$users=array();
			$model = EvaluationDate::model()->with('auditors')->findAll($criteria);
			foreach (@$model as $action) {
				$action->notification='2 days Sent';
				$action->save();
				foreach ($action->auditors as $auditors) {
					array_push($users, $auditors->user_id);
					# code...
				}
				# code...
			}
			return $users;
	}

	public static function getAuditorsToday() {
			$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }
			$criteria->addCondition("date = DATE(NOW()) and notification !='Final Sent'");
			$users=array();
			$model = EvaluationDate::model()->with('auditors')->findAll($criteria);
			foreach (@$model as $action) {
				$action->notification='Final Sent';
				$action->save();
					foreach ($action->auditors as $auditors) {
					array_push($users, $auditors->user_id);
					# code...
				}
				# code...
			}
			return $users;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvaluationDate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = EvaluationDate::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
