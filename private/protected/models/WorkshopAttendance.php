<?php

/**
 * This is the model class for table "workshop_attendance".
 *
 * The followings are the available columns in table 'workshop_attendance':
 * @property integer $id
 * @property integer $workshop_id
 * @property string $employee_no
 * @property string $name
 * @property string $position
 * @property string $email
 * @property string $phone
 * @property string $signature
 * @property integer $status
 * @property string $reported_by
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Workshops $workshop
 */
class WorkshopAttendance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workshop_attendance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('workshop_id, employee_no, name, position, reported_by', 'required'),
			array('workshop_id, status', 'numerical', 'integerOnly'=>true),
			array('employee_no, email, phone, reported_by', 'length', 'max'=>32),
			array('name, position, signature', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, workshop_id, employee_no, name, position, email, phone, signature, status, reported_by, modified', 'safe', 'on'=>'search'),
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
			'workshop' => array(self::BELONGS_TO, 'Workshops', 'workshop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'workshop_id' => 'Workshop',
			'employee_no' => 'Employee No',
			'name' => 'Name',
			'position' => 'Position',
			'email' => 'Email',
			'phone' => 'Phone',
			'signature' => 'Signature',
			'status' => 'Status',
			'reported_by' => 'Reported By',
			'modified' => 'Modified',
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
		$criteria->compare('workshop_id',$this->workshop_id);
		$criteria->compare('employee_no',$this->employee_no,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->order = "id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkshopAttendance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = WorkshopAttendance::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
