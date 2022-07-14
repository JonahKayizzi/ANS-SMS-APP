<?php

/**
 * This is the model class for table "rm_current_defences".
 *
 * The followings are the available columns in table 'rm_current_defences':
 * @property integer $id
 * @property string $details
 * @property string $modified
 * @property string $reported_by
 * @property integer $status
 * @property integer $risk_management_id
 *
 * The followings are the available model relations:
 * @property RiskManagement $riskManagement
 */
class RmCurrentDefences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rm_current_defences';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('details, reported_by, risk_management_id', 'required'),
			array('status, risk_management_id', 'numerical', 'integerOnly'=>true),
			array('details', 'length', 'max'=>256),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, details, modified, reported_by, status, risk_management_id', 'safe', 'on'=>'search'),
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
			'riskManagement' => array(self::BELONGS_TO, 'RiskManagement', 'risk_management_id'),
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
			'reported_by' => 'Reported By',
			'status' => 'Status',
			'risk_management_id' => 'Risk Management',
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
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('status',1);
		$criteria->compare('risk_management_id',$this->risk_management_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RmCurrentDefences the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = RmCurrentDefences::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
