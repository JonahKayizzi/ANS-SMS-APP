<?php

/**
 * This is the model class for table "change_management".
 *
 * The followings are the available columns in table 'change_management':
 * @property integer $id
 * @property string $originator_name
 * @property string $originator_title
 * @property string $system_equipment_concerned
 * @property string $date_raised
 * @property string $reference_no
 * @property string $change_description
 * @property string $change_justification
 * @property string $back_out_plan
 * @property string $affected_areas
 * @property string $costs
 * @property string $time
 * @property string $proposed_implementer
 * @property string $recommended_by
 * @property string $approved_by
 * @property string $reported_by
 * @property string $recommendation_date
 * @property string $approval_date
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property CmAffectedAreas[] $cmAffectedAreases
 * @property CmCosts[] $cmCosts
 */
class ChangeManagement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'change_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_of_change, change_description, reported_by, originator_name, originator_title, division, division, date_raised, recommendation_date, recommended_by, change_justification, back_out_plan, change_description, recommendation_date, approval_date', 'required'),
			
			array('approval_date, recommendation_date, date_raised', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			
			array('status', 'numerical', 'integerOnly'=>true),
			array('originator_name, originator_title, time', 'length', 'max'=>128),
			array('system_equipment_concerned, affected_areas, costs, division, areas_affected', 'length', 'max'=>256),
			array('reference_no, proposed_implementer, recommended_by, approved_by, reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, originator_name, originator_title, system_equipment_concerned, date_raised, reference_no, change_description, change_justification, back_out_plan, affected_areas, costs, time, proposed_implementer, recommended_by, approved_by, reported_by, recommendation_date, approval_date, modified, status, title_of_change, division, areas_affected', 'safe', 'on'=>'search'),
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
			'cmAffectedAreases' => array(self::HAS_MANY, 'CmAffectedAreas', 'change_management_id'),
			'cmCosts' => array(self::HAS_MANY, 'CmCosts', 'change_management_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'originator_name' => 'Originator Name',
			'originator_title' => 'Originator Title',
			'system_equipment_concerned' => 'System Equipment Concerned',
			'date_raised' => 'Start Date',
			'reference_no' => 'Reference No',
			'change_description' => 'Change Description',
			'change_justification' => 'Change Justification',
			'back_out_plan' => 'Back Out Plan',
			'affected_areas' => 'Affected Areas',
			'costs' => 'Costs',
			'time' => 'Time',
			'proposed_implementer' => 'Proposed Implementer',
			'recommended_by' => 'Recommended By',
			'approved_by' => 'Approved By',
			'reported_by' => 'Reported By',
			'recommendation_date' => 'Recommendation Date',
			'approval_date' => 'Approval Date',
			'modified' => 'Modified',
			'status' => 'Status',
			'title_of_change' => 'Title of Change',
			'division' => 'Division',
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
		$criteria->compare('originator_name',$this->originator_name,true);
		$criteria->compare('originator_title',$this->originator_title,true);
		$criteria->compare('system_equipment_concerned',$this->system_equipment_concerned,true);
		$criteria->compare('date_raised',$this->date_raised,true);
		$criteria->compare('reference_no',$this->reference_no,true);
		$criteria->compare('change_description',$this->change_description,true);
		$criteria->compare('change_justification',$this->change_justification,true);
		$criteria->compare('back_out_plan',$this->back_out_plan,true);
		$criteria->compare('affected_areas',$this->affected_areas,true);
		$criteria->compare('costs',$this->costs,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('proposed_implementer',$this->proposed_implementer,true);
		$criteria->compare('recommended_by',$this->recommended_by,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('recommendation_date',$this->recommendation_date,true);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChangeManagement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = ChangeManagement::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
