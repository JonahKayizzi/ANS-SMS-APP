<?php

/**
 * This is the model class for table "effect_risk_management".
 *
 * The followings are the available columns in table 'effect_risk_management':
 * @property integer $id
 * @property string $severity
 * @property string $severity_rationale
 * @property string $likelihood
 * @property string $likelihood_rationale
 * @property string $modified
 * @property integer $status
 * @property integer $effects_id
 * @property string $reported_by
 *
 * The followings are the available model relations:
 * @property Effects $effects
 */
class EffectRiskManagement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'effect_risk_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('severity, severity_rationale, likelihood, likelihood_rationale,  reported_by', 'required'),
			array('status, effects_id', 'numerical', 'integerOnly'=>true),
			array('severity, likelihood, reported_by', 'length', 'max'=>32),
			array('severity_rationale, likelihood_rationale', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, severity, severity_rationale, likelihood, likelihood_rationale, modified, status, effects_id, reported_by', 'safe', 'on'=>'search'),
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
			'effects' => array(self::BELONGS_TO, 'Effects', 'effects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'severity' => 'Severity',
			'severity_rationale' => 'Severity Rationale',
			'likelihood' => 'Likelihood',
			'likelihood_rationale' => 'Likelihood Rationale',
			'modified' => 'Modified',
			'status' => 'Status',
			'effects_id' => 'Effects',
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
		$criteria->compare('severity',$this->severity,true);
		$criteria->compare('severity_rationale',$this->severity_rationale,true);
		$criteria->compare('likelihood',$this->likelihood,true);
		$criteria->compare('likelihood_rationale',$this->likelihood_rationale,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('effects_id',$this->effects_id);
		$criteria->compare('reported_by',$this->reported_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EffectRiskManagement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = EffectRiskManagement::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
