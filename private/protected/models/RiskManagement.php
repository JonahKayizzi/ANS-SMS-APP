<?php

/**
 * This is the model class for table "risk_management".
 *
 * The followings are the available columns in table 'risk_management':
 * @property integer $id
 * @property string $serial_no
 * @property string $description
 * @property string $current_risk_index
 * @property string $theoretical_risk_index
 * @property string $risk_owner
 * @property string $actual_risk_index
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 * @property string $evaluated_by
 * @property string $evaluation_date
 * @property string $approved_by
 * @property string $approval_date
 * @property string $next_evaluation_date
 *
 * The followings are the available model relations:
 * @property RmConsequences[] $rmConsequences
 * @property RmCurrentDefences[] $rmCurrentDefences
 * @property RmTechnicalDefences[] $rmTechnicalDefences
 */
class RiskManagement extends CActiveRecord
{
	var $date_to;
	var $date_from;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'risk_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, reported_by, current_risk_index, theoretical_risk_index, risk_owner, actual_risk_index', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('serial_no', 'length', 'max'=>16),
			/* array('description', 'length', 'max'=>256), */
			array('description', 'length', 'max'=>100000),
			array('evaluation_date, approval_date, next_evaluation_date', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('current_risk_index, theoretical_risk_index, actual_risk_index', 'length', 'max'=>4),
			array('risk_owner, reported_by, evaluated_by, approved_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serial_no, description, current_risk_index, theoretical_risk_index, risk_owner, actual_risk_index, modified, status, reported_by, evaluated_by, evaluation_date, approved_by, approval_date, next_evaluation_date', 'safe', 'on'=>'search'),
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
			'rmConsequences' => array(self::HAS_MANY, 'RmConsequences', 'risk_management_id'),
			'rmCurrentDefences' => array(self::HAS_MANY, 'RmCurrentDefences', 'risk_management_id'),
			'rmTechnicalDefences' => array(self::HAS_MANY, 'RmTechnicalDefences', 'risk_management_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'serial_no' => 'Serial No',
			'description' => 'Description',
			'current_risk_index' => 'Current Risk Index',
			'theoretical_risk_index' => 'Theoretical Risk Index',
			'risk_owner' => 'Risk Owner',
			'actual_risk_index' => 'Actual Risk Index',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
			'evaluated_by' => 'Evaluated By',
			'evaluation_date' => 'Evaluation Date',
			'approved_by' => 'Approved By',
			'approval_date' => 'Approval Date',
			'next_evaluation_date' => 'Next Evaluation Date',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.serial_no',$this->serial_no,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.current_risk_index',$this->current_risk_index,true);
		$criteria->compare('t.theoretical_risk_index',$this->theoretical_risk_index,true);
		$criteria->compare('t.risk_owner',$this->risk_owner,true);
		$criteria->compare('t.actual_risk_index',$this->actual_risk_index,true);
		$criteria->compare('t.modified',$this->modified,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.reported_by',$this->reported_by,true);
		$criteria->compare('t.evaluated_by',$this->evaluated_by,true);
		$criteria->compare('t.evaluation_date',$this->evaluation_date,true);
		$criteria->compare('t.approved_by',$this->approved_by,true);
		$criteria->compare('t.approval_date',$this->approval_date,true);
		$criteria->compare('t.next_evaluation_date',$this->next_evaluation_date,true);
		$criteria->order = 't.id DESC';
		$criteria->with=array('rmTechnicalDefences','rmCurrentDefences','rmConsequences');

			if($this->date_from and $this->date_to){
			
			$criteria->addCondition("t.modified  between '$this->date_from ' and '$this->date_to'");
			}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiskManagement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = RiskManagement::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
