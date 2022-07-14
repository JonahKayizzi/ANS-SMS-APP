<?php

/**
 * This is the model class for table "finacial_risk_analysis".
 *
 * The followings are the available columns in table 'finacial_risk_analysis':
 * @property integer $id
 * @property integer $hazzard_no
 * @property string $date
 * @property string $action
 * @property string $cost
 * @property string $warranty
 * @property string $approved_by
 * @property string $date_modified
 */
class FinacialRiskAnalysis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'finacial_risk_analysis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hazzard_no, action, cost', 'required'),
			array('hazzard_no, status, cost', 'numerical', 'integerOnly'=>true),
			array('date', 'length', 'max'=>20),
			array('warranty', 'length', 'max'=>200),
			array('action, approved_by', 'length', 'max'=>10000),
			array('date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hazzard_no, date, action, cost, warranty, approved_by, date_modified, status', 'safe', 'on'=>'search'),
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
			'hazard' => array(self::BELONGS_TO, 'Incidents', 'hazzard_no'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hazzard_no' => 'Hazard Number',
			'date' => 'Date',
			'action' => 'What is to be done or Replaced or Purchaced',
			'cost' => 'Cost Of Replacement',
			'warranty' => 'Warranty',
			'approved_by' => 'Approved and Authorized by',
			'date_modified' => 'Date Modified',
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
		$criteria->compare('hazzard_no',$this->hazzard_no);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('warranty',$this->warranty,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('status',1);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FinacialRiskAnalysis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = FinacialRiskAnalysis::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
