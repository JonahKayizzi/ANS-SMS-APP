<?php

/**
 * This is the model class for table "workshops".
 *
 * The followings are the available columns in table 'workshops':
 * @property integer $id
 * @property string $subject
 * @property string $hours
 * @property string $from_date
 * @property string $to_date
 * @property string $venue
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 *
 * The followings are the available model relations:
 * @property WorkshopAttendance[] $workshopAttendances
 * @property WorkshopFacilitators[] $workshopFacilitators
 */
class Workshops extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workshops';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, hours, from_date, to_date, venue, reported_by', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>256),
			array('hours, reported_by', 'length', 'max'=>32),
			array('venue', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, hours, from_date, to_date, venue, modified, status, reported_by', 'safe', 'on'=>'search'),
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
			'workshopAttendances' => array(self::HAS_MANY, 'WorkshopAttendance', 'workshop_id'),
			'workshopFacilitators' => array(self::HAS_MANY, 'WorkshopFacilitators', 'workshop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Subject',
			'hours' => 'Hours',
			'from_date' => 'From Date',
			'to_date' => 'To Date',
			'venue' => 'Venue',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('venue',$this->venue,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->order = "id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workshops the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getOptions(){
		$cats = Workshops::model()->findAll("status = 1");
		$data = array(null=>"Select Workshop");
		foreach($cats as $model){
			$data[$model->id] = $model->id.':  '.$model->subject;
		}
		return $data;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Workshops::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
