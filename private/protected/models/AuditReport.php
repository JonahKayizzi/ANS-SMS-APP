<?php

/**
 * This is the model class for table "audit_report".
 *
 * The followings are the available columns in table 'audit_report':
 * @property integer $id
 * @property string $title
 * @property string $date_created
 * @property integer $user
 * @property integer $status
 * @property integer $audit_plan_id
 *
 * The followings are the available model relations:
 * @property AuditPlan $auditPlan
 * @property Users $user0
 * @property AuditReportFields[] $auditReportFields
 */
class AuditReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'audit_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, audit_plan_id', 'required'),
			array('user, status, audit_plan_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, date_created, user, status, audit_plan_id', 'safe', 'on'=>'search'),
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
			'auditPlan' => array(self::BELONGS_TO, 'AuditPlan', 'audit_plan_id'),
			'user0' => array(self::BELONGS_TO, 'Users', 'user'),
			'auditReportFields' => array(self::HAS_MANY, 'AuditReportFields', 'report_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Audit Report Title',
			'date_created' => 'Date Created',
			'user' => 'User',
			'status' => 'Status',
			'audit_plan_id' => 'Audit Plan',
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

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserIsAuditor())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('status',$this->status);
		$criteria->compare('audit_plan_id',$this->audit_plan_id);
		
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AuditReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = AuditReport::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())||(@Users::model()->checkIfUserIsAuditor())){return true;}else{return false;}
	}
}
